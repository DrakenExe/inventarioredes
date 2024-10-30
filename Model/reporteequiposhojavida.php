<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$categoria = $_POST['categoria'];
$rsconsulta = "SELECT a.idatencion, a.fecha, a.tipomantenimiento, a.descripcion, a.estado, a.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida,i.prioridad,
    sa.codigorequerimiento, sa.recibido,sa.idsede, sa.idpabellon,  sa.idtipo, sa.idambiente, se.descripcionsede,lo.deslocal,CONCAT(pa.despabellon,' ', ti.destipo,' ',am.desambiente)AS DATOSPISO, am.idpiso,
    sdt.idsalidadetalle, sdt.idsalida, sdt.idingresoactivodetalle,sdt.estados, iadt.idingresoactivos, iadt.idactivo, act.idcategoria, act.idtiposactivo, act.idsubtipoactivos, act.idmarca,
    act.serie, act.codigoinventario, act.nombreequipo, act.estado, act.otros, cat.descategoria, tpa.descripcionta, sta.descripcionsta, ma.desmarca, ma.modelo FROM atencion a
inner join incidencias i on i.idincidencias=a.idincidencias inner join salida sa on sa.idsalida=i.idsalida inner join sede se on se.idsede=sa.idsede inner join pabellon pa on pa.idpabellon=sa.idpabellon
inner join local lo on lo.idlocal=sa.idlocal inner join tipo ti on ti.idtipo=sa.idtipo inner join ambiente am on am.idambiente=sa.idambiente
inner join salidadetalle sdt on sdt.idsalida=i.idsalida inner join ingresoactivodetalle iadt on iadt.idingresoactivodetalle=sdt.idingresoactivodetalle inner join activo act on act.idactivo=iadt.idactivo
inner join categoria cat on cat.idcategoria=act.idcategoria inner join tiposactivo tpa on tpa.idtiposactivo=act.idtiposactivo
inner join subtipoactivos sta on sta.idsubtipoactivos=act.idsubtipoactivos
inner join marca ma on ma.idmarca=act.idmarca

 WHERE act.codigoinventario='$categoria'";
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$descategoria = $rsconsulta['descategoria'];
$descripcionta = $rsconsulta['descripcionta'];
$descripcionsta = $rsconsulta['descripcionsta'];
$desmarca = $rsconsulta['desmarca'];
$modelo = $rsconsulta['modelo'];
$serie = $rsconsulta['serie'];
$nombreequipo = $rsconsulta['nombreequipo'];
$estado = $rsconsulta['estado'];
$otros = $rsconsulta['otros'];

$codigoinventario = $rsconsulta['codigoinventario'];
?>

<script src="../js/admin.js" type="text/javascript"></script> 

<div id="piecoti" style="padding-left:10px;">
    <div style="text-align:left" >
        <form action="re_ficheroExcel.php" method="post" target="_blank" id="frmdatos">
            <label onclick="imprimirSelec('contenedorcabecera');"><img src="img/impresora.png" alt="Imprimir" title="Imprimir"  style="cursor: pointer"  /></label>&nbsp;


        </form>
    </div>
</div>

