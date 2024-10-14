<?php
include('utils/functions.php');
$roles = getRole();
$provinces = getProvinces();
$error_msg = isset($_GET['error']) ? $_GET['error'] : '';
?>
<?php require('inc/header.php') ?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Registro</h1>
        <p class="lead">Proceso de registro de usuario</p>
        <hr class="my-4">
    </div>
    <form method="post" action="actions/signup.php">
        <div class="error">
            <?php echo htmlspecialchars($error_msg); ?>
        </div>
        <div class="form-group">
            <label for="first-name">Nombre</label>
            <input id="first-name" class="form-control" type="text" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="last-name">Apellido</label>
            <input id="last-name" class="form-control" type="text" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="province_id">Provincia</label>
            <select id="province" class="form-control" name="province_id" required>
                <?php
                foreach ($provinces as $province) {
                    echo "<option value=\"" . htmlspecialchars($province['province_name']) . "\">" . htmlspecialchars($province['province_name']) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input id="email" class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" class="form-control" type="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select id="role" class="form-control" name="role" required>
                <?php
                foreach ($roles as $role) {
                    echo "<option value=\"" . htmlspecialchars($role['role']) . "\">" . htmlspecialchars($role['role']) . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- El campo 'status' se envía oculto con el valor predeterminado 'active' -->
        <input type="hidden" name="status" value="active">

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require('inc/footer.php'); ?>
