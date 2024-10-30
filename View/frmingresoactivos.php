<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/ingresoactivos.js" type="text/javascript"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
          
            
                               <button  class="btn btn-theme" onclick="nuevoingresoactivo()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Ingreso de Activos</button>
            <h4>Listado de los Ingresos de Activos</h4>
            
           
            <section id="unseen">
                <table  id="example" class="table table-bordered table-striped table-condensed">

                    <thead>
                        <tr style="background:#001944; color:#fff">

                            <th class="numeric">Documento</th>
                            <th class="numeric">Numero</th>
                            <th class="numeric">Serie</th>
                            <th class="numeric">Fecha</th>
                            <th class="numeric">Personal</th>
                            <th class="numeric">Cargo</th>
                            <th class="numeric">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rsareas = "SELECT i.idingresoactivos, i.iddocumento, i.numero, i.serie, i.fecha, i.idpersona, concat(p.nombres,' ',p.apellidos)as datos, p.idcargo, c.descargo, d.descripcion FROM ingresoactivos i
                                    inner join persona p on p.idpersona=i.idpersona
                                    inner join cargo c on c.idcargo=p.idcargo
                                    inner join documento d on d.iddocumento=i.iddocumento order by fecha desc";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>

                                <td class="numeric"><?php echo $rsareas['descripcion'] ?></td>
                                <td class="numeric"><?php echo $rsareas['numero'] ?></td>
                                <td class="numeric"><?php echo $rsareas['serie'] ?></td>
                                <td class="numeric"><?php echo $rsareas['fecha'] ?></td>
                                <td class="numeric"><?php echo $rsareas['datos'] ?></td>
                                <td class="numeric"><?php echo $rsareas['descargo'] ?></td>

                                <td>
                                    <button onclick="nuevoingresoactivo()" class="btn btn-danger btn-xs" title="Nuevo Ingreso de Activos"><i class="fa fa-check"></i></button>
                                    <button onclick="veringresoactivos(<?php echo $rsareas['idingresoactivos'] ?>)" class="btn btn-primary btn-xs" title="Ver Ingresos de los Activos"><i class="fa fa-search"></i></button>
                                    <a  target="_blank" href="pdfingreso.php?id=<?php echo $rsareas["idingresoactivos"] ?>" class="btn btn-success btn-xs" title="Exportar PDF"><i class="fa fa-print"></i></a>
                            
                                
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