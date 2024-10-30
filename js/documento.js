
function limpiardocumento() {

    document.getElementById("txtcategoria").value = "";




}

  function validarambiente() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardardocumentos()
{
    if (validarambiente() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/documento.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Documento',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}