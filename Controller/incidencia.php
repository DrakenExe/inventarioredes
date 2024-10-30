<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

if (empty($_SESSION['txtusuario'])) {

    header('location: ../index.php');
}

 
$idsalida = strtoupper($_POST['idsalida']);
$codigo = strtoupper($_POST['codigo']);
$fecha = strtoupper($_POST['fecha']);
$motivo = strtoupper($_POST['motivo']);
$prioridad = strtoupper($_POST['prioridad']);
$estado = strtoupper($_POST['estado']);
$rnd = strtoupper($_POST['rnd']);

        
$rsinsertar = "INSERT INTO incidencias (fechaincidencia,codigoincidencia,motivo,estado,rnd,idsalida,prioridad) VALUES
      ('$fecha','$codigo','$motivo','$estado','$rnd','$idsalida','$prioridad')";
$insertar = mysql_query($rsinsertar);


$rstotal = " select count(*) + 1 as total  FROM incidencias Ii
          ";
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['total'];
?>
<script type="text/javascript">
 document.getElementById("codigo").value = "INCI-00<?php echo $NroRegistros ?>";
    limpiarincidencia();

</script>
        <?php
             
    
   
            



