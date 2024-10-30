<?php
include('conexion.php');
session_start();
$cn = Conectarse();


$txtdni = strtoupper($_POST["txtdni"]);
$txtnombres = strtoupper($_POST["txtnombres"]);
$txtapellidos= strtoupper($_POST["txtapellidos"]);
$txtcelular = strtoupper($_POST["txtcelular"]);
$txtusuario = strtoupper($_POST["txtusuario"]);
$txtclave = strtoupper($_POST["txtclave"]);




$consultorio = "insert into cliente(nombres,apellidos,din,celular,usuario,clave)  values 
         ('$txtnombres','$txtapellidos','$txtdni','$txtcelular','$txtusuario','$txtclave')";
$rconsultorio = mysql_query($consultorio);




?>
<script type="text/javascript">
    

   


    document.getElementById("txtdni").value = "";
    document.getElementById("txtnombres").value = "";
    document.getElementById("txtapellidos").value = "";

    document.getElementById("txtcelular").value = "";
    document.getElementById("txtusuario").value = "";


    document.getElementById("txtclave").value = "";
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




