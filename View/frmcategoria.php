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
            <button  class="btn btn-theme" onclick="nuevacategoria()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Categoria</button>
            <h4>Listado de las Categorias</h4>
            <section id="unseen">
                
                
   
                
                <table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background:#001944; color:#fff">

                            <th class="numeric">Codigo</th>
                            <th class="numeric">Descripcion</th>

                            <th class="numeric">Opciones</th>
                        </tr>
                    </thead>
                    <script>
    function eliminarRegistro(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
            window.location.href = "eliminarcategoria.php?id=" + id;
        }
    }
</script>
                    <tbody>
                        <?php
                        $rsareas = "SELECT c.idcategoria, c.descategoria FROM categoria c";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>

                                   <td class="numeric"><?php echo $rsareas['idcategoria'] ?></td>
                            <td class="numeric"><?php echo $rsareas['descategoria'] ?></td>
                            <td>
                                <button onclick="nuevacategoria()" class="btn btn-success btn-xs" title="Nueva Categoria"><i class="fa fa-check"></i></button>
                                <button onclick="editarcategoria(<?php echo $rsareas['idcategoria'] ?>)" class="btn btn-primary btn-xs" title="Editar Categoria"><i class="fa fa-pencil"></i></button>
                                <button onclick="eliminarRegistro(<?php echo $rsareas['idcategoria'] ?>)" class="btn btn-danger btn-xs" title="Eliminar Categoria"><i class="fa fa-trash-o "></i></button>
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