<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
$codigoinventario = $_POST['codigoinventario'];
?>
<script type="text/javascript" src="../js/sendatos.js"></script>

<table class="table table-bordered table-striped table-condensed"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead >
        <tr style="background: #4ECDC4;color:#fff">
            <th  > ID</th>
            <th> CODIGO</th>
            <th  > CATEGORIA</th>
            <th> TIPO</th>
            <th  > SUBTIPO</th>
            <th> MARCA</th>
            <th  > SERIE</th>
            <th>EQUIPO</th>


        </tr>
    </thead>
    <tbody>
        <?php
     $rsareas = "SELECT i.idingresoactivodetalle, i.idingresoactivos, i.idactivo, i.estado,
a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario, a.nombreequipo, a.estado, a.otros, a.rnd, 
c.descategoria, ta.descripcionta, sta.descripcionsta, ia.iddocumento, ia.numero, ia.serie, concat(m.desmarca,' ',m.modelo)as datosmarca FROM ingresoactivodetalle i
inner join activo a on a.idactivo=i.idactivo
inner join categoria c on c.idcategoria=a.idcategoria
inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
inner join marca m on m.idmarca=a.idmarca
inner join ingresoactivos ia on ia.idingresoactivos=i.idingresoactivos

                where    concat(a.codigoinventario,' ',a.serie) like '%$codigoinventario%' and i.estado='INGRESO'";
        $areas = mysql_query($rsareas);
        while ($rsestado = mysql_fetch_array($areas)) {

            $id = $rsestado["idingresoactivodetalle"];
            $cod1 = $rsestado["codigoinventario"];
            $cod2 = $rsestado["descategoria"];
            $cod3 = $rsestado["descripcionta"];
            $cod4 = $rsestado["descripcionsta"];
            $cod5 = $rsestado["datosmarca"];
            $cod7 = $rsestado["serie"];
            $cod8 = $rsestado["nombreequipo"];
            $cod9 = "";
            $cod10 = "";
            $cod6 = "";
            $cod11 = "";
            $cod12 = "";
            $cod13 = "";
            $cod14 = "";
            $cod15 = "";
            $cod16 = "";
            $cod17 = "";
            echo "<tr id='grid'  style='text-align:center;'>";
            echo "<td style='text-align:center;width: 10px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["idingresoactivodetalle"] . " </td>";
            echo "<td style='text-align:center;width: 30px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 30px;' id='formnuevo' >" . $rsestado["codigoinventario"] . " </td>";
            echo "<td style='text-align:center;width: 10px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["descategoria"] . " </td>";
            echo "<td style='text-align:center;width: 30px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 30px;' id='formnuevo' >" . $rsestado["descripcionta"] . " </td>";

            echo "<td style='text-align:center;width: 10px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["descripcionsta"] . " </td>";
            echo "<td style='text-align:center;width: 30px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 30px;' id='formnuevo' >" . $rsestado["datosmarca"] . " </td>";

            echo "<td style='text-align:center;width: 10px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["serie"] . " </td>";
            echo "<td style='text-align:center;width: 30px;' onclick=\"buscarsalidaactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 30px;' id='formnuevo' >" . $rsestado["nombreequipo"] . " </td>";


            echo "</tr>";
        }
        ?>
    </tbody>

</table>
