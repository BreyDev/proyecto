<?php
session_start();
if($_POST){

    if ( ( $_POST['usuario']=='root' ) &&  ( $_POST['contrasena']=='12345' )) {


        $_SESSION['usuario']="root";
        header("location:index.php");
        
    }else{

    echo "<script>alert('Los datos no han sido correctos');</script>";


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

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

    <div class="container">
        
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <strong>Iniciar Sesion:</strong> 
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
         Usuario:
        <input type="text" class="form-control" name="usuario" id="">
           <br/>
        Contraseña:
        <input type="password" class="form-control" name="contrasena" id="">
        <br/>
        <input type="submit" class="btn btn-success"  value="Entrar a portafolio">
    
        </form>
            </div>
        
        </div>
        <div class="col-md-4">
            <div class="card-footer text-muted">
                
            </div>
        </div>
    </div>
    </div>


    
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
</body>

</html>