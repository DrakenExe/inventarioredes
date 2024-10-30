
function limpiarsede() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validarsede() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarsede()
{
    if (validarsede() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/sede.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Sede',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}