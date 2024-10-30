<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$codigo = $_POST['codigo'];
$rsconsulta = "SELECT a.idatencion, a.fecha, a.tipomantenimiento, a.descripcion, a.estado, a.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida,
i.prioridad, sa.codigorequerimiento, sa.recibido, sa.idsede, sa.idpabellon, sa.idlocal, sa.idtipo, sa.idambiente, se.descripcionsede, pa.despabellon, lo.deslocal, ti.destipo, am.desambiente, am.idpiso FROM atencion a
inner join incidencias i on i.idincidencias=a.idincidencias
inner join salida sa on sa.idsalida=i.idsalida
inner join sede se on se.idsede=sa.idsede
inner join pabellon pa on pa.idpabellon=sa.idpabellon
inner join local lo on lo.idlocal=sa.idlocal
inner join tipo ti on ti.idtipo=sa.idtipo
inner join ambiente am on am.idambiente=sa.idambiente WHERE a.idatencion='$codigo'";
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$fechaincidencia = $rsconsulta['fechaincidencia'];
$codigoincidencia = $rsconsulta['codigoincidencia'];
$motivo = $rsconsulta['motivo'];
$prioridad = $rsconsulta['prioridad'];
$rnd = $rsconsulta['rnd'];

$recibido = $rsconsulta['recibido'];
$descripcionsede = $rsconsulta['descripcionsede'];
$despabellon = $rsconsulta['despabellon'];
$deslocal = $rsconsulta['deslocal'];
$destipo = $rsconsulta['destipo'];
$desambiente = $rsconsulta['desambiente'];


$fecha = $rsconsulta['fecha'];
$tipomantenimiento = $rsconsulta['tipomantenimiento'];
$estado = $rsconsulta['estado'];
$descripcion= $rsconsulta['descripcion'];

?>


<div class="row mt">
    <div class="col-lg-4">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Datos de la Incidencia</h4>

            <form class="form-horizontal style-form">



                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Fecha</label>
                    <div class="col-sm-7">
                        <input type="text" id="serie" value="<?php echo $fechaincidencia ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Codigo Incidencia</label>
                    <div class="col-sm-7">
                        <input type="text" id="codigo" value="<?php echo $codigoincidencia ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Motivo</label>
                    <div class="col-sm-7">
                        <input type="text" id="nombreequipo" value="<?php echo $motivo ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Prioridad</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $prioridad ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Registrado por</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $rnd ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Encargado del Equipo</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $recibido ?>" disabled class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Sede</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $descripcionsede ?>" disabled class="form-control">
                    </div>

                </div>
           
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Local</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $deslocal ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Pabellón</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $despabellon ?>" disabled class="form-control">
                    </div>

                </div>
                     <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Tipo</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $destipo ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label">Ambiente</label>
                    <div class="col-sm-7">
                        <input type="text" id="otros" value="<?php echo $desambiente ?>" disabled class="form-control">
                    </div>

                </div>









            </form>
        </div>

    </div>

    <div class="col-lg-8">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Datos de la Atención de la Incidencia</h4>

            <form class="form-horizontal style-form">



                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Fecha </label>
                    <div class="col-sm-9">
                        <input type="text" id="serie" value="<?php echo $fecha ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Tipo Mantenimiento</label>
                    <div class="col-sm-9">
                        <input type="text" id="codigo" value="<?php echo $tipomantenimiento ?>" disabled class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreequipo" value="<?php echo $descripcion ?>" disabled class="form-control">
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

    <!-- col-lg-12-->
</div>
