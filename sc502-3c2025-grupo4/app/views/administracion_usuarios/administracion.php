<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Rol de Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Actualizar Rol de Usuario</h2>
        <form action="../controllers/ActRole.php" method="POST">
            <label for="user_id">Seleccione Usuario:</label>
            <select name="user_id" id="user_id" required>
                <?php
                require_once '../models/User.php';

                // Obtener todos los usuarios
                $usuarios = User::getAllUsers();

                // Excluir al usuario actual (almacenado en la sesión)
                $idUsuarioActual = $_SESSION['id_usuario'] ?? 0;

                foreach ($usuarios as $usuario):
                    if ($usuario['id_usuario'] == $idUsuarioActual) {
                        continue; // Saltar al usuario actual
                    }
                ?>
                    <option value="<?php echo $usuario['id_usuario']; ?>">
                        <?php echo htmlspecialchars($usuario['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="role_id">Seleccione Rol:</label>
            <select name="role_id" id="role_id" required>
                <?php
                require_once '../models/Role.php';
                $roles = Role::getAllRoles();

                foreach ($roles as $role):
                ?>
                    <option value="<?php echo $role['id_rol']; ?>">
                        <?php echo htmlspecialchars($role['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="hidden" name="action" value="update_role">
            <button type="submit">Actualizar Rol</button>
        </form>
    </div>
</body>
</html>
