
    <?php include 'cabecera.php'?>
    <?php include 'conexion.php'?>
    <?php

    if($_POST){
        //print_r($_POST);
        $proyecto=$_POST['proyecto'];
        $descripcion=$_POST['descripcion'];
        $fecha=new DateTime();
        $imagen=$fecha->getTimestamp()."_".$_FILES['imagen']['name'];


        $imagen_temporal=$_FILES['imagen']['tmp_name'];
        
        move_uploaded_file($imagen_temporal,"imagenes/".$imagen);


        $objConexion=new conexion();
        $sql="INSERT INTO `proyectos` (`ID`, `NOMBRE`, `IMAGEN`, `DESCRIPCION`) VALUES (NULL,'$proyecto', '$imagen', '$descripcion');";
        $objConexion->ejecutar($sql);


    }if($_GET){
        //print_r($_GET);
        $id=$_GET['borrar'];
        
        $objConexion=new conexion();

        $imagen=$objConexion->consultar("DELETE FROM `proyectos` WHERE `proyectos`.`ID` =". $id);
        //unlink("imagenes/".$imagen[0]['imagen']);

        $sql="DELETE FROM `proyectos` WHERE `proyectos`.`ID` =".$id;
        $objConexion->ejecutar($sql);

    }
    $objConexion=new conexion();
    $proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");
   
    ?>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <div class="container">
        <div class="card">
        <div class="card-header">
            Datos del proyecto
        </div>
        <div class="card-body">
            <form action="portafolio.php" method="post" enctype="multipart/form-data">
            Nombre del proyecto:    <input type="text" class="form-control" name="proyecto" id=""><br/>
            Imagen del proyecto:    <input type="file" class="form-control" name="imagen" id=""><br/>
            Descripcion: <br/><textarea name="descripcion" class="form-control" rows="3" ></textarea><br/>
            <input type="submit" class="btn btn-success"  value="Enviar proyecto">
         </form>
        </div>
        <div class="card-footer text-muted">
            
        </div>
    </div>
       </div>
            </div>  
            <div class="col-md-6">
               <div class="container">
               <table class="table">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Imagen</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr><?php foreach($proyectos as $proyecto){ ?>
        <td><?php echo $proyecto['ID'];?></td>
        <td><?php echo $proyecto['NOMBRE'];?></td>
        <td><img width="100" src="imagenes/<?php echo $proyecto['IMAGEN'];?>"   alt="" srcset=""></td>
        <td><?php echo $proyecto['DESCRIPCION'];?></td>
        <td><a id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto["ID"] ?>";>Eliminar</a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
         </div> 
        </div> 
        </div>
       <br/>
        
         
         

    <?php include 'pie.php'?>
