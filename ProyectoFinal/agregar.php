<?php 

    include("conexion.php");

    if($_POST){
        $nombre = $_POST["nombre"];
        $celular = $_POST["celular"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $modelo = $_POST["modelo"];


        $conexion->exec("USE $db_name");
        $stm=$conexion->prepare("INSERT INTO persona(nombre, celular, fecha_nacimiento, email, password, modelo)
        VALUES(:nombre,:celular,:fecha_nacimiento,:email,:password,:modelo)");
        
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":celular",$celular);
        $stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);
        $stm->bindParam(":email",$email);
        $stm->bindParam(":password",$password);
        $stm->bindParam(":modelo",$modelo);

        $stm->execute();

        echo '<script>window.location.href = "tablas.php";</script>';
        exit;
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="D:\Imagenes\Saved Pictures\CupraLog.jpg" type="image/x-icon">
    <title>Cupra 2024</title>
    <link rel="stylesheet" href="Style.css"> <!-- Corrige la ruta al archivo CSS -->
</head>
<body>

    <form action="" method="post">
        <h2 class="titulo">Registro Cupra 2024</h2>

        <div class="campo">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
        </div>

        <div class="campo">
            <label for="celular">Número de Celular (10 dígitos):</label>
            <input type="number" id="celular" name="celular"  placeholder="Ingresa tu número de celular" required>
        </div>

        <div class="campo">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingresa tu fecha de nacimiento" required>
            <p class="error" id="fecha_nacimiento_error"></p>
        </div>

        <div class="campo">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
        </div>

        <div class="campo">
            <label for="password">Contraseña:</label>
            <input type="password" id="pass" name="password" placeholder="Ingresa tu contraseña" required>
        </div>

        <div class="campo">
            <label for="modelo">Modelo Deseado:</label>
            <select name="modelo">
                <option value="leon">CUPRA León 2024</option>
                <option value="formentor">CUPRA Formentor 2024</option>
                <option value="ateca">CUPRA Ateca 2024</option>
            </select>
        </div>

        <button type="submit">Registrar</button>

    </form>

</body>
</html>
