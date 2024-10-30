
function veringresoactivos(codigo)
{

    if (confirm("¿Ver Ingresos de los Activos ?"))
    {
        document.getElementById("cargar").innerHTML = "Cargando...";
        $.post("../View/cargardetalleingresosactivos.php", {

            codigo: codigo
        },
                function (data) {
                    $("#cargar").html(data);
                });
    } else {

    }
}
function limpiaringresoactivo() {

    document.getElementById("documento").value = "";
    document.getElementById("numero").value = "";
    document.getElementById("Serie").value = "";
    document.getElementById("fecha").value = "";
    document.getElementById("cbopersonal").value = "";
    $("#grilla").children("tbody").html('');




}



function validaringresoactivo() {
    documento = document.getElementById("documento").value;
    numero = document.getElementById("numero").value;
    Serie = document.getElementById("Serie").value;



    if (documento == ""||numero == ""||Serie == "") {
        return false;
    } else {
        return true;
    }
}
function guardaringresoactivo()
{
    if (validaringresoactivo() == true) {

        var documento = $("#documento").val();
        var numero = $("#numero").val();
        var Serie = $("#Serie").val();
        var fecha = $("#fecha").val();
        var cbopersonal = $("#cbopersonal").val();


        var rnd = Math.random() * 11;

        var idactivo = $("#grilla").children("tbody").find("tr").length;
        var ciexidactivo = "";
        for (i = 0; i < idactivo; i++)
        {
            ciexidactivo += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(0).html() + ",";
        }


        var estado = $("#grilla").children("tbody").find("tr").length;
        var ciexestado = "";
        for (i = 0; i < estado; i++)
        {
            ciexestado += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(8).html() + ",";
        }



        $.post("../Controller/ingresoactivo.php", {
            documento: documento,
            numero: numero,
            Serie: Serie,
            fecha: fecha,
            cbopersonal: cbopersonal,
            rnd: rnd,
            ciexidactivo: ciexidactivo,
            ciexestado: ciexestado


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Documento, Numero y Serie',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}












function agregaringresoactivos() {


    idactivo = $("#idactivo").val();
    txtcodigoingreso = $("#txtcodigoingreso").val();
    categoria = $("#categoria").val();
    tipo = $("#tipo").val();
    subtipo = $("#subtipo").val();
    marca = $("#marca").val();

    serie = $("#serie").val();
    nombrequipo = $("#nombrequipo").val();
    estado = $("#estado").val();


    if
            (categoria == "" || tipo == "" || subtipo == "")
    {
        alert("Ingresar Activo");
    } else
    {


        var elementos = $("#grilla tbody").find("tr").length;
        var j = 0;
        var r = 0;
        var g = 0;
        var ciex = "";
        for (i = 0; i < elementos; i++) {
            if (idactivo == $("#grilla tbody").find("tr").eq(i).find("td").eq(0).html())
            {
                j = j + 1;
            }
        }
        if (j != 0) {
            alert("EL Activo se encuentra registrado!");
        } else
        {


            cadena = "<tr style='text-align:center;'>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#idactivo").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#txtcodigoingreso").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#categoria").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#tipo").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#subtipo").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#marca").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#serie").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#nombrequipo").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#estado").val() + "</td>";

            cadena = cadena + "<td style='text-align:center;'><a class='elimina'><img src='../View/img/delete.png' /></a></td></tr>";
            $("#grilla tbody").append(cadena);


            fn_dar_eliminarperifericos();
            document.getElementById("idactivo").value = '';
            document.getElementById("txtcodigoingreso").value = '';
            document.getElementById("categoria").value = '';

            document.getElementById("tipo").value = '';
            document.getElementById("subtipo").value = '';
            document.getElementById("marca").value = '';
            document.getElementById("serie").value = '';
            document.getElementById("nombrequipo").value = '';
            document.getElementById("estado").value = '';


        }

    }



}






function fn_dar_eliminarperifericos() {

    $("a.elimina").click(function () {
        id = $(this).parents("tr").find("td").eq(0).html();
        $(this).parents("tr").fadeOut("normal", function () {
            $(this).remove();
            var elementos = $("#grilla tbody").find("tr").length;
            var j = 0;
            var r = 0;
            var g = 0;
            var ciex = "";


        })


    });

}


