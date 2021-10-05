<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_POST['txtImagen']))?$_POST['txtImagen']:"";
$accion=(isset($_POST['action']))?$_POST['action']:"";

include("../config/db.php");

switch ($accion){
    case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO libros (id, nombre, imagen) VALUES (NULL,:nombre,:imagen);");
        $sentenciaSQL->bindParam(":nombre",$txtNombre);
        $sentenciaSQL->bindParam(":imagen",$txtImagen);
        $sentenciaSQL->execute();
        break;
    case "Cancelar":
        break;
    
    case "Modificar":
        break;
    }
$sentenciaSQL= $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<?php include("../template/cabecera.php"); ?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de libros
        </div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
<div class = "form-group">
<label for="txtID">ID:</label>
<input type="text" class="form-control" name="txtID" id="txtID" aria-describedby="emailHelp" placeholder="Ingrese el id">
</div>
<div class="form-group">
<label for="txtNombre">Nombre de libro:</label>
<input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Password">
</div>
<div class="form-group">
<label for="txtImageb">Imagen de libro:</label>
<input type="text" class="form-control" id="txtImagen" name="txtImagen" placeholder="Ingrese la imagen">
</div>
<div class="btn-group" role="group" aria-label=""> 
<button type="buttom" name="action" value="Agregar"  class="btn btn-success">Agregar</button>
<button type="buttom" name="action" value="Modificar" class="btn btn-warning">Modificar</button>
<button type="buttom" name="action" value="Cancelar" class="btn btn-info">Cancelar</button>
</div>
</form>
          
        </div>
        
    </div>

</div>

<div class="col-md-7">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>imagen</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaLibros as $libro){?>
            <tr>
                <td> <?php echo $libro['id'] ?> </td>
                <td><?php echo $libro['nombre'] ?></td>
                <td> <img class="img-table" src="<?php echo $libro['imagen'] ?>" alt="hola"></td>
                <td><?php echo $libro['id'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>

<img src="<?php echo $libro['imagen'] ?>" alt="hola">

<?php include("../template/pie.php"); ?>