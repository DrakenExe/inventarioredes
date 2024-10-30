<?php
include('conexion.php');
session_start();
$cn = Conectarse();

$idcliente = $_SESSION['idcliente'];
$nombres = $_SESSION['nombres'];
$apellidos = $_SESSION['apellidos'];
$din = $_SESSION['din'];

date_default_timezone_set('America/Lima');
$fechaActu = date('Y/m/d', time());


$rstotal = "SELECT c.idcliente, concat(c.nombres,' ',c.apellidos)as datos FROM cliente c
        where idcliente=$idcliente";
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['datos'];
$codigocliente = $rstotal['idcliente'];
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
    <script>
        function carggarpiso()
        {

            var cbonivel = $("#cbonivel").val();


            document.getElementById("reserva").innerHTML = "Cargando..";
            $.post("cargarpiso.php", {

                cbonivel: cbonivel
            }, function (data) {
                $("#reserva").html(data);
            });
        }
    </script>
    <script>

        function validarcamposreserva() {
            v1 = document.getElementById("txtfecha").value;
            v2 = document.getElementById("txthora").value;
            v3 = document.getElementById("txtnumeroplaca").value;


            if (v1 == "" || v2 == "" | v3 == "") {
                return false;
            } else {
                return true;
            }
        }
        function guardarreserva()
        {
            if (validarcamposreserva() == true) {

                var txtfecha = $("#txtfecha").val();
                var codigocliente = $("#codigocliente").val();
                var txthora = $("#txthora").val();

                var txtnumeroplaca = $("#txtnumeroplaca").val();




                $.post("insertarreserva.php", {

                    txtfecha: txtfecha,
                    codigocliente: codigocliente,
                    txthora: txthora,

                    txtnumeroplaca: txtnumeroplaca

                }, function (data) {
                    $("#mensaje").html(data)

                }
                );
            } else {
                $("#mensaje").html("<p style='color:#E74B3B,  font-weight: bold;   font-size:15px;text-align: center' >Ingresar Todos los Campos Obligatorios</p>");
            }

        }
    </script>
    <body>
        <div data-role="page" id="page1" style="background:#fff; font-weight:bold">







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
                            <h2 >Generar Reserva</h2>


                            <div data-role="collapsibleset">


                                <div data-role="fieldcontain">
                                    <label for="textarea-1">Fecha</label>
                                    <input type=date id="txtfecha"  name="txtfecha" min="<?php echo $fechaActu ?>" />
                                    <input type="hidden" id="codigocliente" disabled=""    value="<?php echo $codigocliente ?>" class="form-control" >
                                </div>
                                <div data-role="fieldcontain">
                                    <label for="textarea-1">HORA</label>
                                    <input type=time id="txthora"  name="txthora"  />
                                </div>
                                         <div data-role="fieldcontain">
                                    <label for="textarea-1">NUMERO DE PLACA</label>
                                    <input type=text id="txtnumeroplaca"  name="txtnumeroplaca" maxlength="7" />
                                </div>
                                <div id="mensaje"></div>

                                <button type="button" data-icon="user" onclick="guardarreserva();" style="background:#159F85; color:#fff;"   >Registrar</button>

                                <a href="admin.php" style="background:#E74B3B; color:#fff"  class="ui-btn ui-icon-delete ui-btn-icon-left">salir</a>


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
