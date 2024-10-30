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

 $result = mysql_query("SELECT  DISTINCT a.fecha  FROM atencion a where a.fecha>='$txtfechainicio' and a.fecha<='$txtfechafin'");




?>


   
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  

        <style type="text/css">

#container2 {
	min-width: 500px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
        </style>
        <script type="text/javascript">
            $(function () {
                Highcharts.chart('container2', {
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Incidencias Atendidas <?php echo $theDateDesde1 ?> / <?php echo $theDateHasta1 ?>'
                    },
                    subtitle: {
                        text: 'Sistema de Soporte'
                    },
                    xAxis: {
                        categories: [
<?php
while ($row = mysql_fetch_array($result)) {
    
   
    
echo "'" . $row['fecha'] . "',";}

?>
                        ],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Cantidad',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ''
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [
                        {
                            name: 'Nro de incidencias atentidas',
                            data: [
<?php


 $result3 = mysql_query("SELECT  DISTINCT a.fecha  FROM atencion a  where a.fecha>='$txtfechainicio' and a.fecha<='$txtfechafin'");







while ($row3 = mysql_fetch_array($result3)) {
    
     $FECHA = $row3['fecha'];
    
    $result2 = mysql_query("SELECT COUNT(*) AS TOTAL  FROM atencion a
                                    inner join incidencias i on i.idincidencias=a.idincidencias
                                    inner join salida sa on sa.idsalida=i.idsalida
                                    inner join sede se on se.idsede=sa.idsede
                                    inner join pabellon pa on pa.idpabellon=sa.idpabellon
                                    inner join local lo on lo.idlocal=sa.idlocal
                                    inner join tipo ti on ti.idtipo=sa.idtipo
                                    inner join ambiente am on am.idambiente=sa.idambiente  where a.fecha='$FECHA'");
    

while ($row2 = mysql_fetch_array($result2)) {
    echo $row2['TOTAL'] . ",";
}
}


?>
                            ]
                        }
                    ]
                });
            });
        </script>
    
    
        <script src="../highcharts/code/highcharts.js"></script>
        <script src="../highcharts/code/modules/exporting.js"></script>

               <div id="container2" ></div>
               
               





