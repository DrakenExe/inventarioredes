
function limpiartipoactivo() {

    document.getElementById("txtcategoria").value = "";




}



function validarta() {
    txtcategoria = document.getElementById("txtcategoria").value;


    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardartipoactivo()
{
    if (validarta() == true) {

        var txtcategoria = $("#txtcategoria").val();



        $.post("../Controller/tipoactivo.php", {
            txtcategoria: txtcategoria


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'TipoActivo',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}