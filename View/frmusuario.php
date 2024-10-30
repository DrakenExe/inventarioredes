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
          
                                        <button  class="btn btn-theme" onclick="nuevousuario()" style="cursor:pointer;"><i class="fa fa-angle-right"></i> Agregar Usuarios</button>
            <h4>Listado de Usuarios</h4>
            
          
            <section id="unseen">
                <table  id="example" class="table table-bordered table-striped table-condensed">

                    <thead>
                        <tr style="background:#001944; color:#fff">

                            <th class="numeric">Nombres</th>
                            <th class="numeric">Apellidos</th>
                            <th class="numeric">Dirección</th>
                            <th class="numeric">DNI</th>
                            <th class="numeric">Celular</th>
                            <th class="numeric">Cargo</th>
                            <th class="numeric">Usuario</th>
                            <th class="numeric">Clave</th>
                            <th class="numeric">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rsareas = "SELECT u.idusuario, u.usuario, u.clave, u.estado, u.idpersona, p.nombres, p.apellidos, p.direccion, p.dni, p.celular, p.estado, p.idcargo, c.descargo FROM usuario u
inner join persona p on p.idpersona=u.idpersona
inner join cargo c on c.idcargo=p.idcargo";
                        $areas = mysql_query($rsareas);
                        while ($rsareas = mysql_fetch_array($areas)) {
                            ?>
                            <tr>

                                <td class="numeric"><?php echo $rsareas['nombres'] ?></td>
                                <td class="numeric"><?php echo $rsareas['apellidos'] ?></td>
                                <td class="numeric"><?php echo $rsareas['direccion'] ?></td>
                                <td class="numeric"><?php echo $rsareas['dni'] ?></td>
                                <td class="numeric"><?php echo $rsareas['celular'] ?></td>
                                <td class="numeric"><?php echo $rsareas['descargo'] ?></td>
                                <td class="numeric"><?php echo $rsareas['usuario'] ?></td>
                                <td class="numeric"><?php echo $rsareas['clave'] ?></td>
                                <td>
                                    <button onclick="nuevousuario()" class="btn btn-success btn-xs" title="Nuevo Usuario"><i class="fa fa-check"></i></button>
                                    <button onclick="editarcategoria(<?php echo $rsareas['idusuario'] ?>)" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></button>
                                    <button onclick="editarcategoria(<?php echo $rsareas['idusuario'] ?>)" class="btn btn-danger btn-xs" title="Eliminar"><i class="fa fa-trash-o "></i></button>
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