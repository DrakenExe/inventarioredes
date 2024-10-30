
function versalidaactivos(codigo)
{

    if (confirm("¿Ver Salida de Activos?"))
    {
        document.getElementById("cargar").innerHTML = "Cargando...";
        $.post("../View/cargardetallesalidaactivos.php", {

            codigo: codigo
        },
                function (data) {
                    $("#cargar").html(data);
                });
    } else {

    }
}



function limpiarsalidaactivo() {

    document.getElementById("cbodocumento").value = "";

    document.getElementById("fecha").value = "";
    document.getElementById("cbopersonal").value = "";
    document.getElementById("cboopcion").value = "";
    document.getElementById("cbosede").value = "";
    document.getElementById("cbolocal").value = "";
    document.getElementById("cbopabellon").value = "";
    document.getElementById("cbotipo").value = "";

    document.getElementById("cboambiente").value = "";
    document.getElementById("recibido").value = "";
    $("#grilla").children("tbody").html('');




}



function validarsalidaactivo() {
    cbodocumento = document.getElementById("cbodocumento").value;
     recibido = document.getElementById("recibido").value;


    if (cbodocumento == ""||recibido == "") {
        return false;
    } else {
        return true;
    }
}
function guardarsalidaactivo()
{
    if (validarsalidaactivo() == true) {

        var cbodocumento = $("#cbodocumento").val();
        var numero = $("#numero").val();
        var codigorequerimiento = $("#codigorequerimiento").val();
        var fecha = $("#fecha").val();
        var cbopersonal = $("#cbopersonal").val();
        var cboopcion = $("#cboopcion").val();
        var cbosede = $("#cbosede").val();
        var cbolocal = $("#cbolocal").val();
        var cbopabellon = $("#cbopabellon").val();
        var cbotipo = $("#cbotipo").val();
        var cboambiente = $("#cboambiente").val();
        var recibido = $("#recibido").val();



        var rnd = Math.random() * 11;

        var idingresoactivodetalle = $("#grilla").children("tbody").find("tr").length;
        var ciexidingresoactivodetalle = "";
        for (i = 0; i < idingresoactivodetalle; i++)
        {
            ciexidingresoactivodetalle += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(0).html() + ",";
        }


        var estado = $("#grilla").children("tbody").find("tr").length;
        var ciexestado = "";
        for (i = 0; i < estado; i++)
        {
            ciexestado += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(8).html() + ",";
        }



        $.post("../Controller/salidaactivo.php", {
            cbodocumento: cbodocumento,
            numero: numero,
            codigorequerimiento: codigorequerimiento,
            fecha: fecha,
            cbopersonal: cbopersonal,
            rnd: rnd,
            cboopcion: cboopcion,
            cbosede: cbosede,
            cbolocal: cbolocal,
            cbopabellon: cbopabellon,
            cbotipo: cbotipo,
            cboambiente: cboambiente,
            recibido: recibido,
            ciexidingresoactivodetalle: ciexidingresoactivodetalle,
            ciexestado: ciexestado


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Documento, Recibido',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}



function agregarsalidaactivos() {


    idingresoactivodetalle = $("#idingresoactivodetalle").val();
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
            if (idingresoactivodetalle == $("#grilla tbody").find("tr").eq(i).find("td").eq(0).html())
            {
                j = j + 1;
            }
        }
        if (j != 0) {
            alert("EL Activo se encuentra registrado!");
        } else
        {


            cadena = "<tr style='text-align:center;'>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#idingresoactivodetalle").val() + "</td>";
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
            document.getElementById("idingresoactivodetalle").value = '';
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


