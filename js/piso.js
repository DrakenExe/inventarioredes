
function limpiarpiso() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validarpiso() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarpiso()
{
    if (validarpiso() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/piso.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Piso',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}