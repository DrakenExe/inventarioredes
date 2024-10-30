<?php
include('conexion.php');
session_start();
$cn = Conectarse();

      


$cboincidencia = strtoupper($_POST["cboincidencia"]);
$fecha = strtoupper($_POST["fecha"]);
$cbotipomantenimiento= strtoupper($_POST["cbotipomantenimiento"]);
$txtdescripcion = strtoupper($_POST["txtdescripcion"]);


$rsinsertar = "INSERT INTO atencion (fecha,tipomantenimiento,descripcion,estado,idincidencias) VALUES
      ('$fecha','$cbotipomantenimiento','$txtdescripcion','ATENDIDO','$cboincidencia')";
$insertar = mysql_query($rsinsertar);


      $persona = "UPDATE incidencias SET 
      estado='ATENDIDO'
          where idincidencias='$cboincidencia'";
    $rpersona = mysql_query($persona);

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




