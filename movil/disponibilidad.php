<?php
include('conexion.php');
session_start();
$cn = Conectarse();

$idcliente = $_SESSION['idcliente'];
$nombres = $_SESSION['nombres'];
$apellidos = $_SESSION['apellidos'];
$din = $_SESSION['din'];
?>




<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SAIMT</title>
        <meta name="viewport" content="width=device-width,user-scalable=no" />  

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    </head>


    <body>
        <div data-role="page" id="page1" style="background:#fff;">







            <div data-role="panel" id="myPanel"> 
                <h2>Bienvenido</h2>
                <div data-role="controlgroup" data-type="vertical">
                    <p><?php echo $_SESSION['apellidos'] ?>   <?php echo $_SESSION['nombres'] ?></p>

                    <a href="admin.php" class="ui-btn ui-icon-user ui-btn-icon-left">Inicio</a>
                    <a href="reserva.php" class="ui-btn ui-icon-edit ui-btn-icon-left">Generar Reserva</a>
                    <a href="reporte.php" class="ui-btn ui-icon-bars ui-btn-icon-left">Reportes</a>
                    <hr>
                    <a href="cerrarSesion.php" class="ui-btn ui-icon-delete ui-btn-icon-left">Salir</a>
                </div>
            </div> 

            <div data-role="header" style="background:#04496D; color:#fff">
                <h1>SAIMT</h1>
                <a href="#myPanel" class="ui-btn ui-icon-bullets ui-btn-icon-notext ui-btn-inline ui-corner-all ui-shadow">Menu</a>
            </div>

            <div data-role="main" class="ui-content">

                <div data-role="content" >
                    <div data-role="collapsible-set"   >
                        <div data-role="collapsible" data-collapsed="true" >
                            <h2 >Disponibilidad Parqueos</h2>


                            <div data-role="collapsibleset">


                                <div data-role="fieldcontain">

                                    <div class="row">

                                        <?php
                                        $consulta = mysql_query("SELECT p.idpiso, concat(p.numero,' ', p.estado)as datos, p.idnivel, n.descripcionnivel FROM piso p
inner join nivel n on n.idnivel=p.idnivel where p.estado='DISPONIBLE'");
                                        while ($filas = mysql_fetch_array($consulta)) {
                                            $idpiso = $filas['idpiso'];
                                            $datos = $filas['datos'];
                                            ?>            
                                            <section class="col-md-1">

                                                <button  type="text" 

                                                         <p style="text-align:center;background:#31AF91;color:#fff;font-size:10px"><?php echo $datos; ?></p>

                                                </button>


                                            </section>

                                        <?php } ?>

                                    </div>

                                </div>







                            </div>

                        </div>

                    </div>

            <div data-role="collapsible-set"   >
                        <div data-role="collapsible" data-collapsed="false" >
                            <h2 >Ocupado Parqueos</h2>


                            <div data-role="collapsibleset">


                                <div data-role="fieldcontain">

                                    <div class="row">

                                        <?php
                                        $consulta = mysql_query("SELECT p.idpiso, concat(p.numero,' ', p.estado)as datos, p.idnivel, n.descripcionnivel FROM piso p
inner join nivel n on n.idnivel=p.idnivel where p.estado='OCUPADO'");
                                        while ($filas = mysql_fetch_array($consulta)) {
                                            $idpiso = $filas['idpiso'];
                                            $datos = $filas['datos'];
                                            ?>            
                                            <section class="col-md-1">

                                                <button  type="text" 

                                                         <p style="text-align:center;background:#EB6532;color:#fff;font-size:10px"><?php echo $datos; ?></p>

                                                </button>


                                            </section>

                                        <?php } ?>

                                    </div>

                                </div>







                            </div>

                        </div>

                    </div>


                </div>



            </div>






            <footer data-role="footer" style="background:#04496D;color:#fff" data-position="fixed">  
                <h5>Derechos Reservados</h5>  
            </footer> 
        </div>




    </body>
</html>
