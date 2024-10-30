<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

$rnd = strtoupper($_POST['rnd']);
$documento = strtoupper($_POST['documento']);
$numero = strtoupper($_POST['numero']);
$Serie = strtoupper($_POST['Serie']);
$fecha = strtoupper($_POST['fecha']);
$cbopersonal = $_POST["cbopersonal"];


$ciexidactivo = $_POST["ciexidactivo"];
$camposciexidactivo = explode(",", $ciexidactivo);
$totciexidactivo = sizeof($camposciexidactivo);


$ciexestado = $_POST["ciexestado"];
$camposciexestado = explode(",", $ciexestado);
$totciexestado = sizeof($camposciexestado);
?>
<?php



$consultorio = "insert into ingresoactivos (iddocumento,numero,serie,fecha,idpersona,rnd) values 
('$documento','$numero','$Serie','$fecha','$cbopersonal','$rnd')";
$rconsultorio = mysql_query($consultorio);

$rspreguntas = "select idingresoactivos  from ingresoactivos where rnd='$rnd'";
$pregunta = mysql_query($rspreguntas);
$rspreguntas = mysql_fetch_array($pregunta);
$codigoactivo = $rspreguntas["idingresoactivos"];

for ($fils = 0; $fils < $totciexidactivo - 1; ++$fils) {
    
   
    $s = "insert into ingresoactivodetalle(idingresoactivos,idactivo,estado) 
values('$codigoactivo','$camposciexidactivo[$fils]','$camposciexestado[$fils]')";
    $cs = mysql_query($s);
    
    

    
      
       $persona = "UPDATE activo SET 
      estado='INGRESO'
          where idactivo='$camposciexidactivo[$fils]'";
    $rpersona = mysql_query($persona);
    
    
}
?>

<script type="text/javascript">

    limpiaringresoactivo();

</script>
    <?php
