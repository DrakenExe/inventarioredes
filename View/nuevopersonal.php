<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="css/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/personal.js" type="text/javascript"></script> 

<div class="row mt">
    <div class="col-lg-6">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Ingreso de Activo</h4>

            <form class="form-horizontal style-form">


         

            
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombres" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Apellidos</label>
                    <div class="col-sm-9">
                        <input type="text" id="apellidos" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Direccion</label>
                    <div class="col-sm-9">
                        <input type="text" id="direccion" class="form-control">
                    </div>

                </div>
                     <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">DNI</label>
                    <div class="col-sm-9">
                        <input type="text" id="dni" class="form-control">
                    </div>

                </div>
                     <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Celular</label>
                    <div class="col-sm-9">
                        <input type="text" id="celular" class="form-control">
                    </div>

                </div>
          

      <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Cargo</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="cargo">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT c.idcargo, c.descargo FROM cargo c";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idcargo"] ?>"><?php echo $rsestado1["descargo"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>







       <div id="mensajefrm"></div>
                <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label"></label>
                    <div class="col-sm-5">
                        <button type="button" onclick="guardarpersonal()" class="btn btn-danger"> <i class="glyphicon glyphicon-save-file"></i> Guardar Personal</button>
                      
                    </div>





                </div>

            </form>
        </div>

    </div>

    <!-- col-lg-12-->
</div>

