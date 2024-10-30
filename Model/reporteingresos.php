<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$txtfechainicio = $_POST['txtfechainicio'];

$txtfechafin = $_POST['txtfechafin'];

?>

  <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Busqueda de Ingreso de Equipos</h4> 

            <form class="form-horizontal style-form">


<table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background: #4ECDC4;color: #fff">

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
                                    inner join documento d on d.iddocumento=i.iddocumento    where i.fecha>='$txtfechainicio' and i.fecha<='$txtfechafin'";
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
                                  
                                    <button onclick="veringresoactivosreportes(<?php echo $rsareas['idingresoactivos'] ?>)" class="btn btn-primary btn-xs" title="Ver Ingresos de los Activos"><i class="fa fa-search"></i></button>
                                   
                                
                                </td>







                            </tr>
                        <?php } ?>
                    </tbody>

                </table>



            </form>
        </div>


