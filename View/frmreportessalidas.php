<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}


?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script src="../js/reportessalidas.js" type="text/javascript"></script> 
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<div class="row mt">
    
     <div class="col-lg-3">
        <div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i> Reporte de Salida de Equipos</h4>

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



                        <button type="button" onclick="reporteconsultarsalidas()" class="btn btn-theme" style="cursor:pointer;">  <i class="glyphicon glyphicon-saved"></i> Buscar</button>
                    </div>

                </div>







                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    
      <div class="col-lg-9" id="mostrar">
      

    </div>
    
    
</div>
    
    
    

    
    
    


