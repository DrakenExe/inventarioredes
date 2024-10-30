<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$codigo = $_POST['codigo'];
$rsconsulta = "SELECT i.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida, i.prioridad, s.idsede, s.idpabellon, s.idlocal, s.idtipo, s.idambiente,
se.descripcionsede, pa.despabellon, l.deslocal, ti.destipo, am.desambiente, am.idpiso, pi.despiso, s.recibido FROM incidencias i
inner join salida s on s.idsalida=i.idsalida
inner join sede se on se.idsede=s.idsede
inner join pabellon pa on pa.idpabellon=s.idpabellon
inner join local l on l.idlocal=s.idlocal
inner join tipo ti on ti.idtipo=s.idtipo
inner join ambiente am on am.idambiente=s.idambiente
inner join piso pi on pi.idpiso=am.idpiso WHERE i.idincidencias='$codigo'";
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$idincidencias = $rsconsulta['idincidencias'];
$fechaincidencia = $rsconsulta['fechaincidencia'];
$codigoincidencia = $rsconsulta['codigoincidencia'];
$motivo = $rsconsulta['motivo'];
$estado = $rsconsulta['estado'];
$rnd = $rsconsulta['rnd'];
$prioridad = $rsconsulta['prioridad'];
$descripcionsede = $rsconsulta['descripcionsede'];
$despabellon = $rsconsulta['despabellon'];
$deslocal = $rsconsulta['deslocal'];

$destipo = $rsconsulta['destipo'];
$desambiente = $rsconsulta['desambiente'];
$despiso = $rsconsulta['despiso'];
$recibido = $rsconsulta['recibido'];
?>
<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="css/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="../js/atender.js" type="text/javascript"></script> 

<div class="row mt">
    <div class="col-lg-5">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Datos de la Incidencia</h4>

            <form class="form-horizontal style-form">



                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fecha</label>
                    <div class="col-sm-3">
                        <input type="text" id="fecha" value="<?php echo $fechaincidencia ?>" disabled class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Codigo</label>
                    <div class="col-sm-4">
                        <input type="text" id="codigo" value="<?php echo $codigoincidencia ?>" disabled class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Prioridad</label>
                    <div class="col-sm-3">
                        <input type="text" id="prioridad" value="<?php echo $prioridad ?>" disabled class="form-control">
                    </div>

                    <label class="col-sm-1 col-sm-1 control-label">Estado</label>
                    <div class="col-sm-4">
                        <input type="text" id="estado" value="<?php echo $estado ?>" disabled class="form-control">
                    </div>


                </div>

                <div class="form-group">

                    <label class="col-sm-2 col-sm-2 control-label">Motivo</label>
                    <div class="col-sm-8">
                        <textarea type="text" id="motivo"  disabled class="form-control"> <?php echo $motivo ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Registrado</label>
                    <div class="col-sm-8">
                        <input type="text" id="rnd" value="<?php echo $rnd ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pabellón</label>
                    <div class="col-sm-8">
                        <input type="text" id="rnd" value="<?php echo $despabellon ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-8">
                        <input type="text" id="rnd" value="<?php echo $destipo ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ambiente</label>
                    <div class="col-sm-8">
                        <input type="text" id="rnd" value="<?php echo $desambiente ?>" disabled class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Encargado</label>
                    <div class="col-sm-8">
                        <input type="text" id="rnd" value="<?php echo $recibido ?>" disabled class="form-control">
                    </div>

                </div>












            </form>
        </div>

    </div>
    <div class="col-lg-4">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Atender Incidencia</h4> 

            <form class="form-horizontal style-form">


                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Fecha</label>
                    <div class="col-sm-7">
                        <input type="date" id="fechaatencion" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Tipo Mantenimiento</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="cbotipomantenimiento">
                            <option value="">&nbsp;</option>
                            <option value="MANTENIMIENTO PREVENTIVO">MANTENIMIENTO PREVENTIVO</option>
                            <option value="MANTENIMIENTO CORRECTIVO">MANTENIMIENTO CORRECTIVO</option>


                        </select>
                    </div>

                </div>

                <div class="form-group">

                    <label class="col-sm-4 col-sm-4 control-label">Descripción</label>
                    <div class="col-sm-7">
                        <textarea type="text" id="descripcion"   class="form-control"> </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Estado</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="estadoatencion">
                            <option value="">&nbsp;</option>
                            <option value="ATENDIDO">ATENDIDO</option>



                        </select>
                    </div>

                </div>

                <div id="mensajefrm"></div>

                 <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label"></label>
                    <div class="col-sm-5">
                        <button type="button"onclick="guardaratenderincidencia('<?php echo $codigo ?>')"class="btn btn-theme"> <i class="glyphicon glyphicon-save-file"></i> Registrar</button>
                     
                    </div>





                </div>

               


            </form>
        </div>

    </div>
    <!-- col-lg-12-->
</div>

