    <?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<div class="col-lg-4">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Activos</h4>

            <form class="form-horizontal style-form">
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Categoria</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT c.idcategoria, c.descategoria FROM categoria c";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idcategoria"] ?>"><?php echo $rsestado1["descategoria"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                 <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Tipo</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT t.idtiposactivo, t.descripcionta FROM tiposactivo t";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idtiposactivo"] ?>"><?php echo $rsestado1["descripcionta"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                 <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Categoria</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT c.idcategoria, c.descategoria FROM categoria c";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idcategoria"] ?>"><?php echo $rsestado1["descategoria"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                 <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Categoria</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT c.idcategoria, c.descategoria FROM categoria c";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idcategoria"] ?>"><?php echo $rsestado1["descategoria"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                                    <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>
                        <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>
                        <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>
                        <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>
                        <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>
                        <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-5 col-sm-5 control-label">Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" id="txtcategoria1" class="form-control">
                    </div>

                </div>

                </div>
   
    


            </form>
        </div>
    </div>