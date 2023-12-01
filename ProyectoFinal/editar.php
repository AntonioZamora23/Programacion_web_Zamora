<?php 

    include("conexion.php");

    if(isset($_GET["numero"])){
        
        $txtid = $_GET["numero"];
        $conexion->exec("USE $db_name");
        $stm = $conexion->prepare("SELECT * FROM persona WHERE numero=:txtid");
        $stm->bindparam(":txtid",$txtid);
        $stm->execute();
        $registro = $stm->fetch(PDO::FETCH_LAZY);
        $nombre = $registro['nombre'];
        $celular = $registro['celular'];
        $fecha_nacimiento = $registro['fecha_nacimiento'];
        $email = $registro['email'];
        $password = $registro['password'];
        $modelo = $registro['modelo'];

    } 

    if($_POST){
        $txtid = $_POST["txtid"];
        $nombre = $_POST["nombre"];
        $celular = $_POST["celular"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $modelo = $_POST["modelo"];

        $conexion->exec("USE $db_name");
        $stm=$conexion->prepare("UPDATE persona SET nombre=:nombre, celular=:celular, 
        fecha_nacimiento=:fecha_nacimiento, email=:email, password=:password, modelo=:modelo
        WHERE numero=:txtid");
        
        $stm->bindParam(":txtid",$txtid);
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":celular",$celular);
        $stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);
        $stm->bindParam(":email",$email);
        $stm->bindParam(":password",$password);
        $stm->bindParam(":modelo",$modelo);
        $stm->execute();

        header("location: tablas.php");
    }
?>

<!-- Modal -->
<div class="modal fade" id="editar<?php echo $conm['numero']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="editar.php?<?php echo $conm["numero"]; ?>" method="post">
      <input type="hidden" class="form-control" name="txtid" value="<?php echo $conm["numero"]; ?>">
      <div class="modal-body">
        
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $conm["nombre"]; ?>" required placeholder="Ingresa el Nombre">

        <label for="">Celular</label>
        <input type="" class="form-control" name="celular" value="<?php echo $conm["celular"]; ?>" required placeholder="Ingresa el Celular">

        <label for="">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $conm["fecha_nacimiento"]; ?>" required placeholder="Ingresa la fecha de nacimiento">

        <label for="">Correo</label>
        <input type="email" class="form-control" name="email" value="<?php echo $conm["email"]; ?>" required placeholder="Ingresa el email">

        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="password" value="<?php echo $conm["password"]; ?>" required placeholder="Ingresa la contraseña">

        <label for="">Vuelve a elegir el Modelo</label>
        <select name="modelo">
                <option value="leon">CUPRA León 2024</option>
                <option value="formentor">CUPRA Formentor 2024</option>
                <option value="ateca">CUPRA Ateca 2024</option>
            </select>
                
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
