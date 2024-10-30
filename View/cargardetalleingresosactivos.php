<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$codigo = $_POST['codigo'];
$rsconsulta = "SELECT i.idingresoactivos, i.iddocumento, i.numero, i.serie, i.fecha, i.idpersona, concat(p.nombres,' ',p.apellidos)as datos, p.idcargo, c.descargo, d.descripcion FROM ingresoactivos i
                                    inner join persona p on p.idpersona=i.idpersona
                                    inner join cargo c on c.idcargo=p.idcargo
                                    inner join documento d on d.iddocumento=i.iddocumento WHERE i.idingresoactivos='$codigo'";
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$iddocumento = $rsconsulta['iddocumento'];
$numero = $rsconsulta['numero'];
$serie = $rsconsulta['serie'];
$fecha = $rsconsulta['fecha'];
$datos = $rsconsulta['datos'];
$descripcion = $rsconsulta['descripcion'];
?>


<div class="row mt">
    <div class="col-lg-3">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Ingreso de los Activos</h4>

            <form class="form-horizontal style-form">



                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Documento</label>
                    <div class="col-sm-9">
                        <input type="text" id="serie" value="<?php echo $descripcion ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">NUmero</label>
                    <div class="col-sm-9">
                        <input type="text" id="codigo" value="<?php echo $numero ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Serie</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreequipo" value="<?php echo $serie ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Fecha</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $fecha ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Encargado</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $datos ?>" disabled class="form-control">
                    </div>

                </div>














            </form>
        </div>

    </div>
    <div class="col-lg-9">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Detalle de los Activos Ingresados</h4> 

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
                                    <th >Serie</th>
                                    <th >Nombre Equipo</th>
                                    <th >Estado</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rsareas = "SELECT i.idingresoactivodetalle, i.idingresoactivos, i.idactivo, i.estado, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, 
                                            a.codigoinventario, a.nombreequipo, a.estado, a.otros, ca.descategoria, ta.descripcionta, sta.descripcionsta, ma.desmarca, ma.modelo 
                                            FROM ingresoactivodetalle i
                                            inner join activo a on a.idactivo=i.idactivo
                                            inner join categoria ca on ca.idcategoria=a.idcategoria
                                            inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
                                            inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
                                            inner join marca ma on ma.idmarca=a.idmarca where i.idingresoactivos='$codigo'";
                                            $areas = mysql_query($rsareas);
                                            while ($rsareas = mysql_fetch_array($areas)) 
                                             {
                                    ?>
                                    <tr>

                                        <td class="numeric"><?php echo $rsareas['codigoinventario'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descategoria'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcionta'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcionsta'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['desmarca'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['serie'] ?></td>
                                         <td class="numeric"><?php echo $rsareas['nombreequipo'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['estado'] ?></td>










                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot >
                            </tfoot>
                        </table>
                    </section>
                </div>

                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    <!-- col-lg-12-->
</div>

