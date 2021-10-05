<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_POST['txtImagen']))?$_POST['txtImagen']:"";
$accion=(isset($_POST['action']))?$_POST['action']:"";

echo $txtID."</br>";
echo $txtNombre."</br>";
echo $txtImagen."</br>";
echo $accion."</br>";

switch ($accion){
    case "Agregar":
        echo "Presionando boton agregar";
        break;
    case "Cancelar":
        echo "Presionando boton cancelarr";
        break;
    
    case "Modificar":
        echo "Presionando el boton Modificar";
        break;
    }

$host="localhost";
$bd="sitio";
$usuario="root";
$contraseña="";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contraseña);
    if($conexion){ echo "conectado a la base";}

} catch ( Exception $ex ) {
    echo $ex->getMessage();
}

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
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Imagen</td>
                <td>Actions</td>
            </tr>
        </tbody>
    </table>
    
</div>

<?php include("../template/pie.php"); ?>