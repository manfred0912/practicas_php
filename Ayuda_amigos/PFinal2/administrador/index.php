<?php
session_start();

//Validar que el usuario entre con las credenciales de "Admin" para poder ingresar
if($_POST){
    if(($_POST['usuario']=="Admin")&&($_POST['contraseña']=="Admin")){

       $_SESSION['usuario']="ok";
       $_SESSION['nombreAdmin']="Administrador";
       header("Location:inicioadmin.php");
    }else{
        //Guardar mensaje en variable
        $mensaje="El usuario o contraseña son incorrectos";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <div class="row">

        <div class="col-md-4">
            
        </div>

            <div class="col-md-4">
            <br><br><br>
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                <?php //Mostrar mensaje en caso de que exista ?>
                    <?php if(isset($mensaje)){ ?>

                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>

                    <?php } ?>

                        <form method="POST">

                        <div class = "form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingresar Usuario">
                        </div>

                        <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="contraseña" placeholder="Ingresar Contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>

                        </form>
                        
                        

                    </div>

                </div>
                
            </div>
            
        </div>
    </div>

  </body>
</html>