<?php
include('conexion.php');
session_start();
$cn = Conectarse();

$txtcodigopatrimonial = $_POST['txtcodigopatrimonial'];
$rsconsulta = "SELECT s.idsalida, s.tipodocumento, s.numerosalida, s.fechasalida, 
     s.codigorequerimiento, s.recibido, s.opcionsalida, s.estado, s.idpersona, s.rnd,s.idsede, s.idpabellon, 
     s.idlocal, s.idtipo, s.idambiente, se.descripcionsede, pa.despabellon, lo.deslocal, ti.destipo, am.desambiente, 
     am.idpiso, pi.despiso, sdt.idingresoactivodetalle, iad.idingresoactivos, iad.idactivo, ia.iddocumento, ia.numero, 
     ia.serie, ia.fecha, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario,
     a.nombreequipo, a.estado, a.otros, ca.descategoria, ta.descripcionta, sta.descripcionsta, ma.desmarca, ma.modelo 
     FROM salida s inner join sede se on se.idsede=s.idsede inner join pabellon pa on pa.idpabellon=s.idpabellon
     inner join local lo on lo.idlocal=s.idlocal inner join tipo ti on ti.idtipo=s.idtipo 
     inner join ambiente am on am.idambiente=s.idambiente inner join piso pi on pi.idpiso=am.idambiente 
     inner join salidadetalle sdt on sdt.idsalida=s.idsalida
     inner join ingresoactivodetalle iad on iad.idingresoactivodetalle=sdt.idingresoactivodetalle 
     inner join ingresoactivos ia on ia.idingresoactivos=iad.idingresoactivos
     inner join activo a on a.idactivo=iad.idactivo
     inner join categoria ca on ca.idcategoria=a.idcategoria
     inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
     inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
     inner join marca ma on ma.idmarca=a.idmarca
 where concat(a.codigoinventario,' ',a.serie) like '%$txtcodigopatrimonial%'";
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$idsalida = $rsconsulta['idsalida'];
$codigoinventario = $rsconsulta['codigoinventario'];
$descategoria = $rsconsulta['descategoria'];
$descripcionta = $rsconsulta['descripcionta'];
$descripcionsta = $rsconsulta['descripcionsta'];
$desmarca = $rsconsulta['desmarca'];
$modelo = $rsconsulta['modelo'];
$serie = $rsconsulta['serie'];
$nombreequipo = $rsconsulta['nombreequipo'];
$descripcionsede = $rsconsulta['descripcionsede'];
$despabellon = $rsconsulta['despabellon'];
$deslocal = $rsconsulta['deslocal'];
$destipo = $rsconsulta['destipo'];
$desambiente = $rsconsulta['desambiente'];
$despiso = $rsconsulta['despiso'];
$recibido = $rsconsulta['recibido'];



$rstotal = " select count(*) + 1 as total  FROM incidencias i";
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['total'];
?>
<!DOCTYPE HTML>
<meta name="viewport" content="width=device-width,user-scalable=no" />  

<link href="css/incidencia.css" rel="stylesheet">
<script>

    function validarguardarincidencia() {
        v1 = document.getElementById("fecha").value;
        v2 = document.getElementById("motivo").value;
        v3 = document.getElementById("prioridad").value;
 

        if (v1 == "" || v2 == "" | v3 == "" ) {
            return false;
        } else {
            return true;
        }
    }
    function guardarincidencia()
    {
        if (validarguardarincidencia() == true) {

            var idsalida = $("#idsalida").val();
            var codigoincidencia = $("#codigoincidencia").val();
            var fecha = $("#fecha").val();

            var motivo = $("#motivo").val();

            var prioridad = $("#prioridad").val();
      


            $.post("insertarincidencia.php", {

                idsalida: idsalida,
                codigoincidencia: codigoincidencia,
                fecha: fecha,

                motivo: motivo,

                prioridad: prioridad,
          

            }, function (data) {
                $("#mensaje").html(data)

            }
            );
        } else {
            $("#mensaje").html("<p style='color:#E74B3B,  font-weight: bold;   font-size:15px;text-align: center' >Ingresar Todos los Campos Obligatorios</p>");
        }

    }
</script>
<hr>

<div data-role="fieldcontain" style="margin-left:10px; ">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Codigo</label>
    <input type=text id="txtcodigopatrimonial"  value='<?php echo $codigoinventario ?>' disabled=" " class="incidencia" />

    <input type=hidden id="idsalida"  value='<?php echo $idsalida ?>' disabled=" " class="incidencia" />
      <input type="hidden" id="codigoincidencia" value="INCI-OO<?php echo $NroRegistros?>" class="form-control">
</div>

<div data-role="fieldcontain" style="margin-left:10px;">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Responsable</label>
    <input type=text id="txtcodigopatrimonial"  value='<?php echo $recibido ?>' disabled=" " class="incidencia"/>
</div>

<div data-role="fieldcontain" style="margin-left:10px;">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Equipo</label>
    <input type=text id="txtcodigopatrimonial"  value='<?php echo $descategoria ?>' disabled=" " class="incidencia"/>
</div>

<div data-role="fieldcontain" style="margin-left:10px;">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Tipo</label>
    <input type=text id="txtcodigopatrimonial"  value='<?php echo $descripcionta ?>' disabled=" " class="incidencia"/>
</div>

<div data-role="fieldcontain" style="margin-left:10px;">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Fecha</label>
    <input type=date id="fecha"  class="incidencia"/>
</div>

<div data-role="fieldcontain" style="margin-left:10px;">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Motivo</label>
    <textarea type=text id="motivo"  class="incidencia"></textarea>
</div>

<div data-role="fieldcontain" style="margin-left:10px;">
    <label for="textarea-1" style="font-weight:bold;font-size:12px;">Prioridad</label>
    <select  id="prioridad" >

        <option value="ALTA">ALTA</option>
        <option value="MEDIA">MEDIA</option>
        <option value="BAJA">BAJA</option>

    </select>
</div>

<div id="mensaje"></div>
<br>
<button type="button"  onclick="guardarincidencia();" class="botton"    >Registrar</button>

<a href="admin.php" style="background:red; color:#fff"  class="ui-btn ui-icon-delete ui-btn-icon-left">salir</a>