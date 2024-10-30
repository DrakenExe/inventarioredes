<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$codigo = $_POST['codigo'];
$rsconsulta = "SELECT s.idsalida, s.tipodocumento, s.numerosalida, s.fechasalida, s.codigorequerimiento, s.recibido, s.opcionsalida, s.estado, s.idpersona, s.rnd,
s.idsede, s.idpabellon, s.idlocal, s.idtipo, s.idambiente, se.descripcionsede, pa.despabellon, ti.destipo, l.deslocal, a.desambiente, a.idpiso, pi.despiso
FROM salida s
inner join sede se on se.idsede=s.idsede
inner join pabellon pa on pa.idpabellon=s.idpabellon
inner join local l on l.idlocal=s.idlocal
inner join tipo ti on ti.idtipo=s.idtipo
inner join ambiente a on a.idambiente=s.idambiente
inner join piso pi on pi.idpiso=a.idpiso WHERE s.idsalida='$codigo'";
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$idsalida = $rsconsulta['idsalida'];
$tipodocumento = $rsconsulta['tipodocumento'];
$numerosalida = $rsconsulta['numerosalida'];
$fechasalida = $rsconsulta['fechasalida'];
$codigorequerimiento = $rsconsulta['codigorequerimiento'];
$recibido = $rsconsulta['recibido'];

$opcionsalida = $rsconsulta['opcionsalida'];
$estado = $rsconsulta['estado'];
$descripcionsede = $rsconsulta['descripcionsede'];
$despabellon = $rsconsulta['despabellon'];

$destipo = $rsconsulta['destipo'];
$deslocal = $rsconsulta['deslocal'];
$desambiente = $rsconsulta['desambiente'];
$despiso = $rsconsulta['despiso'];
?>




        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Detalle de la Salida de los Activos</h4> 

            <form class="form-horizontal style-form">





                <div class="form-group row">
                    <section id="unseen">
                         <table id="grilla" class="table table-bordered table-striped table-condensed" style="width:90%;margin-left:40px">
                            <thead>
                                <tr style="background: #4ECDC4;color: #fff">

                                    <th >Codigo Inv.</th>
                                    <th>Categoria</th>
                                    <th >Tipo</th>
                                    <th >Subtipo</th>
                                    <th >Marca</th>
                                      <th >Modelo</th>
                                    <th >Serie</th>
                                    <th >Nombre Equipo</th>
                                    <th >Estado</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rsareas = "SELECT s.idsalidadetalle, s.idsalida, s.idingresoactivodetalle, s.estados, iadt.idingresoactivos, iadt.idactivo, iadt.estado,
                                            ac.idcategoria, ac.idtiposactivo, ac.idsubtipoactivos, ac.idmarca, ac.serie, ac.codigoinventario, ac.nombreequipo, ac.estado, 
                                            ac.otros, ca.descategoria, ta.descripcionta, sta.descripcionsta, ma.desmarca, ma.modelo
                                            FROM salidadetalle s
                                            inner join ingresoactivodetalle iadt on iadt.idingresoactivodetalle=s.idingresoactivodetalle
                                            inner join activo ac on ac.idactivo=iadt.idactivo
                                            inner join categoria ca on ca.idcategoria=ac.idcategoria
                                            inner join tiposactivo ta on ta.idtiposactivo=ac.idtiposactivo
                                            inner join subtipoactivos sta on sta.idsubtipoactivos=ac.idsubtipoactivos
                                            inner join marca ma on ma.idmarca=ac.idmarca where s.idsalida='$codigo'";
                                $areas = mysql_query($rsareas);
                                while ($rsareas = mysql_fetch_array($areas)) {
                                    ?>
                                    <tr>

                                        <td class="numeric"><?php echo $rsareas['codigoinventario'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descategoria'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcionta'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcionsta'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['desmarca'] ?></td>
                                           <td class="numeric"><?php echo $rsareas['modelo'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['serie'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['nombreequipo'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['estados'] ?></td>










                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot >
                            </tfoot>
                        </table>
                    </section>
                </div>

     




            </form>
        </div>

 
  

