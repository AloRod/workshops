<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces(): array {
   $connection = new mysqli('localhost', 'root', '', 'bdworkshop3'); // Conexión a la base de datos
  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }
  
  $sql = "SELECT province_name FROM province";
  $result = $connection->query($sql);
  
  $provinces = [];
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $provinces[] = $row;
      }
  }
  $connection->close();
  return $provinces;
}




