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
          
            
                             <button  class="btn btn-theme" onclick="nuevaincidencia()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Incidencias</button>
            <h4>Listado de las Incidencias</h4>
            
            
           
            <section id="unseen">
                 <table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background:#001944; color:#fff">

                            <th class="numeric">Fecha</th>
                            <th class="numeric">Codigo</th>
                            <th class="numeric">Motivo</th>
                            <th class="numeric">Prioridad</th>
                            <th class="numeric">Recibido</th>
                            <th class="numeric">Estado</th>

                            <th class="numeric">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rsareas = "SELECT i.idincidencias, i.fechaincidencia, i.codigoincidencia, i.motivo, i.estado, i.rnd, i.idsalida, i.prioridad, sa.recibido, sa.idsede,
                                    sa.idpabellon, sa.idlocal, sa.idtipo, sa.idambiente, se.descripcionsede, pa.despabellon, lo.deslocal, ti.destipo, am.desambiente, am.idpiso, pi.despiso FROM incidencias i
                                    inner join salida sa on sa.idsalida=i.idsalida
                                    inner join sede se on se.idsede=sa.idsede
                                    inner join pabellon pa on pa.idpabellon=sa.idpabellon
                                    inner join local lo on lo.idlocal=sa.idlocal
                                    inner join tipo ti on ti.idtipo=sa.idtipo
                                    inner join ambiente am on am.idambiente=sa.idambiente
                                    inner join piso pi on pi.idpiso=am.idpiso where i.estado='RECIBIDO'";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>

                                <td class="numeric"><?php echo $rsareas['fechaincidencia'] ?></td>
                                <td class="numeric"><?php echo $rsareas['codigoincidencia'] ?></td>
                                <td class="numeric"><?php echo $rsareas['motivo'] ?></td>
                                <td class="numeric"><?php echo $rsareas['prioridad'] ?></td>
                                <td class="numeric"><?php echo $rsareas['recibido'] ?></td>
                                <td class="numeric"><?php echo $rsareas['estado'] ?></td>


                                <td>
                                    <button onclick="nuevaincidencia()" class="btn btn-danger btn-xs" title="Nueva Incidencia"><i class="fa fa-check"></i></button>
                                    <button onclick="atenderincidencias(<?php echo $rsareas['idincidencias'] ?>)" class="btn btn-primary btn-xs" title="Atender Incidencia"><i class="fa fa-search"></i></button>
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