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

<script src="../js/salidaactivos.js" type="text/javascript"></script> 
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
          
                             <button  class="btn btn-theme" onclick="nuevasalidaactivo()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Salida de Activos</button>
            <h4>Listado de las Salida de Activos</h4>
            
          
            <section id="unseen">
                <table  id="example" class="table table-bordered table-striped table-condensed">

                    <thead>
                        <tr style="background:#001944; color:#fff">

                            <th class="numeric">Fecha</th>
                            <th class="numeric">TipoDocumento</th>
                            <th class="numeric">Numero</th>
                            <th class="numeric">Codigo</th>
                            <th class="numeric">Sede</th>
                            <th class="numeric">Pabellon</th>
                            <th class="numeric">Tipo</th>
                            <th class="numeric">Local</th>
                            <th class="numeric">Ambiente</th>
                            <th class="numeric">Piso</th>
                            <th class="numeric">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rsareas = "SELECT s.idsalida, s.tipodocumento, s.numerosalida, s.fechasalida, s.codigorequerimiento, s.recibido, s.opcionsalida, s.estado, s.idpersona, s.rnd,
s.idsede, s.idpabellon, s.idlocal, s.idtipo, s.idambiente, se.descripcionsede, pa.despabellon, ti.destipo, l.deslocal, a.desambiente, a.idpiso, pi.despiso
FROM salida s
inner join sede se on se.idsede=s.idsede
inner join pabellon pa on pa.idpabellon=s.idpabellon
inner join local l on l.idlocal=s.idlocal
inner join tipo ti on ti.idtipo=s.idtipo
inner join ambiente a on a.idambiente=s.idambiente
inner join piso pi on pi.idpiso=a.idpiso order by fechasalida desc";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>

                                <td class="numeric"><?php echo $rsareas['fechasalida'] ?></td>
                                <td class="numeric"><?php echo $rsareas['tipodocumento'] ?></td>
                                <td class="numeric"><?php echo $rsareas['numerosalida'] ?></td>
                                <td class="numeric"><?php echo $rsareas['codigorequerimiento'] ?></td>
                                <td class="numeric"><?php echo $rsareas['descripcionsede'] ?></td>
                                <td class="numeric"><?php echo $rsareas['despabellon'] ?></td>
                                <td class="numeric"><?php echo $rsareas['destipo'] ?></td>
                                <td class="numeric"><?php echo $rsareas['deslocal'] ?></td>
                                <td class="numeric"><?php echo $rsareas['desambiente'] ?></td>
                                <td class="numeric"><?php echo $rsareas['despiso'] ?></td>

                                <td>
                                    <button onclick="nuevasalidaactivo()" class="btn btn-danger btn-xs" title="Nueva Salida"><i class="fa fa-check"></i></button>
                                    <button onclick="versalidaactivos(<?php echo $rsareas['idsalida'] ?>)" class="btn btn-primary btn-xs" title="Ver Detalla de Salida Activos"><i class="fa fa-search"></i></button>
                                    <a  target="_blank" href="pdfsalida.php?id=<?php echo $rsareas["idsalida"] ?>" class="btn btn-success btn-xs" title="Exportar PDF"><i class="fa fa-print"></i></a>

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