<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}


$rstotal = " select count(*) + 1 as total  FROM salida s

          ";
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['total'];
?>

<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="css/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/salidaactivos.js" type="text/javascript"></script> 
<script>
    function buscaractivosalida()
    {
        var codigoinventario = $("#codigoinventario").val();

        if (codigoinventario < 1)
        {
            alert("Ingresar Codigo Inventario");
        } else
        {
            document.getElementById("loadingdnicargarproducto").innerHTML = "Buscando Periferico";
            $.post("../Model/buscarsalidaactivo.php",
                    {
                        codigoinventario: codigoinventario

                    }, function (data) {
                $("#loadingdnicargarproducto").html(data);
            });
        }
    }


</script>
<div class="row mt">
    <div class="col-lg-6">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Registrar Salida de los Activos</h4>

            <form class="form-horizontal style-form">


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Documento</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="cbodocumento">
                          
                            <option value="FICHA DE SALIDA">FICHA DE SALIDA</option>


                        </select>
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label">Número Doc.</label>
                    <div class="col-sm-3">
                        <input type="text" id="numero" value="FICHA00<?php echo $NroRegistros?>" class="form-control">
                    </div> 
                </div>




                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Codigo Req.</label>
                    <div class="col-sm-4">
                        <input type="text" id="codigorequerimiento" value="DTI-000<?php echo $NroRegistros?>" class="form-control">
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label">Fecha</label>
                    <div class="col-sm-3">
                        <input type="date" id="fecha" class="form-control">
                    </div>

                </div>




                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tecnico</label>
                    <div class="col-sm-4">
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
                    <label class="col-sm-2 col-sm-2 control-label">Opción</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="cboopcion">

                           
                            <option value="ASIGNACION">ASIGNACION</option>
                            <option value="PRESTAMO">DONACION</option>
                            <option value="DONACION">PRESTAMO</option>

                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Àrea</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="cbosede">


                            <?php
                            $rsestado1 = "SELECT s.idsede, s.descripcionsede FROM sede s";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idsede"] ?>"><?php echo $rsestado1["descripcionsede"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <label class="col-sm-2 col-sm-2 control-label">Local</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="cbolocal">


                            <?php
                            $rsestado1 = "SELECT l.idlocal, l.deslocal FROM `local` l";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idlocal"] ?>"><?php echo $rsestado1["deslocal"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pabellón</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="cbopabellon">


                            <?php
                            $rsestado1 = "SELECT p.idpabellon, p.despabellon FROM pabellon p";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idpabellon"] ?>"><?php echo $rsestado1["despabellon"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <label class="col-sm-2 col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="cbotipo">


                            <?php
                            $rsestado1 = "SELECT t.idtipo, t.destipo FROM tipo t";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idtipo"] ?>"><?php echo $rsestado1["destipo"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ambiente</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="cboambiente">


                            <?php
                            $rsestado1 = "SELECT a.idambiente,concat(a.desambiente,' - ', p.despiso)as datos,a.idpiso FROM ambiente a
                            inner join piso p on p.idpiso=a.idpiso";
                            $estado1 = mysql_query($rsestado1);
                            while ($rsestado1 = mysql_fetch_array($estado1)) {
                                ?>
                                <option  value="<?php echo $rsestado1["idambiente"] ?>"><?php echo $rsestado1["datos"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>



                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Recibido</label>
                    <div class="col-sm-10">
                        <input type="text" id="recibido" class="form-control">
                    </div>

                </div>









                <div id="mensajefrm"></div>




            </form>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Busqueda de los Activos</h4> 

            <form class="form-horizontal style-form">





                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Buscar</label>
                    <div class="col-sm-5">
                        <input type="text" id="txtcodigoingreso" disabled="" placeholder="Ingresar Codigo del Activo"class="form-control">
                        <input type="hidden" id="idingresoactivodetalle" disabled="" class="form-control">
                    </div>
                    <div class="col-sm-4">

                        <button type="button" data-toggle="modal" data-target="#myModal"class="btn btn-warning"> <i class="glyphicon glyphicon-search"></i> </button>


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

                        <input type="hidden" id="estado" value="SALIDA DE EQUIPO" class="form-control">
                    </div>
                    <button type="button" onclick="agregarsalidaactivos();" class="btn btn-theme">  <i class="glyphicon glyphicon-plus"></i> </button>

                </div>


                <div class="form-group row">
                    <section id="unseen">
                        <table id="grilla" class="table table-bordered table-striped table-condensed" style="width:90%;margin-left:40px">
                            <thead>
                                 <tr style="background:#001944; color:#fff">
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
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label"></label>
                    <div class="col-sm-4">



                        <button type="button" onclick="guardarsalidaactivo()" class="btn btn-danger">  <i class="glyphicon glyphicon-saved"></i> Registrar Salida de Activo</button>
                    </div>

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

                        <button type="button"class="btn btn-primary" onclick="buscaractivosalida()">Buscar</button>
                    </div>

                </div>











            </div>

            <div class="modal-footer">
                <div id="loadingdnicargarproducto" style=" height: auto; overflow: auto"></div>
            </div>
        </div>
    </div>
</div>