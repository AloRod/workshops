<?php
  $name = @$_REQUEST['name'];
  $lastName = @$_REQUEST['lastName'];
  $phone = @$_REQUEST['phone'];
  $email = @$_REQUEST['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Name</title>
</head>
<body>
<form action="/workShop2/save.php" method="POST">
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" id="" value="<?php echo $name; ?>"  placeholder="Your name">

    <label for="">Apellido</label>
    <input type="text" class="form-control" name="lastName" id="" value="<?php echo $lastName; ?>"  placeholder="Your last name">

    <label for="">Telefono</label>
    <input type="text" class="form-control" name="phone" id="" value="<?php echo $phone; ?>"  placeholder="Your phone number">

    <label for="">Correo</label>
    <input type="text" class="form-control" name="email" id="" value="<?php echo $email; ?>"  placeholder="Your address">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>