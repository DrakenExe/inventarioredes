<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
$cboperifericos = $_POST['cboperifericos'];
?>
<script type="text/javascript" src="../js/sendatos.js"></script>

<table class="table table-bordered table-striped table-condensed"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead >
        <tr style="background: #4ECDC4;color:#fff">
            <th  > ID</th>
            <th> PERIFERICOS</th>
      
        </tr>
    </thead>
    <tbody>
        <?php
        $rsareas = "SELECT p.idperifericos, p.desperifericos FROM perifericos p where  p.idperifericos='$cboperifericos'";
        $areas = mysql_query($rsareas);
        while ($rsestado = mysql_fetch_array($areas)) {

            $id = $rsestado["idperifericos"];
            $cod1 = $rsestado["desperifericos"];
            $cod2 = "";
            $cod3 = "";
            $cod4 = "";
            $cod5 = "";
            $cod7 = "";
            $cod8 = "";
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
            echo "<td style='text-align:center;width: 10px;' onclick=\"buscarperifericosactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["idperifericos"] . " </td>";
            echo "<td style='text-align:center;width: 30px;' onclick=\"buscarperifericosactivo('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17');\"    align='center' style='width: 30px;' id='formnuevo' >" . $rsestado["desperifericos"] . " </td>";
           

            echo "</tr>";
        }
        ?>
    </tbody>

</table>
