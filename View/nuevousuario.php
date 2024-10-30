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
<script src="../js/usuario.js" type="text/javascript"></script> 

<div class="row mt">
    <div class="col-lg-6">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Registrar Usuarios</h4>

            <form class="form-horizontal style-form">


                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Seleccionar</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="cbopersonal">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT p.`idpersona`,concat(p.`nombres`,' ', p.`apellidos`)as datos FROM persona p
where p.idpersona not in(select idpersona from usuario)";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idpersona"] ?>"><?php echo $rsestado1["datos"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>



                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Usuario</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtusuario" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Clave</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtclave" class="form-control">
                    </div>

                </div>









                <div id="mensajefrm"></div>
                <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label"></label>
                    <div class="col-sm-5">
                        <button type="button" onclick="guardarusuario()" class="btn btn-danger"> <i class="glyphicon glyphicon-save-file"></i> Guardar Usuario</button>

                    </div>





                </div>

            </form>
        </div>

    </div>

    <!-- col-lg-12-->
</div>

