
function limpiarperiferico() {

    document.getElementById("txtcategoria").value = "";

}


function validarperiferico() {
    txtcategoria = document.getElementById("txtcategoria").value;


    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarperiferico()
{
    if (validarperiferico() == true) {

        var txtcategoria = $("#txtcategoria").val();



        $.post("../Controller/periferico.php", {
            txtcategoria: txtcategoria


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Periferico',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}