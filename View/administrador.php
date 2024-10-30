<?php
require_once('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>UCV</title>

        <!-- Favicons -->
        <link href="img/favi.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Bootstrap core CSS -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
        <script src="lib/chart-master/Chart.js"></script>

        <script src="../js/admin.js" type="text/javascript"></script> 
        
             
        <!-- Font Awesome -->
        <link href="asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="asset/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="asset/build/css/custom.min.css" rel="stylesheet">
  




        <!-- =======================================================
          Template Name: Dashio
          Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
          Author: TemplateMag.com
          License: https://templatemag.com/license/
        ======================================================= -->
    </head>

    <body>
        <section id="container">
            <!-- **********************************************************************************************************************************************************
                TOP BAR CONTENT & NOTIFICATIONS
                *********************************************************************************************************************************************************** -->
            <!--header start-->
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="administrador.php" class="logo"><b>SOPORTE <span style="color:#E2001B">UCV</span></b></a>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">  
                    <!--  notification start -->
                    <ul class="nav top-menu">
                        <!-- settings start -->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="administrador.php">
                                <i class="fa fa-tasks"></i>
                                <span class="badge bg-theme">-</span>
                            </a>
                            <ul class="dropdown-menu extended tasks-bar">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green"></p>
                                </li>


                            </ul>
                        </li>
                        <!-- settings end -->
                        <!-- inbox dropdown start-->
                        <li id="header_inbox_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="administrador.php">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-theme">-</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green"></p>
                                </li>


                            </ul>
                        </li>
                        <!-- inbox dropdown end -->
                        <!-- notification dropdown start-->
                        <li id="header_notification_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="administrador.php">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge bg-warning">-</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <div class="notify-arrow notify-arrow-yellow"></div>
                                <li>
                                    <p class="yellow"></p>
                                </li>

                            </ul>
                        </li>
                        <!-- notification dropdown end -->
                    </ul>
                    <!--  notification end -->
                </div>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="cerrarSesion.php">Salir</a></li>
                    </ul>
                </div>
            </header>
            <!--header end-->
            <!-- **********************************************************************************************************************************************************
                MAIN SIDEBAR MENU
                *********************************************************************************************************************************************************** -->
            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <p class="centered"><a href="administrador.php"><img src="img/logo.jpg" class="img-circle" width="80"></a></p>
                        <h5 class="centered"> <?php echo $_SESSION['nombres'] ?>  <?php echo $_SESSION['apellidos'] ?></h5>
                        <li class="mt">
                            <a class="active" href="administrador.php">
                                <i class="fa fa-dashboard"></i>
                                <span>Panel</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-desktop"></i>
                                <span>Mantenedores</span>
                            </a>
                            <ul class="sub">
                                <li><a onclick="frmcategoria();" style="cursor:pointer;">Gestionar Categoria</a></li>
                                <li><a onclick="frmtipoactivo();" style="cursor:pointer;">Gestionar Tipo Activo</a></li>
                                <li><a onclick="frmsubtipoactivo();" style="cursor:pointer;">Gestionar SubTipo Activo</a></li>
                                <li><a onclick="frmperifericos();" style="cursor:pointer;">Gestionar Perifericos</a></li>
                                <li><a onclick="frmdocumentos();" style="cursor:pointer;">Gestionar Documento</a></li>
                                <li><a onclick="frmmarca();" style="cursor:pointer;">Gestionar Marca</a></li>
                                <li><a onclick="frmactivo();" style="cursor:pointer;">Gestionar Activos</a></li>

                                <li><a onclick="frmsede();" style="cursor:pointer;">Gestionar Àrea</a></li>
                                <li><a onclick="frmpabellon();" style="cursor:pointer;">Gestionar Pabellón</a></li>
                                <li><a onclick="frmlocal();" style="cursor:pointer;">Gestionar Local</a></li>
                                <li><a onclick="frmtipo();" style="cursor:pointer;">Gestionar Tipo</a></li>
                                <li><a onclick="frmpiso();" style="cursor:pointer;">Gestionar Piso</a></li>
                                <li><a onclick="frmambiente();" style="cursor:pointer;">Gestionar Ambiente</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Ingreso de Activos</span>
                            </a>
                            <ul class="sub">
                                        <li><a onclick="frmactivo();" style="cursor:pointer;">Gestionar Activos</a></li>
                                <li><a  onclick="frmingresoactivos();" style="cursor:pointer;">Registrar Activos</a></li>


                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Salida de Activos</span>
                            </a>
                            <ul class="sub">

                                <li><a  onclick="frmsalidaactivos();" style="cursor:pointer;">Registrar Salida Activos</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Gestion de Incidencias</span>
                            </a>
                            <ul class="sub">
                                <li><a onclick="frmregistrarincidencias();" style="cursor:pointer;">Registrar Incidencias</a></li>
                                <li><a onclick="frmincidenciasatendidas();" style="cursor:pointer;">Incidencias Atendidas</a></li>

                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Reportes</span>
                            </a>
                            <ul class="sub">
                                 <li><a onclick="frmreportesequipos();" style="cursor:pointer;">Reporte de equipos</a></li>
                    
                                <li><a onclick="frmreporteingresos();" style="cursor:pointer;">Ingresos</a></li>
                                 <li><a onclick="frmreportesalidas();" style="cursor:pointer;">Salidas</a></li>
                                <li><a onclick="frmreportesincidencias();" style="cursor:pointer;">Incidencias</a></li>
                                <li><a onclick="frmreporteingresosgraficos();" style="cursor:pointer;">Ingresos Gráfico</a></li>
                                  <li><a onclick="frmreportesincidenciaspordia();" style="cursor:pointer;">Incidencias Grafico</a></li>
                                  <li><a onclick="frmreporteequiposgraficos();" style="cursor:pointer;">Equipos Grafico</a></li>
                                  
                                                        <li><a onclick="frmreportehojavida();" style="cursor:pointer;">Reporte de Hoja de Vida</a></li>
                               
                                
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-comments-o"></i>
                                <span>Configuración</span>
                            </a>
                            <ul class="sub">
                                <li><a onclick="frmcargo();" style="cursor:pointer;">Gestionar Cargo</a></li>
                                <li><a onclick="frmpersona();" style="cursor:pointer;"> Gestionar Persona</a></li>
                                <li><a onclick="frmusuario();" style="cursor:pointer;"> Gestionar Usuario</a></li>
                            </ul>
                        </li>
                        <li>
                            <!--<a href="google_maps.html">
                              <i class="fa fa-map-marker"></i>
                              <span>Google Maps </span>
                              </a>-->
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!-- **********************************************************************************************************************************************************
                MAIN CONTENT
                *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12 main-chart">
                            <!--CUSTOM CHART START -->
                            <div class="border-head">
                                <h3>Sistema de Incidencias</h3>
                            </div>

                            <div id="cargar">
                                <div class="row mt">

                                    <div class="col-lg-12">
                                        <div class="content-panel">
                                            <h4><i class="fa fa-angle-right"></i> Lista de Activos</h4>
                                            <section id="unseen">
                                                <table class="table table-bordered table-striped table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Codigo</th>
                                                            <th>Descripcion</th>
                                                            <th class="numeric">Marca</th>
                                                            <th class="numeric">Modelo</th>
                                                            <th class="numeric">Serie</th>
                                                            <th class="numeric">Inventario</th>
                                                            <th class="numeric">Nombre Activo</th>
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
                            inner join marca mar on mar.idmarca=a.idmarca";
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
                                     <a  target="_blank" href="pdfactivos.php?id=<?php echo $rsareas["idactivo"] ?>" class="btn btn-success btn-xs" title="Exportar PDF"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                        <!-- /content-panel -->
                                    </div>
                                    <!-- /col-lg-4 -->
                                </div>
                            </div>


                            <!-- /row -->
                        </div>
                        <!-- /col-lg-9 END SECTION MIDDLE -->
                        <!-- **********************************************************************************************************************************************************
                            RIGHT SIDEBAR CONTENT
                            *********************************************************************************************************************************************************** -->

                        <!-- /col-lg-3 -->
                    </div>
                    <!-- /row -->
                </section>
            </section>
            <!--main content end-->
            <!--footer start-->

            <!--footer end-->
        </section>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="lib/jquery/jquery.min.js"></script>

        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="lib/jquery.scrollTo.min.js"></script>
        <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="lib/jquery.sparkline.js"></script>
        <!--common script for all pages-->
        <script src="lib/common-scripts.js"></script>
        <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="lib/gritter-conf.js"></script>
        <!--script for this page-->
        <script src="lib/sparkline-chart.js"></script>
        <script src="lib/zabuto_calendar.js"></script>
        <script type="text/javascript">
                                    $(document).ready(function () {
                                        var unique_id = $.gritter.add({
                                            // (string | mandatory) the heading of the notification
                                            title: 'BIENVENIDO',
                                            // (string | mandatory) the text inside the notification
                                            text: '<?php echo $_SESSION['nombres'] ?>  <?php echo $_SESSION['apellidos'] ?>',

                                                        // (string | optional) the image to display on the left
                                                        image: 'img/ui-sam.jpg',
                                                        // (bool | optional) if you want it to fade out on its own or just sit there
                                                        sticky: false,
                                                        // (int | optional) the time you want it to be alive for before fading out
                                                        time: 8000,
                                                        // (string | optional) the class name you want to apply to that specific message
                                                        class_name: 'my-sticky-class'
                                                    });

                                                    return false;
                                                });
        </script>
        <script type="application/javascript">
            $(document).ready(function() {
            $("#date-popover").popover({
            html: true,
            trigger: "manual"
            });
            $("#date-popover").hide();
            $("#date-popover").click(function(e) {
            $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
            action: function() {
            return myDateFunction(this.id, false);
            },
            action_nav: function() {
            return myNavFunction(this.id);
            },
            ajax: {
            url: "show_data.php?action=1",
            modal: true
            },
            legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
            },
            {
            type: "block",
            label: "Regular event",
            }
            ]
            });
            });

            function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
            }
        </script>
        

 
        <!-- FastClick -->
        <script src="asset/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="asset/vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="asset/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="asset/build/js/custom.min.js"></script>


    </body>

</html>
