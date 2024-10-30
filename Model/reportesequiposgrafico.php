<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
$txtfechainicio = $_POST['txtfechainicio'];

$txtfechafin = $_POST['txtfechafin'];

$theDateDesde1 = str_replace("/", "-", $txtfechainicio);
$theDateHasta1 = str_replace("/", "-", $txtfechafin);

 $result = mysql_query("SELECT DISTINCT  i.fecha  FROM ingresoactivos i"
         . "   where i.fecha>='$txtfechainicio' and i.fecha<='$txtfechafin'");




?>


   
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  

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
            text: 'Ingresos diarios',
            x: -20 //center
        },
        subtitle: {
            text: '<?php echo $theDateDesde1  ?> / <?php echo $theDateHasta1  ?>',
            x: -20
        },
        xAxis: {
            categories: [
                
                <?php
                $sql="SELECT DISTINCT  i.fecha  FROM ingresoactivos i"
         . "   where i.fecha>='$txtfechainicio' and i.fecha<='$txtfechafin'";
                $result = mysql_query("$sql");
                while ($registros = mysql_fetch_array($result))
                    {
                    ?>
                        
                         '<?php echo $registros["fecha"]?>',
                        
                      <?php
                    }
                ?>
            ]
        },
        yAxis: {
            title: {
                text: 'N° Folios'
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
                        
            
            'N° de Folios',
            data: 
            [
                 <?php


 $result3 = mysql_query("SELECT  DISTINCT a.fecha  FROM atencion a  where a.fecha>='$txtfechainicio' and a.fecha<='$txtfechafin'");







while ($row3 = mysql_fetch_array($result3)) {
    
     $FECHA = $row3['fecha'];
    
    $result2 = mysql_query("SELECT COUNT(*) AS TOTAL  

 FROM ingresoactivos i
                                    inner join persona p on p.idpersona=i.idpersona
                                    inner join cargo c on c.idcargo=p.idcargo
                                    inner join documento d on d.iddocumento=i.iddocumento    where i.fecha='$FECHA' ");
    

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
               
               





