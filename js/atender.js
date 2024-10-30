
function limpiaratender() {

    document.getElementById("fechaatencion").value = "";

    document.getElementById("cbotipomantenimiento").value = "";
    document.getElementById("descripcion").value = "";
    document.getElementById("estadoatencion").value = "";



}

function validaratenderincidencia() {
    fechaatencion = document.getElementById("fechaatencion").value;
    cbotipomantenimiento = document.getElementById("cbotipomantenimiento").value;
    descripcion = document.getElementById("descripcion").value;

    if (fechaatencion == "" || cbotipomantenimiento == "" || descripcion == "") {
        return false;
    } else {
        return true;
    }
}
function guardaratenderincidencia(codigo)
{
    if (validaratenderincidencia() == true) {

        var fechaatencion = $("#fechaatencion").val();
        var cbotipomantenimiento = $("#cbotipomantenimiento").val();
        var descripcion = $("#descripcion").val();
        var estadoatencion = $("#estadoatencion").val();





        $.post("../Controller/atender.php", {
            fechaatencion: fechaatencion,
            cbotipomantenimiento: cbotipomantenimiento,
            descripcion: descripcion,
            estadoatencion: estadoatencion,
            codigo: codigo


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Fecha, Seleccionar Mantenimiento, Descripción',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}