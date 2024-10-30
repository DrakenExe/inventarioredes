
function limpiarpabellon() {

    document.getElementById("txtcategoria").value = "";




}

 
 function validarpabellon() {
    txtcategoria = document.getElementById("txtcategoria").value;
  

    if (txtcategoria == "") {
        return false;
    } else {
        return true;
    }
}
function guardarpabellon()
{
    if (validarpabellon() == true) {

        var txtcategoria = $("#txtcategoria").val();
        
        

        $.post("../Controller/pabellon.php", {
            txtcategoria: txtcategoria
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Pabellón',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}