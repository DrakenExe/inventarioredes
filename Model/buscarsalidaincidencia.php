<?php
include('../Conexion/conexion.php');
session_start();
$cn = Conectarse();
$codigopatrimonial = $_POST['codigopatrimonial'];
?>



<?php
 $rsconsulta = "SELECT s.idsalida, s.tipodocumento, s.numerosalida, s.fechasalida, 
     s.codigorequerimiento, s.recibido, s.opcionsalida, s.estado, s.idpersona, s.rnd,s.idsede, s.idpabellon, 
     s.idlocal, s.idtipo, s.idambiente, se.descripcionsede, pa.despabellon, lo.deslocal, ti.destipo, am.desambiente, 
     am.idpiso, pi.despiso, sdt.idingresoactivodetalle, iad.idingresoactivos, iad.idactivo, ia.iddocumento, ia.numero, 
     ia.serie, ia.fecha, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario,
     a.nombreequipo, a.estado, a.otros, ca.descategoria, ta.descripcionta, sta.descripcionsta, ma.desmarca, ma.modelo 
     FROM salida s inner join sede se on se.idsede=s.idsede inner join pabellon pa on pa.idpabellon=s.idpabellon
     inner join local lo on lo.idlocal=s.idlocal inner join tipo ti on ti.idtipo=s.idtipo 
     inner join ambiente am on am.idambiente=s.idambiente inner join piso pi on pi.idpiso=am.idambiente 
     inner join salidadetalle sdt on sdt.idsalida=s.idsalida
     inner join ingresoactivodetalle iad on iad.idingresoactivodetalle=sdt.idingresoactivodetalle 
     inner join ingresoactivos ia on ia.idingresoactivos=iad.idingresoactivos
     inner join activo a on a.idactivo=iad.idactivo
     inner join categoria ca on ca.idcategoria=a.idcategoria
     inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
     inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
     inner join marca ma on ma.idmarca=a.idmarca
 where concat(a.codigoinventario,' ',a.serie) like '%$codigopatrimonial%'";
 
 

 
$consulta = mysql_query($rsconsulta);
$rsconsulta = mysql_fetch_array($consulta);
$idsalida= $rsconsulta['idsalida'];
$codigoinventario = $rsconsulta['codigoinventario'];
$descategoria = $rsconsulta['descategoria'];

$descripcionta= $rsconsulta['descripcionta'];
$descripcionsta = $rsconsulta['descripcionsta'];
$desmarca = $rsconsulta['desmarca'];
$modelo= $rsconsulta['modelo'];
$serie = $rsconsulta['serie'];
$nombreequipo = $rsconsulta['nombreequipo'];
$descripcionsede= $rsconsulta['descripcionsede'];
$despabellon = $rsconsulta['despabellon'];
$deslocal = $rsconsulta['deslocal'];
$destipo= $rsconsulta['destipo'];
$desambiente = $rsconsulta['desambiente'];
$despiso = $rsconsulta['despiso'];
$recibido = $rsconsulta['recibido'];
?>


            <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Codigo</label>
                    <div class="col-sm-4">
                        <input type="text" id="codigopatrimonial" value='<?php echo $codigoinventario ?>' placeholder="Codigo Patrimonial" class="form-control">
                        <input type="hidden" id="idsalida" value='<?php echo $idsalida ?>'>
                    </div>
                    <div class="col-sm-4">

                        <button type="button" onclick="buscarequiposalida();" class="btn btn-danger"> <i class="glyphicon glyphicon-search"></i> </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-4">
                        <input type="text" id="categoria" disabled=""value='<?php echo $descategoria ?>' class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Tipo</label>
                    <div class="col-sm-4">
                        <input type="text" id="tipo"disabled="" value='<?php echo $descripcionta ?>' class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">SubTipo</label>
                    <div class="col-sm-4">
                        <input type="text" id="subtipo"disabled="" value='<?php echo $descripcionsta ?>' class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Marca</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="marca"value='<?php echo $desmarca ?>' class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="modelo" value='<?php echo $modelo ?>' class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Serie</label>
                    <div class="col-sm-4">
                        <input type="text"  disabled="" id="serie" value='<?php echo $serie ?>' class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nombre Equi.</label>
                    <div class="col-sm-9">
                        <input type="text" disabled=""  id="nombrequipo" value='<?php echo $nombreequipo ?>' class="form-control">
                    </div>


                </div>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sede</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="sede" value='<?php echo $descripcionsede ?>' class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Pabellón</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="pabellon" value='<?php echo $despabellon ?>' class="form-control">
                    </div>



                </div>
                <div class="form-group">

                    <label class="col-sm-2 col-sm-2 control-label">Local</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="local" value='<?php echo $deslocal ?>' class="form-control">
                    </div>
                    <label class="col-sm-1 col-sm-1 control-label">Tipo</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="tipo" value='<?php echo $destipo ?>' class="form-control">
                    </div>



                </div>
                <div class="form-group">



                    <label class="col-sm-2 col-sm-2 control-label">Ambiente</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="ambiente" value='<?php echo $desambiente ?>' class="form-control">
                    </div>

                    <label class="col-sm-1 col-sm-1 control-label">Usuario</label>
                    <div class="col-sm-4">
                        <input type="text" disabled="" id="usuario" value='<?php echo $recibido ?>' class="form-control">
                    </div>


                </div>
























