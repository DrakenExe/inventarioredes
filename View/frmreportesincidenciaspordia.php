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
<script>
    function reporteconsultarincidenciaspordia() {
        var txtfechainicio = $("#txtfechainicio").val();
        var txtfechafin = $("#txtfechafin").val();

               if (txtfechainicio == ""||txtfechafin == "")
        {
             swal({
            title: 'Busqueda Incorrecta',
            text: 'Ingresar Fechas',
            type: 'error',
            confirmButtonText: 'OK'
        })
        }
        else
        {
            document.getElementById("loadingdni").innerHTML = "Cargando...";
            $.post("../Model/reporteincidenciasgrafico.php",
                    {
                        txtfechainicio: txtfechainicio,
                        txtfechafin: txtfechafin

                    }, function (data) {
                $("#loadingdni").html(data);
            });
        }
        
        
        

    }
</script>
  



<div class="row mt">
    
     <div class="col-lg-3">
        <div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i> Reporte de Incidencias</h4>

    <form class="form-horizontal style-form">



        <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">Fecha Inicio</label>
            <div class="col-sm-9">
                        <input type="date"  class="form-control"  id="txtfechainicio">
                    </div>

                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Fecha Fin</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control"  id="txtfechafin">
                    </div>

                </div>
                
            
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label"></label>
                    <div class="col-sm-1">



                        <button type="button" onclick="reporteconsultarincidenciaspordia()" class="btn btn-theme" style="cursor:pointer;">  <i class="glyphicon glyphicon-saved"></i> Buscar</button>
                    </div>

                </div>







                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    
      <div class="col-lg-9" id="loadingdni" style=" height: auto; overflow: auto">
      

    </div>
    
    
</div>
    


