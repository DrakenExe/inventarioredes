<?php
include('conexion.php');
session_start();
$cn = Conectarse();
$usuariomovil = $_POST["usuariomovil"];
$password = $_POST["password"];

$sql = "SELECT u.idusuario, u.usuario, u.clave, u.estado, u.idpersona, p.nombres, p.apellidos, p.direccion, p.dni, p.celular, p.estado, p.idcargo, c.descargo FROM usuario u
inner join persona p on p.idpersona=u.idpersona
inner join cargo c on c.idcargo=p.idcargo
where u.usuario='$usuariomovil' and u.clave='$password' ";
$result = mysql_query($sql);
if ($sql = mysql_fetch_array($result)) {
    $_SESSION['idusuario'] = $sql["idusuario"];
    $_SESSION['nombres'] = $sql["nombres"];
    $_SESSION['apellidos'] = $sql["apellidos"];
    $_SESSION['dni'] = $sql["dni"];
    $_SESSION['celular'] = $sql["celular"];
    $_SESSION['direccion'] = $sql["direccion"];
        $_SESSION['descargo'] = $sql["descargo"];

    $_SESSION['usuario'] = $usuariomovil;
    header('Location:admin.php');
} else {
    ?>

    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Bienvenidos</title>
            <meta name="viewport" content="width=device-width,user-scalable=no" />  
            <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
            <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        </head>
        <body>
            <div data-role="page">

                <div data-role="content">
                    <center><img src="images/ucv.png" width="300"  alt="" style="margin-top: 10px;" /></center>
                    <p style="text-align: center"> Datos Incorrectos</p>
                    <a href="index.php" data-role="button" data-inline="false"
                       data-rel="back" data-transition="slideup"data-theme="a" style="background:#F97813;color:#fff"
                       data-icon="back" data-icompos="left">Regresar</a>

                </div>

                <div data-role="header">

                </div>

            </div>
        </body>
    </html>
<?php }
?>












