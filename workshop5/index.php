<?php
include('utils/functions.php');
$error_msg = isset($_GET['error']) ? $_GET['error'] : '';
?>
<?php require('inc/header.php') ?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Login</h1>
        <p class="lead">Inicio de sesión</p>
        <hr class="my-4">
    </div>
    <form method="POST" action="actions/login.php">
        <div class="error">
            <?php echo htmlspecialchars($error_msg); ?>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input id="email" class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" class="form-control" type="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>
<?php require('inc/footer.php'); ?>
