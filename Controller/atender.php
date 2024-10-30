<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

if (empty($_SESSION['txtusuario'])) {

    header('location: ../index.php');
}
$fechaatencion = strtoupper($_POST['fechaatencion']);
$cbotipomantenimiento = strtoupper($_POST['cbotipomantenimiento']);
$descripcion = strtoupper($_POST['descripcion']);
$estadoatencion = strtoupper($_POST['estadoatencion']);
$codigo = strtoupper($_POST['codigo']);


        
$rsinsertar = "INSERT INTO atencion (fecha,tipomantenimiento,descripcion,estado,idincidencias) VALUES
      ('$fechaatencion','$cbotipomantenimiento','$descripcion','$estadoatencion','$codigo')";
$insertar = mysql_query($rsinsertar);


      $persona = "UPDATE incidencias SET 
      estado='$estadoatencion'
          where idincidencias='$codigo'";
    $rpersona = mysql_query($persona);
    
       echo "<script>location.href='administrador.php'</script>";
?>
<script type="text/javascript">

    limpiaratender();

</script>
        <?php
             
    
   
            



