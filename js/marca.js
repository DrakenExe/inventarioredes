
function limpiarmarca() {

    document.getElementById("txtcategoria").value = "";
    document.getElementById("txtcategoria1").value = "";



}
 
 
  function validarmarca() {
    txtcategoria = document.getElementById("txtcategoria").value;
      txtcategoria1 = document.getElementById("txtcategoria1").value;
  

    if (txtcategoria == ""||txtcategoria1 == "") {
        return false;
    } else {
        return true;
    }
}
function guardarmarca()
{
    if (validarmarca() == true) {

         var txtcategoria = $("#txtcategoria").val();
      var txtcategoria1 = $("#txtcategoria1").val();
        
        

        $.post("../Controller/marca.php", {
                  txtcategoria: txtcategoria,
                txtcategoria1:txtcategoria1
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Marca y Modelo',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}