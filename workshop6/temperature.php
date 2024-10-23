<?php
// Array de temperaturas registradas
$temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);

//  temperatura promedio
$average = array_sum($temperatures) / count($temperatures);
echo "Average Temperature is: " . round($average, 1) . "<br>";

//  Eliminar temperaturas duplicadas
$unique_temperatures = array_unique($temperatures);

// Ordenar las temperaturas en orden ascendente
sort($unique_temperatures);

// Obtener las cinco temperaturas más bajas
$lowest_temperatures = array_slice($unique_temperatures, 0, 5);
echo "List of 5 lowest temperatures (no duplicates): " . implode(", ", $lowest_temperatures) . "<br>";

// Obtener las cinco temperaturas más altas ordenando de manera descendente y tomando las últimas 5
$highest_temperatures = array_slice($unique_temperatures, -5);
echo "List of 5 highest temperatures (no duplicates): " . implode(", ", $highest_temperatures) . "<br>";
?>
