        
<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

if (empty($_SESSION['txtusuario'])) {

    header('location: ../index.php');
} else {

$txtcategoria = strtoupper($_POST['txtcategoria']);
$txtcategoria1 = strtoupper($_POST['txtcategoria1']);
    ?>
    <script type="text/javascript">
        function ok() {
            swal(
                    'Datos registrados!',
                    'Correctamente',
                    'success'
                    )
        }
        function error() {
            swal({
                title: 'Duplicidad de Datos!',
                text: 'Datos Existentes en la Base de Datos',
                type: 'error',
                confirmButtonText: 'Aceptar'
            })
        }
        limpiarmarca();
    </script>
    <?php

    $rsdatos = "select count(*) total FROM marca where desmarca = '$txtcategoria'";
    $datos = mysql_query($rsdatos);
    $rsdatos = mysql_fetch_array($datos);
    $total = $rsdatos['total'];




    if ($total == '0') {
$rsinsertar = "INSERT INTO marca (desmarca,modelo,tipomodelo) VALUES
      ('$txtcategoria','$txtcategoria1','OK')";
$insertar = mysql_query($rsinsertar);
        echo "<script>";
        echo "ok();";
        echo "limpiar();";
        echo "</script>";
    } else {

        echo "<script>";
        echo "error();";
        echo "</script>";
    }
}
?>















       


