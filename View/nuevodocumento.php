<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/documento.js" type="text/javascript"></script> 

<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="css/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nuevo documento</h4>

            <form class="form-horizontal style-form">
                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Documento</label>
                    <div class="col-sm-11">
                        <input type="text" id="txtcategoria" class="form-control">
                    </div>





                </div>
                <div id="mensajefrm"></div>
                <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label"></label>
                    <div class="col-sm-5">
                        <button type="button" onclick="guardardocumentos()" class="btn btn-theme"> <i class="glyphicon glyphicon-save-file"></i>Guardar</button>
                        <button type="button" onclick="frmdocumentos()" class="btn btn-danger"> <i class="glyphicon glyphicon-send"></i>Listar Documento</button>
                    </div>





                </div>


            </form>
        </div>
    </div>
    <!-- col-lg-12-->
</div>