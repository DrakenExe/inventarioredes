<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();



$rnd = strtoupper($_POST['rnd']);
$cbodocumento = strtoupper($_POST['cbodocumento']);
$numero = strtoupper($_POST['numero']);
$codigorequerimiento = strtoupper($_POST['codigorequerimiento']);
$fecha = strtoupper($_POST['fecha']);
$cbopersonal = $_POST["cbopersonal"];
$cboopcion = strtoupper($_POST['cboopcion']);
$cbosede = strtoupper($_POST['cbosede']);
$cbolocal = strtoupper($_POST['cbolocal']);
$cbopabellon = strtoupper($_POST['cbopabellon']);
$cbotipo = $_POST["cbotipo"];

$cboambiente = strtoupper($_POST['cboambiente']);
$recibido = $_POST["recibido"];


$ciexidingresoactivodetalle = $_POST["ciexidingresoactivodetalle"];
$camposciexidingresoactivodetalle = explode(",", $ciexidingresoactivodetalle);
$totciexidingresoactivodetalle = sizeof($camposciexidingresoactivodetalle);


$ciexestado = $_POST["ciexestado"];
$camposciexestado = explode(",", $ciexestado);
$totciexestado = sizeof($camposciexestado);
?>
<?php


 $consultorio = "insert into salida (tipodocumento,numerosalida,fechasalida,codigorequerimiento,recibido,opcionsalida,estado,idpersona,rnd,idsede,idpabellon,idlocal,idtipo,idambiente ) values 
('$cbodocumento','$numero','$fecha','$codigorequerimiento','$recibido','$cboopcion','SALIDA DEL EQUIPO','$cbopersonal','$rnd','$cbosede','$cbopabellon','$cbolocal','$cbotipo','$cboambiente')";
$rconsultorio = mysql_query($consultorio);

$rspreguntas = "select idsalida  from salida where rnd='$rnd'";
$pregunta = mysql_query($rspreguntas);
$rspreguntas = mysql_fetch_array($pregunta);
$codigoactivo = $rspreguntas["idsalida"];

for ($fils = 0; $fils < $totciexidingresoactivodetalle - 1; ++$fils)

{
    
    

 $s = "insert into salidadetalle(idsalida,idingresoactivodetalle,estados) 
values('$codigoactivo','$camposciexidingresoactivodetalle[$fils]','$camposciexestado[$fils]')";
    $cs = mysql_query($s);
   
    
    
       $persona = "UPDATE ingresoactivodetalle SET 
      estado='SALIDA DEL EQUIPO'
          where idingresoactivodetalle='$camposciexidingresoactivodetalle[$fils]'";
    $rpersona = mysql_query($persona);
    
    
}
$rstotal = " select count(*) + 1 as total  FROM salida s

          ";
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['total'];
?>

<script type="text/javascript">
    
      document.getElementById("numero").value = "FICHA00<?php echo $NroRegistros ?>";
        document.getElementById("codigorequerimiento").value = "DTI-000<?php echo $NroRegistros ?>";

    limpiarsalidaactivo();

</script>
    <?php
