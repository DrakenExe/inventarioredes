    function reporteconsultaringresos() {
        var txtfechainicio = $("#txtfechainicio").val();
        var txtfechafin = $("#txtfechafin").val();

        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../Model/reporteingresos.php",
                {
                    txtfechainicio: txtfechainicio,
                            txtfechafin: txtfechafin

                }, function (data) {
            $("#mostrar").html(data);
        });

    }
    
    
function veringresoactivosreportes(codigo)
{

    if (confirm("¿Ver Ingresos de los Activos ?"))
    {
        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../View/frmreportesingresosdetalle.php", {

            codigo: codigo
        },
                function (data) {
                    $("#mostrar").html(data);
                });
    } else {

    }
}