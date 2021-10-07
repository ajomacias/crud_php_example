<?php
session_start();
if($_POST){
if(($_POST['usuario']=="anderson")&&($_POST['clave']==1234)){
  $_SESSION['usuario']="ok";
  $_SESSION['nombreUsuario']="Ander";
  header('Location:inicio.php');
}else{
  $mensaje = "El usuario y contraseña es incorrecto";
}
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     
      <div class="container">
          <div class="row">
          <div class="col-md-4"></div>
              <div class="col-md-4">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="card">
                      <div class="card-header">
                          Login
                      </div>
                      <?php if(isset($mensaje)) {?>
                      <div class="card-body">
                          <div class="alert alert-danger" role="alert">
                          <?php echo $mensaje;?>
                          </div>
                      <?php } ?>

                          <form method="POST" >
                          <div class = "form-group">
                          <label for="exampleInputEmail1">Usuario</label>
                          <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Escribe tu usuario" required>
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" name="clave" placeholder="Escribe tu contraseña" required>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Ingresar admin</button>
                          </form>
                          
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
 
  </body>
</html>