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
            <h4 class="mb"><i class="fa fa-angle-right"></i> Busqueda de Salida de Equipos</h4> 

            <form class="form-horizontal style-form">


<table  id="example" class="table table-bordered table-striped table-condensed">
                        
                        <thead>
                            <tr style="background: #4ECDC4;color: #fff">

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
inner join piso pi on pi.idpiso=a.idpiso    where s.fechasalida>='$txtfechainicio' and s.fechasalida<='$txtfechafin'";
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
                                   
                                    <button onclick="versalidaactivosreportes(<?php echo $rsareas['idsalida'] ?>)" class="btn btn-primary btn-xs" title="Ver Detalla de Salida Activos"><i class="fa fa-search"></i></button>
                                
                                </td>






                            </tr>
                        <?php } ?>
                    </tbody>

                </table>



            </form>
        </div>


