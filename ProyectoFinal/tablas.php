<?php   

    include("conexion.php");

    $conexion->exec("USE $db_name");
    $stm = $conexion->prepare("SELECT * FROM persona");
    $stm->execute();
    $con = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("header.php"); ?>

<a href="agregar.php" class="btn btn-primary">¿Deseas agregar un nuevo registro?</a>

<div class="table-responsive">
    <br><table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID:</th>
                <th scope="col">Nombre:</th>
                <th scope="col">Celular:</th>
                <th>Fecha de Nacimiento:</th>
                <th>Email:</th>
                <th>Contraseña:</th>
                <th>Modelo:</th>
                <th>Opciones:</th>

            </tr>
        </theadclass>
        <tbody>
            <?php foreach($con as $conm){  ?>
            <tr class="">
                <td scope="row"><?php echo $conm['numero'];?></td>
                <td><?php echo $conm['nombre'];?></td>
                <td><?php echo $conm['celular'];?></td>
                <td><?php echo $conm['fecha_nacimiento'];?></td>
                <td><?php echo $conm['email'];?></td>
                <td><?php echo $conm['password'];?></td>
                <td><?php echo $conm['modelo'];?></td>
                <td>

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $conm['numero']; ?>">
                Editar
                </button>
                
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $conm['numero']; ?>">
                Eliminar
                </button>

                </td>
            </tr>
            <?php include("eliminar.php"); ?>
            <?php include("editar.php"); ?>
                
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>