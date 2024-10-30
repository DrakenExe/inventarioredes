<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

if (empty($_SESSION['txtusuario'])) {

    header('location: ../index.php');
}



$txtcategoria = strtoupper($_POST['txtcategoria']);



        
$rsinsertar = "INSERT INTO tiposactivo (descripcionta) VALUES
      ('$txtcategoria')";
$insertar = mysql_query($rsinsertar);
?>
<script type="text/javascript">

    limpiartipoactivo();

</script>
        <?php
             
    
   
            



