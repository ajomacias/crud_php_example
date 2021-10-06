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
        header("Location:productos.php");
        break;
    
    case "Modificar":
        $sentenciaSQL= $conexion->prepare(" UPDATE libros SET nombre =:nombre, imagen = :imagen WHERE libros.id =:id;");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;
  
    case "Seleccionar":
        $sentenciaSQL= $conexion->prepare("SELECT * FROM libros WHERE libros.id=:id ");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtImagen = $libro['imagen'] ;
        $txtNombre = $libro['nombre'] ;
        
        

        break;
    
    case "Borrar":
        $sentenciaSQL= $conexion->prepare("DELETE FROM libros WHERE libros.id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();   
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
<input required readonly type="text" value="<?php echo $txtID;?>"class="form-control" name="txtID" id="txtID" aria-describedby="emailHelp" placeholder="Ingrese el id">
</div>
<div class="form-group">
<label for="txtNombre">Nombre de libro:</label>
<input required type="text" value="<?php echo $txtNombre; ?>"class="form-control" id="txtNombre" name="txtNombre" placeholder="Password">
</div>
<div class="form-group">
<label for="txtImageb">Imagen de libro:</label>
<input required type="text" value="<?php echo $txtImagen?>" class="form-control" id="txtImagen" name="txtImagen" placeholder="Ingrese la imagen">
</div>
<div class="btn-group" role="group" aria-label=""> 
<button type="buttom" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> name="action" value="Agregar"  class="btn btn-success">Agregar</button>
<button type="buttom" name="action"  <?php echo ($accion!="Seleccionar")?"disabled":""; ?>  value="Modificar" class="btn btn-warning">Modificar</button>
<button type="buttom" name="action"  <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
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
                <td>
                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id'] ?>"/>
                        <input type="submit" value="Borrar" name="action" class="btn btn-danger">
                        <input type="submit" value="Seleccionar" name="action" class="btn btn-primary"/>
                        
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>

<?php include("../template/pie.php"); ?>