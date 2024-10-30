<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SAIMT</title>
        <meta name="viewport" content="width=device-width,user-scalable=no" />  

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script>
            function pressNumeros1(e) {
                code = (e.keyCode ? e.keyCode : e.which);
                return isNumber1(code);
            }
            function isNumber1(k) {
                if (k == 0 || (k >= 48 && k <= 57) || k == 8 || k == 9 || k == 46 || k == 37 || k == 39)
                    return true;
                return false;
            }
            function pressletras(evt) {
                vt = (evt) ? evt : event;
                var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
                        ((evt.which) ? evt.which : 0));
                if ((charCode >= 48 && charCode <= 57) && charCode > 31 && (charCode < 64 || charCode > 90) && (charCode < 97 || charCode > 122))
                {
                    return false;
                }
                return true;
            }
            function pressNumeros(e) {
                code = (e.keyCode ? e.keyCode : e.which);
                return isNumber(code);
            }
            function isNumber(k) {
                if (k == 0 || (k >= 48 && k <= 57) || k == 8 || k == 9 || k == 37 || k == 39)
                    return true;
                return false;
            }
        </script>
        <script>

            function validarcamposcliente() {
                v1 = document.getElementById("txtdni").value;
                v2 = document.getElementById("txtnombres").value;
                v3 = document.getElementById("txtapellidos").value;
                v4 = document.getElementById("txtcelular").value;
                v5 = document.getElementById("txtusuario").value;
                v6 = document.getElementById("txtclave").value;

                if (v1 == "" || v2 == "" | v3 == "" | v4 == "" | v5 == "" | v6 == "") {
                    return false;
                } else {
                    return true;
                }
            }
            function guardarnuevocliente()
            {
                if (validarcamposcliente() == true) {

                    var txtdni = $("#txtdni").val();
                    var txtnombres = $("#txtnombres").val();
                    var txtapellidos = $("#txtapellidos").val();

                    var txtcelular = $("#txtcelular").val();

                    var txtusuario = $("#txtusuario").val();
                    var txtclave = $("#txtclave").val();


                    $.post("insertarnuevocliente.php", {

                        txtdni: txtdni,
                        txtnombres: txtnombres,
                        txtapellidos: txtapellidos,

                        txtcelular: txtcelular,

                        txtusuario: txtusuario,
                        txtclave: txtclave

                    }, function (data) {
                        $("#mensaje").html(data)

                    }
                    );
                } else {
                    $("#mensaje").html("<p style='color:#E74B3B,  font-weight: bold;   font-size:15px;text-align: center' >Ingresar Todos los Campos Obligatorios</p>");
                }

            }
        </script>
    </head>

    <body>
        <div data-role="page" id="page1" style="background:#fff;">
            <header data-role="header" style="background:#04496D;color:#fff">  
                <h1>SAIMT</h1>  
            </header>  



            <div class="content" data-role="content">  



                <div data-role="fieldcontain">
                    <label for="textarea-1">DNI</label>
                    <input type=text id="txtdni" maxlength="8" onkeypress="return pressNumeros(event);" name="txtdni" />
                </div>
                <div data-role="fieldcontain">
                    <label for="textarea-1">Nombres</label>
                    <input type=text id="txtnombres" onkeypress="return pressletras(event);" name="txtnombres" />
                </div>
                <div data-role="fieldcontain">
                    <label for="textarea-1">Apellidos</label>
                    <input type=text id="txtapellidos" onkeypress="return pressletras(event);" name="txtapellidos" />
                </div>

                <div data-role="fieldcontain">
                    <label for="textarea-1">Celular</label>
                    <input type=text id="txtcelular" maxlength="9" onkeypress="return pressNumeros(event);"  name="txtcelular" />
                </div>
                <div data-role="fieldcontain">
                    <label for="textarea-1">Usuario</label>
                    <input type=text id="txtusuario" maxlength="15"   name="txtusuario" />
                </div>
                <div data-role="fieldcontain">
                    <label for="textarea-1">Clave</label>
                    <input type=text id="txtclave" maxlength="15"   name="txtclave" />
                </div>
                <div id="mensaje"></div>
                <button type="button" data-icon="user" onclick="guardarnuevocliente();" style="background:#159F85; color:#fff;"   >Registrar</button>

                <a href="index.php" style="background:#E74B3B; color:#fff"  class="ui-btn ui-icon-delete ui-btn-icon-left">salir</a>
            </div>   
            <footer data-role="footer" style="background:#04496D;color:#fff" data-position="fixed">  
                <h5>Derechos Reservados</h5>  
            </footer> 
        </div>




    </body>
</html>
