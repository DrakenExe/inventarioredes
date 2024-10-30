
function limpiarcategoria() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validarcategoria() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarcategoria()
{
    if (validarcategoria() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/categoria.php", {
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