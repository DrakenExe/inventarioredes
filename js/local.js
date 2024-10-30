
function limpiarlocal() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validarlocal() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarlocal()
{
    if (validarlocal() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/local.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Local',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}