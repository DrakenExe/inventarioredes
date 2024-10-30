<?php
include('conexion.php');
session_start();
$cn = Conectarse();




$idsalida = strtoupper($_POST["idsalida"]);
$codigoincidencia = strtoupper($_POST["codigoincidencia"]);
$fecha= strtoupper($_POST["fecha"]);
$motivo = strtoupper($_POST["motivo"]);
$prioridad= strtoupper($_POST["prioridad"]);
$txtclave = strtoupper($_POST["txtclave"]);




$rsinsertar = "INSERT INTO incidencias (fechaincidencia,codigoincidencia,motivo,estado,rnd,idsalida,prioridad) VALUES
      ('$fecha','$codigoincidencia','$motivo','RECIBIDO','FERNANDO AREVALO','$idsalida','$prioridad')";
$insertar = mysql_query($rsinsertar);

 echo "<script>location.href='admin.php'</script>";


?>
<script type="text/javascript">
    

    document.getElementById("mensaje").innerHTML = "<ul style='overflow:hidden;list-style:none;'><li style='list-style:none;'><a style='text-decoration:none;color:#000,   width:200px;font-weight: bold;   font-size:15px;text-align: center' href='#'><p>Datos Guardado Correctamente</p></a></li></ul>";
    $(document).ready(function () {
        $("#mensaje").fadeIn(2000);
        setTimeout("hide()", 2000);
    });
    function hide() {
        $("#mensaje").fadeOut(800);
    }
</script>

<?php
?>




