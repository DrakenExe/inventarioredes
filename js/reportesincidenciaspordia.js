
    
    
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