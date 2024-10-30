<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}
?>
<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/ingresoactivos.js" type="text/javascript"></script> 


<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="css/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script>
    function buscaractivoingreso()
    {
        var codigoinventario = $("#codigoinventario").val();

        if (codigoinventario < 1)
        {
            alert("Ingresar Codigo Inventario");
        } else
        {
            document.getElementById("loadingdnicargarproducto").innerHTML = "Buscando Periferico";
            $.post("../Model/buscaringresoactivo.php",
                    {
                        codigoinventario: codigoinventario

                    }, function (data) {
                $("#loadingdnicargarproducto").html(data);
            });
        }
    }


</script>
<div class="row mt">
    <div class="col-lg-3">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Registrar Ingreso de los Activos</h4>

            <form class="form-horizontal style-form">


                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Documento</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="documento">
                            <option value="">&nbsp;</option>

                            <?php
                            $rsestado1 = "SELECT d.iddocumento, d.descripcion FROM documento d";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["iddocumento"] ?>"><?php echo $rsestado1["descripcion"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>




                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Número</label>
                    <div class="col-sm-9">
                        <input type="text" id="numero" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Serie</label>
                    <div class="col-sm-9">
                        <input type="text" id="Serie" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Fecha</label>
                    <div class="col-sm-9">
                        <input type="date" id="fecha" class="form-control">
                    </div>

                </div>
                 <div class="form-group">
                    <label class="col-sm-3 col-sm-3 control-label">Personal</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="cbopersonal">
                           

                            <?php
                            $rsestado1 = "SELECT p.idpersona, concat(p.nombres,' ',p.apellidos)as datos FROM persona p";
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
                    <label class="col-sm-3 col-sm-3 control-label"></label>
                    <div class="col-sm-1">



                        <button type="button" onclick="guardaringresoactivo()" class="btn btn-theme">  <i class="glyphicon glyphicon-saved"></i> Registrar Ingreso de Activo</button>
                    </div>

                </div>







                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    <div class="col-lg-9">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Busqueda de los Activos</h4> 

            <form class="form-horizontal style-form">





                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Buscar</label>
                    <div class="col-sm-5">
                        <input type="text" id="txtcodigoingreso" disabled="" placeholder="Ingresar Codigo del Activo"class="form-control">
                        <input type="hidden" id="idactivo" disabled="" class="form-control">
                    </div>
                    <div class="col-sm-4">

                        <button type="button" data-toggle="modal" data-target="#myModal"class="btn btn-danger"> <i class="glyphicon glyphicon-search"></i> </button>


                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Categoria</label>
                    <div class="col-sm-3">
                        <input type="text" id="categoria" disabled="" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Tipo</label>
                    <div class="col-sm-3">
                        <input type="text" id="tipo" disabled="" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">SubTipo</label>
                    <div class="col-sm-3">
                        <input type="text" id="subtipo" disabled="" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Marca</label>
                    <div class="col-sm-3">
                        <input type="text" id="marca" disabled="" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Serie</label>
                    <div class="col-sm-3">
                        <input type="text" id="serie" disabled="" class="form-control">
                    </div>


                </div>

                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Nombre</label>
                    <div class="col-sm-7">
                        <input type="text" id="nombrequipo" disabled="" class="form-control">
                        <input type="hidden" id="estado" value="INGRESO" class="form-control">
                    </div>
                    <button type="button" onclick="agregaringresoactivos();" class="btn btn-theme">  <i class="glyphicon glyphicon-plus"></i> </button>

                </div>


                <div class="form-group row">
                    <section id="unseen">
                        <table id="grilla" class="table table-bordered table-striped table-condensed" style="width:90%;margin-left:40px">
                            <thead>
                                <tr style="background: #4ECDC4;color: #fff">
                                    <th >Id</th>
                                    <th >Codigo</th>
                                    <th>Categoria</th>
                                    <th >Tipo</th>
                                    <th >SubTipo</th>
                                    <th >Marca</th>
                                    <th >Serie</th>
                                    <th >Nombre Equipo</th>
                                     <th >Estado</th>

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
                <h4 class="modal-title" id="myModalLabel">Buscar Activos</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-7">
                        <input type="text" id="codigoinventario" placeholder="Ingresar Codigo Inventario" class="form-control">
                    </div>

                    <div class="col-sm-2">

                        <button type="button"class="btn btn-primary" onclick="buscaractivoingreso()">Buscar</button>
                    </div>

                </div>











            </div>

            <div class="modal-footer">
                <div id="loadingdnicargarproducto" style=" height: auto; overflow: auto"></div>
            </div>
        </div>
    </div>
</div>