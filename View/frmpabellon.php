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
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
           
            <button  class="btn btn-theme" onclick="nuevopabellon()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Pabellón</button>
            <h4>Listado de Pabellón</h4>
            
            
           
            <section id="unseen">
                
                
   
                
                <table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background:#001944; color:#fff">

                            <th class="numeric">Codigo</th>
                            <th class="numeric">Descripcion</th>

                            <th class="numeric">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rsareas = "SELECT p.idpabellon, p.despabellon FROM pabellon p";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>

                                   <td class="numeric"><?php echo $rsareas['idpabellon'] ?></td>
                            <td class="numeric"><?php echo $rsareas['despabellon'] ?></td>
                            <td>
                                <button onclick="nuevopabellon()" class="btn btn-success btn-xs" title="Nuevo Pabellón"><i class="fa fa-check"></i></button>
                                <button onclick="editarcategoria(<?php echo $rsareas['idpabellon'] ?>)" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></button>
                                <button onclick="editarcategoria(<?php echo $rsareas['idpabellon'] ?>)" class="btn btn-danger btn-xs" title="Eliminar"><i class="fa fa-trash-o "></i></button>
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