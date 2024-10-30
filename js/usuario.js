
function limpiarusuario() {

    document.getElementById("cbopersonal").value = "";
    document.getElementById("txtusuario").value = "";
    document.getElementById("txtclave").value = "";



}


function validarusuario() {
    cbopersonal = document.getElementById("cbopersonal").value;
    txtusuario = document.getElementById("txtusuario").value;
    txtclave = document.getElementById("txtclave").value;


    if (cbopersonal == "" || txtusuario == "" || txtclave == "") {
        return false;
    } else {
        return true;
    }
}
function guardarusuario()
{
    if (validarusuario() == true) {

        var cbopersonal = $("#cbopersonal").val();
        var txtusuario = $("#txtusuario").val();
        var txtclave = $("#txtclave").val();



        $.post("../Controller/Usuario.php", {
            cbopersonal: cbopersonal,
            txtusuario: txtusuario,
            txtclave: txtclave



        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Seleccionar Personal, Usuario y Clave',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}