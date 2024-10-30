
function limpiartipo() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validartipo() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardartipo()
{
    if (validartipo() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/tipo.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Categoria',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}