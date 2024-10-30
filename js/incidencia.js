function veratenciones(codigo)
{

    if (confirm("¿Ver Atenciones?"))
    {
        document.getElementById("cargar").innerHTML = "Cargando...";
        $.post("../View/veratenciones.php", {

            codigo: codigo
        },
                function (data) {
                    $("#cargar").html(data);
                });
    } else {

    }
}
function atenderincidencias(codigo)
{

    if (confirm("¿Atender Incidencia?"))
    {
        document.getElementById("cargar").innerHTML = "Cargando...";
        $.post("../View/atenderincidencias.php", {

            codigo: codigo
        },
                function (data) {
                    $("#cargar").html(data);
                });
    } else {

    }
}
function limpiarincidencia() {


    document.getElementById("fecha").value = "";
    document.getElementById("motivo").value = "";
    document.getElementById("prioridad").value = "";
    document.getElementById("estado").value = "";




}



function validarincidencia() {
    fecha = document.getElementById("fecha").value;
    motivo = document.getElementById("motivo").value;
    prioridad = document.getElementById("prioridad").value;


    if (fecha == ""||motivo == ""||prioridad == "") {
        return false;
    } else {
        return true;
    }
}
function guardarincidencia()
{
    if (validarincidencia() == true) {

        var idsalida = $("#idsalida").val();
        var codigo = $("#codigo").val();
        var fecha = $("#fecha").val();
        var motivo = $("#motivo").val();
        var prioridad = $("#prioridad").val();
        var estado = $("#estado").val();
        var rnd = $("#rnd").val();



        $.post("../Controller/incidencia.php", {
            idsalida: idsalida,
            codigo: codigo,
            fecha: fecha,
            motivo: motivo,
            prioridad: prioridad,
            estado: estado,
            rnd: rnd


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Fecha, Motivo y Prioridad',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}