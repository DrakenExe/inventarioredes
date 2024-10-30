<?php
include('conexion.php');
session_start();
$cn = Conectarse();
$nombres = $_SESSION['nombres'];
$apellidos = $_SESSION['apellidos'];

$dni = $_SESSION['dni'];
$celular = $_SESSION['celular'];
$descargo = $_SESSION['descargo'];

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <meta name="viewport" content="width=device-width,user-scalable=no" />  

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    </head>

    <body>
        <div data-role="page" id="page1" style="background:#fff;">




            <div data-role="header" style="background:#fff; color:#fff">
                <center><img src="images/ucv.png" width="250"  alt="" style="margin-top:20px;" /></center>

            </div>
            <p style="text-align: center;font-weight:bold"><?php echo $_SESSION['nombres'] ?> <?php echo $_SESSION['apellidos'] ?> </p>
            <div data-role="main" class="ui-content" style="text-align: center">



                <a href="#popupDialog" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop" style="background:#003E62;color:#fff; width: 115px" class="ui-btn ui-btn-inline ui-icon-home ui-btn-icon-top">Bienvenido</a>

                <a href="incidencia.php" style="background:#FF8700;color:#fff;width: 115px" class="ui-btn ui-btn-inline ui-icon-comment ui-btn-icon-top">Incidencia</a>

                <a href="atenderincidencia.php" style="background:#007A31;color:#fff;width: 115px" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-top">Atender</a>


                <a href="cerrarSesion.php" style="background:red;color:#fff;width: 115px" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-top">Salir</a>
            </div>
            <div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="a" style="max-width:400px;" class="ui-corner-all">
                <div data-role="header" data-theme="a" class="ui-corner-top">

                </div>
                <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content" style="text-align: center">
                    <h3 class="ui-title"><?php echo $_SESSION['nombres'] ?></h3>
                    <h3 class="ui-title"><?php echo $_SESSION['apellidos'] ?></h3>
                    <h3 class="ui-title"><?php echo $_SESSION['dni'] ?></h3>
                    <h3 class="ui-title"><?php echo $_SESSION['celular'] ?></h3>
                    <h3 class="ui-title"><?php echo $_SESSION['descargo'] ?></h3>
              

                    <a href="admin.php" data-role="button" data-inline="true"  data-theme="a">Salir</a>    

                </div>
            </div>
            <footer data-role="footer" style="background:red;color:#fff" data-position="fixed">  
                <h5>Derechos Reservados</h5>  
            </footer> 
        </div>




    </body>
</html>