<div id="contenedorcabecera">


    <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Hoja de Vida de los Activos </h4> 

        <table id="formulario">

            <tr>
                <td style=" padding-left: 10px"><div>
                        <img  id="muestra" src="../View/img/ucvformato.png" >

                    </div>
                </td>
            </tr>
        </table>
        <br>
        <form class="form-horizontal style-form">

            <table id="formulario" style="font-size: 12px; font-family: verdana;margin-bottom:6px;" border="0" cellpadding="0" cellspacing="0">
                <tr><td colspan="2"><span id="servicios"></span></td></tr>
                <tr style=" padding-top: 30px">
                    <td style="font-weight:bold;" >Codigo Patrimonial:</td>
                    <td >&nbsp;&nbsp;<?php echo $rsconsulta["codigoinventario"] ?></td>
                </tr>

                <tr style=" padding-top: 30px">
                    <td style="font-weight:bold;">Descripción del Equipo:</td>
                    <td >&nbsp;&nbsp;<?php echo $rsconsulta["descripcionta"] ?></td>
                </tr>
                <tr style=" padding-top: 30px">
                    <td style=" font-weight:bold;" >Tipo de Equipo:</td>
                    <td >&nbsp;&nbsp;<?php echo $rsconsulta["descripcionsta"] ?></td>
                </tr>
                <tr style=" padding-top: 30px">
                    <td style=" font-weight:bold;" >Marca:</td>
                    <td >&nbsp;&nbsp;<?php echo $rsconsulta["desmarca"] ?></td>
                </tr>

                <tr style=" padding-top: 30px">
                    <td style=" font-weight:bold;" >Serie:</td>
                    <td >&nbsp;&nbsp;<?php echo $rsconsulta["serie"] ?></td>
                </tr>



            </table>





            <div class="form-group row">
                <section id="unseen">
                    <table id="grilla" class="table table-bordered table-striped table-condensed" style="width:90%;margin-left:40px; font-size: 12px; font-family: verdana">
                        <thead>
                            <tr style="background: #4ECDC4;color: #fff">
                                <th >ACCION</th>
                                <th >DESCRIPCION</th>
                                <th>FECHA</th>
                                <th >AREA</th>
                                <th >RESPONSABLE</th>
                                <th >INCIDENCIA</th>
                                <th >CODIGO</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rsareas = "SELECT a.idatencion, a.fecha, a.tipomantenimiento, a.descripcion, a.estado, a.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida,i.prioridad,
    sa.codigorequerimiento, sa.recibido,sa.idsede, sa.idpabellon,  sa.idtipo, sa.idambiente, se.descripcionsede,lo.deslocal,CONCAT(pa.despabellon,' ', ti.destipo,' ',am.desambiente)AS DATOSPISO, am.idpiso,
    sdt.idsalidadetalle, sdt.idsalida, sdt.idingresoactivodetalle,sdt.estados, iadt.idingresoactivos, iadt.idactivo, act.idcategoria, act.idtiposactivo, act.idsubtipoactivos, act.idmarca,
    act.serie, act.codigoinventario, act.nombreequipo, act.estado, act.otros, cat.descategoria, tpa.descripcionta, sta.descripcionsta, ma.desmarca, ma.modelo FROM atencion a
inner join incidencias i on i.idincidencias=a.idincidencias inner join salida sa on sa.idsalida=i.idsalida inner join sede se on se.idsede=sa.idsede inner join pabellon pa on pa.idpabellon=sa.idpabellon
inner join local lo on lo.idlocal=sa.idlocal inner join tipo ti on ti.idtipo=sa.idtipo inner join ambiente am on am.idambiente=sa.idambiente
inner join salidadetalle sdt on sdt.idsalida=i.idsalida inner join ingresoactivodetalle iadt on iadt.idingresoactivodetalle=sdt.idingresoactivodetalle inner join activo act on act.idactivo=iadt.idactivo
inner join categoria cat on cat.idcategoria=act.idcategoria inner join tiposactivo tpa on tpa.idtiposactivo=act.idtiposactivo
inner join subtipoactivos sta on sta.idsubtipoactivos=act.idsubtipoactivos
inner join marca ma on ma.idmarca=act.idmarca

 WHERE act.codigoinventario='$categoria'";
                            $areas = mysql_query($rsareas);
                            while ($rsareas = mysql_fetch_array($areas)) {
                                ?>
                                <tr>

                                    <td class="numeric"><?php echo $rsareas['tipomantenimiento'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['descripcion'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['fecha'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['DATOSPISO'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['recibido'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['motivo'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['codigoinventario'] ?></td>










                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot >
                        </tfoot>
                    </table>
                </section>
            </div>






        </form>
        <br>
        <br>
         <br>
        <br>
             <table id="formulario">

            <tr>
                <td style=" padding-left: 10px"><div>
                        <img  id="muestra" src="../View/img/pie.png" >

                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>


