
function limpiarambiente() {

    document.getElementById("txtcategoria").value = "";
    document.getElementById("txtcategoria1").value = "";



}
 
 
  function validarambiente() {
    txtcategoria = document.getElementById("txtcategoria").value;
      txtcategoria1 = document.getElementById("txtcategoria1").value;
  

    if (txtcategoria == ""||txtcategoria1 == "") {
        return false;
    } else {
        return true;
    }
}
function guardarambiente()
{
    if (validarambiente() == true) {

         var txtcategoria = $("#txtcategoria").val();
      var txtcategoria1 = $("#txtcategoria1").val();
        
        

        $.post("../Controller/ambiente.php", {
                  txtcategoria: txtcategoria,
                txtcategoria1:txtcategoria1
            

        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Nivel y Numero',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}