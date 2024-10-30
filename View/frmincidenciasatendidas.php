<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="../js/incidencia.js" type="text/javascript"></script> 

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <h4  style="cursor:pointer;"><i class="fa fa-angle-right" ></i> Lista de Atenciones de las Incidencias</h4>
            <section id="unseen">
                <table  id="example" class="table table-bordered table-striped table-condensed">

                    <thead>
                        <tr style="background:#001944; color:#fff">
                           
                            <th class="numeric">Codigo Incidencia</th>
                            <th class="numeric">Motivo</th>
                            <th class="numeric">Personal</th>
                            <th class="numeric">Fecha Atención</th>
                            <th class="numeric">Mantenimiento</th>
                            <th class="numeric">Comentario</th>
                            <th class="numeric">Recibido</th>

                            <th class="numeric">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rsareas = "SELECT a.idatencion, a.fecha, a.tipomantenimiento, a.descripcion, a.estado, a.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida,
                                    i.prioridad, sa.codigorequerimiento, sa.recibido, sa.idsede, sa.idpabellon, sa.idlocal, sa.idtipo, sa.idambiente, se.descripcionsede, pa.despabellon, lo.deslocal, ti.destipo, am.desambiente, am.idpiso FROM atencion a
                                    inner join incidencias i on i.idincidencias=a.idincidencias
                                    inner join salida sa on sa.idsalida=i.idsalida
                                    inner join sede se on se.idsede=sa.idsede
                                    inner join pabellon pa on pa.idpabellon=sa.idpabellon
                                    inner join local lo on lo.idlocal=sa.idlocal
                                    inner join tipo ti on ti.idtipo=sa.idtipo
                                    inner join ambiente am on am.idambiente=sa.idambiente";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>
                              
                                <td class="numeric"><?php echo $rsareas['codigoincidencia'] ?></td>
                                <td class="numeric"><?php echo $rsareas['motivo'] ?></td>
                                <td class="numeric"><?php echo $rsareas['rnd'] ?></td>
                                <td class="numeric"><?php echo $rsareas['fecha'] ?></td>
                                <td class="numeric"><?php echo $rsareas['tipomantenimiento'] ?></td>
                                <td class="numeric"><?php echo $rsareas['descripcion'] ?></td>
                                  <td class="numeric"><?php echo $rsareas['recibido'] ?></td>


                                <td>

                                    <button onclick="veratenciones(<?php echo $rsareas['idatencion'] ?>)" class="btn btn-danger btn-xs" title="Ver Incidencia Atendida"><i class="fa fa-search"></i></button>
                                </td>









                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </section>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-lg-4 -->
</div>