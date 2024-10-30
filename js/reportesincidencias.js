    function reporteconsultarincidencias() {
        var txtfechainicio = $("#txtfechainicio").val();
        var txtfechafin = $("#txtfechafin").val();

        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../Model/reporteincidencias.php",
                {
                    txtfechainicio: txtfechainicio,
                            txtfechafin: txtfechafin

                }, function (data) {
            $("#mostrar").html(data);
        });

    }
    
    
function verincidenciasatendidas(codigo)
{

    if (confirm("¿Ver detalle de incidencia ?"))
    {
        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../View/frmreportesincidenciasdetalle.php", {

            codigo: codigo
        },
                function (data) {
                    $("#mostrar").html(data);
                });
    } else {

    }
}