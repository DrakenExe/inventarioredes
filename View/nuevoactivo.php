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
<script src="../js/activos.js" type="text/javascript"></script> 
<script>
    function buscarperiferico()
    {
        var cboperifericos = $("#cboperifericos").val();

        if (cboperifericos == "")
        {
            alert("Seleccionar Periferico");
        } else
        {
            document.getElementById("loadingdnicargarproducto").innerHTML = "Buscando Periferico";
            $.post("../Model/buscarperifericos.php",
                    {
                        cboperifericos: cboperifericos

                    }, function (data) {
                $("#loadingdnicargarproducto").html(data);
            });
        }
    }


</script>
<div class="row mt">
    <div class="col-lg-3">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Ingreso de Activo</h4>

            <form class="form-horizontal style-form">


                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Categoria</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="categoria">
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
                        <select class="form-control"id="tipo">
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
                    <label class="col-sm-3 col-sm-3 control-label">Sub Tipo</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="subtipo">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT s.idsubtipoactivos, s.descripcionsta FROM subtipoactivos s";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idsubtipoactivos"] ?>"><?php echo $rsestado1["descripcionsta"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Marca</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="marca">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT m.idmarca, concat(m.desmarca,' - ',m.modelo)as datos, m.tipomodelo FROM marca m";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idmarca"] ?>"><?php echo $rsestado1["datos"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Serie</label>
                    <div class="col-sm-9">
                        <input type="text" id="serie" class="form-control" maxlength="20">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Inventario</label>
                    <div class="col-sm-9">
                        <input type="text" id="codigo" class="form-control" maxlength="20">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreequipo" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Otros</label>
                    <div class="col-sm-9">
                        <input type="text" id="otros" class="form-control">
                        <input type="hidden" id="estado" class="form-control">
                    </div>

                </div>

  





                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    <div class="col-lg-9">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Buscar Perifericos</h4> 

            <form class="form-horizontal style-form">





                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Buscar Perifericos</label>
                    <div class="col-sm-5">
                        <input type="text" id="txtperifericos" disabled="" class="form-control">
                        <input type="hidden" id="idperifericos" disabled="" class="form-control">
                    </div>
                    <div class="col-sm-4">

                        <button type="button" data-toggle="modal" data-target="#myModal"class="btn btn-danger"> <i class="glyphicon glyphicon-search"></i> </button>
                        
                         <button type="button" onclick="guardaractivo()" class="btn btn-theme">  <i class="glyphicon glyphicon-saved"></i> Registrar Activo</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Especificaciòn 01</label>
                    <div class="col-sm-10">
                        <input type="text" id="txtespecificacion01" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Especificaciòn 02</label>
                    <div class="col-sm-10">
                        <input type="text" id="txtespecificacion02" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Especificaciòn 03</label>
                    <div class="col-sm-10">
                        <input type="text" id="txtespecificacion03" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Especificaciòn 04</label>
                    <div class="col-sm-8">
                        <input type="text" id="txtespecificacion04" class="form-control">
                    </div>
                    <button type="button" onclick="agregarperifericos();" class="btn btn-theme">  <i class="glyphicon glyphicon-plus"></i> </button>

                </div>


                <div class="form-group row">
                    <section id="unseen">
                        <table id="grilla" class="table table-bordered table-striped table-condensed" style="width:90%;margin-left:40px">
                            <thead>
                                <tr style="background: #4ECDC4;color: #fff">
                                    <th >Id</th>
                                    <th >Periferico</th>
                                    <th>Especificación 01</th>
                                    <th >Especificación 02</th>
                                    <th >Especificación 03</th>
                                    <th >Especificación 04</th>

                                    <th ></th>
                                </tr>
                            </thead>
                            <tbody >
                            </tbody>
                            <tfoot >
                            </tfoot>
                        </table>
                    </section>
                </div>

                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    <!-- col-lg-12-->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Buscar Perifericos</h4>
            </div>
            <div class="modal-body">


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Periferico</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="cboperifericos" >
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT p.idperifericos, p.desperifericos FROM perifericos p";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idperifericos"] ?>"><?php echo $rsestado1["desperifericos"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">

                        <button type="button"class="btn btn-primary" onclick="buscarperiferico()">Buscar</button>
                    </div>

                </div>





            </div>

            <div class="modal-footer">
                <div id="loadingdnicargarproducto" style=" height: auto; overflow: auto"></div>
            </div>
        </div>
    </div>
</div>