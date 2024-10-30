<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$categoria = $_POST['categoria'];



?>

  <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Busqueda de los Activos</h4> 

            <form class="form-horizontal style-form">


<table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background: #4ECDC4;color: #fff">

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
                            inner join marca mar on mar.idmarca=a.idmarca where a.idcategoria='$categoria'";
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
                                      
                                        <button onclick="nuevoactivodetallereporte(<?php echo $rsareas['idactivo'] ?>)" class="btn btn-primary btn-xs" title="Ver Detalle Activo"><i class="fa fa-search"></i></button>
                                    
                                    </td>









                            </tr>
                        <?php } ?>
                    </tbody>

                </table>



            </form>
        </div>
