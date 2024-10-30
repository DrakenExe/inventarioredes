          
<?php

include_once('../Conexion/conexion.php');
session_start();
$cn = conectarse();

if (empty($_SESSION['txtusuario'])) {

    header('location: ../index.php');
} else {

$rnd = strtoupper($_POST['rnd']);
$categoria = strtoupper($_POST['categoria']);
$tipo = strtoupper($_POST['tipo']);
$subtipo = strtoupper($_POST['subtipo']);
$marca = strtoupper($_POST['marca']);
$serie = $_POST["serie"];
$codigo = strtoupper($_POST['codigo']);
$nombreequipo = $_POST["nombreequipo"];
$otros = strtoupper($_POST['otros']);
$estado = $_POST["estado"];

$ciexcodigoperificacion = $_POST["ciexcodigoperificacion"];
$camposciexcodigoperificacion = explode(",", $ciexcodigoperificacion);
$totciexcodigoperificacion = sizeof($camposciexcodigoperificacion);

$ciexdescripcion01 = $_POST["ciexdescripcion01"];
$camposciexdescripcion01 = explode(",", $ciexdescripcion01);
$totciexdescripcion01 = sizeof($ciexdescripcion01);


$ciexdescripcion02 = $_POST["ciexdescripcion02"];
$camposciexdescripcion02 = explode(",", $ciexdescripcion02);
$totciexdescripcion02 = sizeof($ciexdescripcion02);

$ciexdescripcion03 = $_POST["ciexdescripcion03"];
$camposciexdescripcion03 = explode(",", $ciexdescripcion03);
$totciexdescripcion03 = sizeof($ciexdescripcion03);

$ciexdescripcion04 = $_POST["ciexdescripcion04"];
$camposciexdescripcion04 = explode(",", $ciexdescripcion04);
$totciexdescripcion04 = sizeof($ciexdescripcion04);
    ?>
    <script type="text/javascript">
        function ok() {
            swal(
                    'Datos registrados!',
                    'Correctamente',
                    'success'
                    )
             limpiaractivo();
        }
        function error() {
            swal({
                title: 'Duplicidad de Datos!',
                text: 'Serie o Codigo de Inventario ya Existen',
                type: 'error',
                confirmButtonText: 'Aceptar'
            })
        }
       
    </script>
    <?php

    $rsdatos = "select count(*) total FROM activo where codigoinventario = '$codigo' || serie='$serie' ";
    $datos = mysql_query($rsdatos);
    $rsdatos = mysql_fetch_array($datos);
    $total = $rsdatos['total'];




    if ($total == '0') {
        
        $consultorio = "insert into activo (idcategoria,idtiposactivo,idsubtipoactivos,idmarca,serie,codigoinventario,nombreequipo,estado,otros,rnd) values 
('$categoria','$tipo','$subtipo','$marca','$serie','$codigo','$nombreequipo','INGRESAR ACTIVO','$otros','$rnd')";
$rconsultorio = mysql_query($consultorio);

$rspreguntas = "select idactivo  from activo where rnd='$rnd'";
$pregunta = mysql_query($rspreguntas);
$rspreguntas = mysql_fetch_array($pregunta);
$codigoactivo = $rspreguntas["idactivo"];

for ($fils = 0; $fils < $totciexcodigoperificacion - 1; ++$fils) {


    $s = "insert into activoperifericodetalle(descripcion1,descripcion2,descripcion3,descripcion4,idperifericos,idactivo) 
values('$camposciexdescripcion01[$fils]','$camposciexdescripcion02[$fils]','$camposciexdescripcion03[$fils]','$camposciexdescripcion04[$fils]','$camposciexcodigoperificacion[$fils]','$codigoactivo')";
    $cs = mysql_query($s);
    

}

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















    
    