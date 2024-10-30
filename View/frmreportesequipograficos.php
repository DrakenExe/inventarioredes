<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}


?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/reportesincidenciaspordia.js" type="text/javascript"></script> 
<link rel="stylesheet" href="css/sweetalert/css/sweetalert2.min.css">
<script src="css/sweetalert/js/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


<div class="row mt">
    
   
    <h4 class="mb"><i class="fa fa-angle-right"></i> Reporte de Equipos por Categoría</h4>

 

        <style type="text/css">

#container2 {
	min-width: 700px;
	max-width: 1000px;
	height: 400px;
	margin: 0 auto
}
		</style>
        </style>
 	<script type="text/javascript">
$(function () {
    Highcharts.chart('container2', {
        title: {
            text: 'Cantidad de equipos por categoria',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [
                
                <?php
                $sql="SELECT c.`idcategoria`, c.`descategoria` FROM categoria c";
                $result = mysql_query("$sql");
                while ($registros = mysql_fetch_array($result))
                    {
                    ?>
                        
                         '<?php echo $registros["descategoria"]?>',
                        
                      <?php
                    }
                ?>
            ]
        },
        yAxis: {
            title: {
                text: 'N° de Equipos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 
                        
            
            'N° de Equipos',
            data: 
            [
                 <?php


 $result3 = mysql_query("SELECT c.`idcategoria`, c.`descategoria` FROM categoria c");







while ($row3 = mysql_fetch_array($result3)) {
    
     $FECHA = $row3['idcategoria'];
    
    $result2 = mysql_query("SELECT COUNT(*) AS TOTAL FROM activo a where idcategoria='$FECHA' ");
    

while ($row2 = mysql_fetch_array($result2)) {
    echo $row2['TOTAL'] . ",";
}
}

                ?>
            ]
        }]
    });
});
		</script>
    
        <script src="../highcharts/code/highcharts.js"></script>
        <script src="../highcharts/code/modules/exporting.js"></script>

               <div id="container2" ></div>
               


              
    
    
</div>
    


