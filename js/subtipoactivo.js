
function limpiarsubtipoactivo() {

    document.getElementById("txtcategoria").value = "";




}


function validarsta() {
    txtcategoria = document.getElementById("txtcategoria").value;


    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarsubtipoactivo()
{
    if (validarsta() == true) {

        var txtcategoria = $("#txtcategoria").val();



        $.post("../Controller/subtipoactivo.php", {
            txtcategoria: txtcategoria


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'SubTipoActivo',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}