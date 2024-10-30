<?php
include('conexion.php');
session_start();
$cn = Conectarse();

$idusuario = $_SESSION['idusuario'];
$nombres = $_SESSION['nombres'];
$apellidos = $_SESSION['apellidos'];
$celular = $_SESSION['celular'];
$direccion = $_SESSION['direccion'];
$descargo = $_SESSION['descargo'];
$dni = $_SESSION['dni'];
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


            <script>

                function buscarcodigopatrimonial()
                {
                    var txtcodigopatrimonial = $("#txtcodigopatrimonial").val();

                    if (txtcodigopatrimonial == "")
                    {
                        alert("Ingresar Codigo Patrimonial");
                    } else
                    {
                        document.getElementById("cargardatos").innerHTML = "";

                        $.post("cargarcodigopatrimonial.php",
                                {
                                    txtcodigopatrimonial: txtcodigopatrimonial

                                }, function (data) {
                            $("#cargardatos").html(data);
                        });
                    }
                }

            </script>

            <div data-role="header" style="background:#104A7B; color:#fff">
                <h1> 
                    Incidencia

                </h1>

            </div>

            <div id="cargardatos">


                <div data-role="main" class="ui-content">

                    <div data-role="fieldcontain">
                        <label for="textarea-1">Codigo</label>
                        <input type=text id="txtcodigopatrimonial"  maxlength="10" name="txtcodigopatrimonial" />
                    </div>

                    <button type="button" data-icon="search" onclick="buscarcodigopatrimonial();" style="background:#FE7210; color:#fff;"   >Buscar</button>

                </div>

            </div>


            <footer data-role="footer" style="background:#104A7B;color:#fff" data-position="fixed">  
                <h5>Derechos Reservados</h5>  
            </footer> 
        </div>




    </body>
</html>
