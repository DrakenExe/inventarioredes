<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/activos.js" type="text/javascript"></script> 

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
       
            
            
                <button  class="btn btn-theme" onclick="nuevoactivo()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Activos</button>
            <h4>Listado de los Activos</h4>
            <HR>
            <section id="unseen">
     


                    <table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background:#001944; color:#fff">

                                <th class="numeric">Categria</th>
                                <th class="numeric">Tipo Activo</th>
                                <th class="numeric">SubTipo</th>
                                <th class="numeric">Marca</th>
                                <th class="numeric">Modelo</th>
                                <th class="numeric">Serie</th>
                                <th class="numeric">Codigo Inventario</th>
                                <th class="numeric">Nombre del Equipo</th>
                                <th class="numeric">Otros</th>
                                <th class="numeric">Estado</th>
                                <th class="numeric">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rsareas = "SELECT a.idactivo, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario, 
                            a.nombreequipo, a.estado, a.otros, a.rnd, c.descategoria, ta.descripcionta, sta.descripcionsta, mar.desmarca, mar.modelo FROM activo a
                            inner join categoria c on c.idcategoria=a.idcategoria
                            inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
                            inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
                            inner join marca mar on mar.idmarca=a.idmarca";
                            $areas = mysql_query($rsareas);
                            while ($rsareas = mysql_fetch_array($areas)) {
                                ?>
                                <tr>

                                    <td class="numeric"><?php echo $rsareas['descategoria'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['descripcionta'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['descripcionsta'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['desmarca'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['modelo'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['serie'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['codigoinventario'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['nombreequipo'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['otros'] ?></td>
                                    <td class="numeric"><?php echo $rsareas['estado'] ?></td>
                                    <td>
                                        <button onclick="nuevoactivo()" class="btn btn-danger btn-xs" title="Nuevo Activo"><i class="fa fa-check"></i></button>
                                        <button onclick="nuevoactivodetalle(<?php echo $rsareas['idactivo'] ?>)" class="btn btn-primary btn-xs" title="Ver Detalle Activo"><i class="fa fa-search"></i></button>
                                     <a  target="_blank" href="pdfactivos.php?id=<?php echo $rsareas["idactivo"] ?>" class="btn btn-success btn-xs" title="Exportar PDF"><i class="fa fa-print"></i></a>
                            
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