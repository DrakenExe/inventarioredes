<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$codigo = $_POST['codigo'];
$rsconsulta = "SELECT a.idactivo, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario, 
                            a.nombreequipo, a.estado, a.otros, a.rnd, c.descategoria, ta.descripcionta, sta.descripcionsta, mar.desmarca, mar.modelo FROM activo a
                            inner join categoria c on c.idcategoria=a.idcategoria
                            inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
                            inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
                            inner join marca mar on mar.idmarca=a.idmarca WHERE a.idactivo='$codigo'";
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


<div class="row mt">
    <div class="col-lg-3">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Activos</h4>

            <form class="form-horizontal style-form">



                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Categoria</label>
                    <div class="col-sm-9">
                        <input type="text" id="serie" value="<?php echo $descategoria ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Tipo</label>
                    <div class="col-sm-9">
                        <input type="text" id="codigo" value="<?php echo $descripcionta ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">SubTIpo</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreequipo" value="<?php echo $descripcionsta ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Marca</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $desmarca ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Modelo</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $modelo ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Codigo</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $codigoinventario ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros"  value="<?php echo $nombreequipo ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Otros</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $otros ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Estado</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" value="<?php echo $estado ?>" disabled class="form-control">
                    </div>

                </div>













            </form>
        </div>

    </div>
    <div class="col-lg-9">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Detalle de los Activos</h4> 

            <form class="form-horizontal style-form">





                <div class="form-group row">
                    <section id="unseen">
                        <table id="grilla" class="table table-bordered table-striped table-condensed" style="width:90%;margin-left:40px">
                            <thead>
                                <tr style="background: #4ECDC4;color: #fff">
                                    <th >Id</th>
                                    <th >Periferico</th>
                                    <th>Especificación 01</th>
                                    <th >Especificación 02</th>
                                    <th >Especificación 03</th>
                                    <th >Especificación 04</th>

                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rsareas = "SELECT a.idactivoperifericodetalle, a.descripcion1, a.descripcion2, a.descripcion3, a.descripcion4, a.idperifericos, a.idactivo, p.desperifericos FROM activoperifericodetalle a
inner join perifericos p on p.idperifericos=a.idperifericos where a.idactivo='$codigo'";
                                $areas = mysql_query($rsareas);
                                while ($rsareas = mysql_fetch_array($areas)) {
                                    ?>
                                    <tr>

                                        <td class="numeric"><?php echo $rsareas['idperifericos'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['desperifericos'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcion1'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcion2'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcion3'] ?></td>
                                        <td class="numeric"><?php echo $rsareas['descripcion4'] ?></td>
                                 
                                   








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

