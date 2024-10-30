<?php
include('conexion.php');
session_start();
$cn = Conectarse();



$txtfecha = strtoupper($_POST["txtfecha"]);
$codigocliente = strtoupper($_POST["codigocliente"]);
$txthora= strtoupper($_POST["txthora"]);
$txtnumeroplaca = strtoupper($_POST["txtnumeroplaca"]);




$consultorio = "insert into reserva(fecha,fechareserva,horareserva,estadoreserva,idcliente,idpiso)  values 
         ('$txtnumeroplaca','$txtfecha','$txthora','PENDIENTE','$codigocliente','1')";
$rconsultorio = mysql_query($consultorio);




?>
<script type="text/javascript">
    

   


    document.getElementById("txtfecha").value = "";
    document.getElementById("txthora").value = "";
    document.getElementById("txtnumeroplaca").value = "";

 
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




