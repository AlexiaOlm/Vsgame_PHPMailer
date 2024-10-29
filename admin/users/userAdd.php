<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <?php
    include_once '../../config/Conexion.php';
    include_once '../header.php';
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    
    if(isset($_POST['añadir'])) {
        $nombre = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "INSERT INTO usuarios (nombre, email, password_) VALUES 
        (:nombre, :email, :password_);";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        header("../../mail/registro.php");
    }
    ?>

    <main>
        <section class="dashboard-info">
           <div class="form-container">
            <h2>Añadir Usuario</h2>
            <form action="" method="POST">
                <label for="nickname">Nickname:</label>
                <input type="text" name="nickname" id="nickname" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="añadir">Añadir Usuario</button>
            </form>
        </div>
        </section>
    </main>
</body>
</html>
