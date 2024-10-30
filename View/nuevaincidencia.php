<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['txtusuario'] == "") {
    header("Location: ../index.php");
}

$rstotal = " select count(*) + 1 as total  FROM incidencias i";
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['total'];
?>
<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="css/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="../js/admin.js" type="text/javascript"></script> 
<script src="../js/incidencia.js" type="text/javascript"></script> 
<script>

    function buscarequiposalida()
    {
        var codigopatrimonial = $("#codigopatrimonial").val();

        if (codigopatrimonial == "")
        {
            alert("Ingresar Codigo Patrimonial");
        } else
        {
            document.getElementById("veralumno").innerHTML = "";

            $.post("../Model/buscarsalidaincidencia.php",
                    {
                        codigopatrimonial: codigopatrimonial

                    }, function (data) {
                $("#veralumno").html(data);
            });
        }
    }

</script>

<div class="row mt">
    <div class="col-lg-6">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Buscar Activo</h4>

            <form class="form-horizontal style-form">

  <div id="veralumno" > 

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Codigo</label>
                    <div class="col-sm-4">
                        <input type="text" id="codigopatrimonial" placeholder="Codigo Patrimonial" class="form-control">
                          <input type="hidden" id="idsalida" value='<?php echo $idsalida ?>'>
                    </div>
                    <div class="col-sm-4">

                        <button type="button" onclick="buscarequiposalida();" class="btn btn-primary"> <i class="glyphicon glyphicon-search"></i> </button>


                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="categoria" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Tipo</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="tipo" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">SubTipo</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="subtipo" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Marca</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="marca" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="modelo" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Serie</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="serie" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nombre Equi.</label>
                    <div class="col-sm-9">
                        <input type="text" disabled="" id="nombrequipo" class="form-control">
                    </div>


                </div>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sede</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="sede" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Pabellón</label>
                    <div class="col-sm-4">
                        <input type="text"  disabled="" id="pabellon" class="form-control">
                    </div>



                </div>
                <div class="form-group">

                    <label class="col-sm-2 col-sm-2 control-label">Local</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="local" class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Tipo</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="tipo" class="form-control">
                    </div>



                </div>
                <div class="form-group">



                    <label class="col-sm-2 col-sm-2 control-label">Ambiente</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="ambiente" class="form-control">
                    </div>

                    <label class="col-sm-1 col-sm-1 control-label">Usuario</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="usuario" class="form-control">
                    </div>


                </div>


</div>



            </form>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Registro de las Incidencias</h4>

            <form class="form-horizontal style-form">



                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Codigo</label>
                    <div class="col-sm-4">
                        <input type="text" id="codigo" value="INCI-OO<?php echo $NroRegistros?>" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Fecha</label>
                    <div class="col-sm-4">
                        <input type="date" id="fecha" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Motivo</label>
                    <div class="col-sm-11">
                        <input type="text" id="motivo" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Prioridad</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="prioridad">
                            <option value="">&nbsp;</option>
                            <option value="ALTA">ALTA</option>
                            <option value="MEDIA">MEDIA</option>
                            <option value="BAJA">BAJA</option>

                        </select>
                    </div>

                </div>
                
                     <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Registrado por</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="rnd">
                            <option value="">&nbsp;</option>
                            <option value="FERNANDO AREVALO">FERNANDO AREVALO</option>
                           

                        </select>
                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Estado</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="estado">

                            <option value="RECIBIDO">RECIBIDO</option>


                        </select>
                    </div>

                </div>





                <div id="mensajefrm"></div>
                <div class="form-group">
                    <label class="col-sm-4 col-sm-4 control-label"></label>
                    <div class="col-sm-4">
                        <button type="button" onclick="guardarincidencia()" class="btn btn-theme"><i class="glyphicon glyphicon-save-file"></i>  Guardar</button>
                        <button type="button" onclick="frmregistrarincidencias()" class="btn btn-danger"> <i class="glyphicon glyphicon-send"></i>Listar</button>
                    </div>





                </div>



            </form>
        </div>

    </div>

    <!-- col-lg-12-->
</div>

