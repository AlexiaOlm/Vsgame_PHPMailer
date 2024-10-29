<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <?php
    include_once '../../config/Conexion.php';
    include_once '../header.php';
    session_start();

    $formato = new Conexion();
    $conexion = $formato->get_conexion();

    function obtenerUsuarios($conexion) {
        $sql = "SELECT * FROM usuarios";
        $query = $conexion->prepare($sql);
        $query->execute();
        $resul = $query->fetchAll(PDO::FETCH_OBJ);
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Nickname</th>";
        echo "<th>Email</th>";
        echo "<th>Imagen</th>";
        echo "<th>Fecha de registro</th>";
        echo "</tr>";
        foreach($resul as $usuario) {
            echo "<tr>";
            echo "<td> $usuario->id </td>";
            echo "<td> $usuario->nickname </td>";
            echo "<td> $usuario->email </td>";
            echo "<td> $usuario->imagen </td>";
            echo "<td> $usuario->fecha_registro </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    obtenerUsuarios($conexion);

    $sql = "SELECT COUNT(id) AS num_usuarios FROM usuarios;";
    $stmt = $conexion->query($sql);
    $fila = $stmt->fetch();
    $num_usuarios = $fila['num_usuarios'];
    $_SESSION['num_usuarios'] = $num_usuarios;

    echo "<button href='userAdd.php'>Añadir usuario</button>";
    ?>
</body>
</html>