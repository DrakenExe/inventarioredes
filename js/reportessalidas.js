    function reporteconsultarsalidas() {
        var txtfechainicio = $("#txtfechainicio").val();
        var txtfechafin = $("#txtfechafin").val();

        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../Model/reportesalidas.php",
                {
                    txtfechainicio: txtfechainicio,
                            txtfechafin: txtfechafin

                }, function (data) {
            $("#mostrar").html(data);
        });

    }
    
    
function versalidaactivosreportes(codigo)
{

    if (confirm("¿Ver Ingresos de los Activos ?"))
    {
        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../View/frmreportessalidasdetalle.php", {

            codigo: codigo
        },
                function (data) {
                    $("#mostrar").html(data);
                });
    } else {

    }
}