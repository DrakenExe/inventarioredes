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




            <div data-role="header" style="background:#104A7B; color:#fff">
                <h1> 
                    Atender Incidencia

                </h1>

            </div>




            <div data-role="main" class="ui-content">
<script>

    function vguardaratender() {
        v1 = document.getElementById("fecha").value;
        v2 = document.getElementById("cbotipomantenimiento").value;
        v3 = document.getElementById("txtdescripcion").value;
 

        if (v1 == "" || v2 == "" | v3 == "" ) {
            return false;
        } else {
            return true;
        }
    }
    function guardaratender()
    {
        if (vguardaratender() == true) {

            var cboincidencia = $("#cboincidencia").val();
         
            var fecha = $("#fecha").val();

            var cbotipomantenimiento = $("#cbotipomantenimiento").val();

            var txtdescripcion = $("#txtdescripcion").val();
      


            $.post("insertaratenderincidencia.php", {

                cboincidencia: cboincidencia,
   
                fecha: fecha,

                cbotipomantenimiento: cbotipomantenimiento,

                txtdescripcion: txtdescripcion
          

            }, function (data) {
                $("#mensaje").html(data)

            }
            );
        } else {
            $("#mensaje").html("<p style='color:red,  font-weight: bold;   font-size:15px;text-align: center' >Ingresar Todos los Campos Obligatorios</p>");
        }

    }
</script>

                <div data-role="fieldcontain">
                    <label for="select-choice-a" class="select">Incidencia</label>
                    <select name="cboincidencia" id="cboincidencia" data-native-menu="false" >
                            <option>Seleccionar</option>
                        <?php
                        $rsestado1 = "SELECT i.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida, i.prioridad,s.idsede,
                            s.idpabellon, s.idlocal, s.idtipo, s.idambiente,se.descripcionsede, pa.despabellon, l.deslocal, ti.destipo, am.desambiente, am.idpiso, 
                            pi.despiso,concat(s.recibido,' - ',se.descripcionsede)as datos FROM incidencias i
                                        inner join salida s on s.idsalida=i.idsalida
                                        inner join sede se on se.idsede=s.idsede
                                        inner join pabellon pa on pa.idpabellon=s.idpabellon
                                        inner join local l on l.idlocal=s.idlocal
                                        inner join tipo ti on ti.idtipo=s.idtipo
                                        inner join ambiente am on am.idambiente=s.idambiente
                                        inner join piso pi on pi.idpiso=am.idpiso where i.estado='RECIBIDO'";
                        $estado1 = mysql_query($rsestado1);
                        while ($rsestado1 = mysql_fetch_array($estado1)) {
                            ?>
                            <option style="font-size:10px" value="<?php echo $rsestado1["idincidencias"] ?>"><?php echo $rsestado1["datos"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>


                <div data-role="fieldcontain">
                    <label for="textarea-1">Fecha</label>
                    <input type=date id="fecha"  />
                </div>
                <div data-role="fieldcontain">
                    <label for="select-choice-a" class="select">Tipo</label>
                    <select name="cbotipomantenimiento" id="cbotipomantenimiento" data-native-menu="false" >
                            <option>Seleccionar</option>
                        <option value="MANTENIMIENTO PREVENTIVO">MANTENIMIENTO PREVENTIVO</option>
                        <option value="MANTENIMIENTO CORRECTIVO">MANTENIMIENTO CORRECTIVO</option>
                    </select>
                </div>
                
                      <div data-role="fieldcontain">
                    <label for="textarea-1">Descripción</label>
                    <textarea type=text id="txtdescripcion"  /></textarea>
                </div>

<div id="mensaje"></div>
                <button type="button" data-icon="search" onclick="guardaratender();" style="background:#FE7210; color:#fff;"   >Guardar</button>

            </div>




            <footer data-role="footer" style="background:#104A7B;color:#fff" data-position="fixed">  
                <h5>Derechos Reservados</h5>  
            </footer> 
        </div>




    </body>
</html>
