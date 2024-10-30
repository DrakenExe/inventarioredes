
function limpiarpersonal() {

    document.getElementById("nombres").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("direccion").value = "";
    document.getElementById("dni").value = "";
    document.getElementById("celular").value = "";
    document.getElementById("cargo").value = "";



}


function validarpersonal() {
    nombres = document.getElementById("nombres").value;
    apellidos = document.getElementById("apellidos").value;
    direccion = document.getElementById("direccion").value;
    dni = document.getElementById("dni").value;
    celular = document.getElementById("celular").value;
    cargo = document.getElementById("cargo").value;



    if (nombres == "" || apellidos == "" || direccion == "" || dni == "" || celular == "" || cargo == "") {
        return false;
    } else {
        return true;
    }
}
function guardarpersonal()
{
    if (validarpersonal() == true) {

        var nombres = $("#nombres").val();
        var apellidos = $("#apellidos").val();
        var direccion = $("#direccion").val();
        var dni = $("#dni").val();
        var celular = $("#celular").val();
        var cargo = $("#cargo").val();



        $.post("../Controller/personal.php", {
            nombres: nombres,
            apellidos: apellidos,
            direccion: direccion,
            dni: dni,
            celular: celular,
            cargo: cargo


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