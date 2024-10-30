    function reporteconsultarequipos() {
        var categoria = $("#categoria").val();



        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../Model/reporteequipos.php",
                {
                    categoria: categoria,

                }, function (data) {
            $("#mostrar").html(data);
        });

    }
    
    function nuevoactivodetallereporte(codigo)
{

    if (confirm("¿Ver Detalle?"))
    {
        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../View/frmreportesequiposdetalle.php", {

            codigo: codigo
        },
                function (data) {
                    $("#mostrar").html(data);
                });
    } else {

    }
}

    function reporteconsultarequiposhojadevida() {
        var categoria = $("#categoria").val();



        document.getElementById("mostrar").innerHTML = "Cargando...";
        $.post("../Model/reporteequiposhojavida.php",
                {
                    categoria: categoria,

                }, function (data) {
            $("#mostrar").html(data);
        });

    }