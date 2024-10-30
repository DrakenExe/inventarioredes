<?php

include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
$txtusuario = $_POST["txtusuario"];
$txtclave= $_POST["txtclave"];
 $sql = "SELECT u.idusuario, u.usuario, u.clave, u.estado, u.idpersona, p.nombres, p.apellidos, p.direccion, p.dni, p.celular, p.estado, p.idcargo, c.descargo FROM usuario u
inner join persona p on p.idpersona=u.idpersona
inner join cargo c on c.idcargo=p.idcargo
        where u.usuario='$txtusuario' and u.clave='$txtclave'";
$result = mysql_query($sql);
if ($rsusuario = mysql_fetch_array($result)
) {
    $_SESSION['idpersona'] = $rsusuario["idpersona"];
    $_SESSION['nombres'] = $rsusuario["nombres"];
    $_SESSION['apellidos'] = $rsusuario["apellidos"];
    $_SESSION['dni'] = $rsusuario["dni"];

    $_SESSION['celular'] = $rsusuario["celular"];
    $_SESSION['estado'] = $rsusuario["estado"];
    
       $_SESSION['descargo'] = $rsusuario["descargo"];

      $_SESSION['txtusuario'] = $txtusuario;
    echo "<script>location.href='administrador.php'</script>";
} else
    echo "Usted no es el Usuario...¡Ingresar Datos Correctos!";
?>
