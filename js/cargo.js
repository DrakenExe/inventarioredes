
function limpiarcargo() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validarcargo() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarcargo()
{
    if (validarcargo() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/cargo.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Cargo',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}