<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

if (empty($_SESSION['txtusuario'])) {

    header('location: ../index.php');
}



$nombres = strtoupper($_POST['nombres']);
$apellidos = strtoupper($_POST['apellidos']);
$direccion = strtoupper($_POST['direccion']);
$dni = strtoupper($_POST['dni']);
$celular = strtoupper($_POST['celular']);
$cargo = strtoupper($_POST['cargo']);



$rsinsertar = "INSERT INTO persona (nombres,apellidos,direccion,dni,celular,estado,idcargo ) VALUES
      ('$nombres','$apellidos','$direccion','$dni','$celular','ACTIVO','$cargo')";
$insertar = mysql_query($rsinsertar);
?>
<script type="text/javascript">

    limpiarpersonal();

</script>
        <?php
             
    
   
            



