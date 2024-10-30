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
                        <div data-role="collapsible" data-collapsed="false" >
                            <h2 >Listar Reporte</h2>

                            <table data-role="table"  class="ui-responsive" border='1' style="font-size:15px">
                                <thead>
                                    <tr>
                                        <th style="background:#0062cc;color:#fff">Fecha</th>
                                        <th bgcolor="black"><b><font color="#2ecc71">Hora</font></b></th>
                                        <th bgcolor="black"><b><font color="#e67e22">Cliente</font></b></th>
                                        <th bgcolor="black"><b><font color="#c0392b">Placa</font></b></th>
                                        <th bgcolor="black"><b><font color="#c0442b">Estado</font></b></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rsareas = "SELECT r.idreserva, r.fecha, r.fechareserva, r.horareserva, r.estadoreserva, r.idcliente, r.idpiso,
                                       concat(c.nombres,' ',c.apellidos)as datos, c.din, c.celular, p.numero, p.idnivel, n.descripcionnivel FROM reserva r
                                    inner join cliente c on c.idcliente=r.idcliente
                                    inner join piso p on p.idpiso=r.idpiso
                                    inner join nivel n on n.idnivel=p.idnivel
                                    where r.idcliente='$idcliente'";
                                    $areas = mysql_query($rsareas);
                                    while ($rsareas = mysql_fetch_array($areas)) {
                                        ?>
                                        <tr>
                                            <td style="background:#0062cc;color:#fff"><?php echo $rsareas['fechareserva'] ?></td>
                                            <td><?php echo $rsareas['horareserva'] ?></td>
                                            <td><?php echo $rsareas['datos'] ?></td>
                                            <td><?php echo $rsareas['fecha'] ?></td>
                                            <td ><?php echo $rsareas['estadoreserva'] ?></td>

                                        </tr>
                                        <tr >
                                        <tr height="10px"></tr>

                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>





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
