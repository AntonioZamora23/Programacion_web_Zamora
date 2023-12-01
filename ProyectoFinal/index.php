<?php 

    include("conexion.php");

    if($_POST){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $conexion->exec("USE $db_name");
        $stm = $conexion->prepare("SELECT * FROM persona WHERE email=:email AND password=:password");
        $stm->bindParam(":email",$email);
        $stm->bindParam(":password",$password);

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            header("Location: tablas.php");
            exit();
        } else {
            // Credenciales incorrectas
            echo "<p class='pp'>Correo o contraseña incorrectos.</p>
            <style>.pp{ padding: 15px;
                background-color: #e74c3c;
                color: #fff;
                border-radius: 5px;}</style>";
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio</title>
    <link rel="icon" href="img/e.jpg" type="image/x-icon">

</head>
<body>
<form action="" method="post">
    <div class="ventana">
        <br>
        <label for="email">Correo</label><br>
        <input type="email" name="email" required placeholder="Email" class="tamaño">
        <br><br>
        <label for="contraseña" >Contraseña</label><br>
        <input type="password" name="password" required placeholder="Contraseña" class="tamaño">
        <br>
        <button class="b1" type="submit">Entrar</button>
        <br>
        <p>Si no estás registrado: <a  href="formulario.php">Regístrate</a> </p> 
        <br>
    </div>
    </form>
</body>
</html>