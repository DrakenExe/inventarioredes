
function limpiaractivo() {

    document.getElementById("categoria").value = "";
    document.getElementById("tipo").value = "";
    document.getElementById("subtipo").value = "";
    document.getElementById("marca").value = "";
    document.getElementById("serie").value = "";
    document.getElementById("codigo").value = "";
    document.getElementById("nombreequipo").value = "";
    document.getElementById("otros").value = "";
    document.getElementById("estado").value = "";
    $("#grilla").children("tbody").html('');




}



function validaractivo() {
    categoria = document.getElementById("categoria").value;
    tipo = document.getElementById("tipo").value;
    subtipo = document.getElementById("subtipo").value;
    marca = document.getElementById("marca").value;
    serie = document.getElementById("serie").value;
    codigo = document.getElementById("codigo").value;
    nombreequipo = document.getElementById("nombreequipo").value;
  


    if (categoria == ""||tipo == ""||subtipo == ""||marca == ""||serie == ""||codigo == "") {
        return false;
    } else {
        return true;
    }
}
function guardaractivo()
{
    if (validaractivo() == true) {

        var categoria = $("#categoria").val();
        var tipo = $("#tipo").val();
        var subtipo = $("#subtipo").val();
        var marca = $("#marca").val();
        var serie = $("#serie").val();
        var codigo = $("#codigo").val();
        var nombreequipo = $("#nombreequipo").val();
        var otros = $("#otros").val();
        var estado = $("#estado").val();

        var txtcategoria = $("#txtcategoria").val();
        var rnd = Math.random() * 11;

        var codigoperificacion = $("#grilla").children("tbody").find("tr").length;
        var ciexcodigoperificacion = "";
        for (i = 0; i < codigoperificacion; i++)
        {
            ciexcodigoperificacion += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(0).html() + ",";
        }

        var descripcion01 = $("#grilla").children("tbody").find("tr").length;
        var ciexdescripcion01 = "";
        for (i = 0; i < descripcion01; i++)
        {
            ciexdescripcion01 += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(2).html() + ",";
        }

        var descripcion02 = $("#grilla").children("tbody").find("tr").length;
        var ciexdescripcion02 = "";
        for (i = 0; i < descripcion02; i++)
        {
            ciexdescripcion02 += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(3).html() + ",";
        }
        var descripcion03 = $("#grilla").children("tbody").find("tr").length;
        var ciexdescripcion03 = "";
        for (i = 0; i < descripcion03; i++)
        {
            ciexdescripcion03 += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(4).html() + ",";
        }
        var descripcion04 = $("#grilla").children("tbody").find("tr").length;
        var ciexdescripcion04 = "";
        for (i = 0; i < descripcion04; i++)
        {
            ciexdescripcion04 += $("#grilla").children("tbody").find("tr").eq(i).find("td").eq(5).html() + ",";
        }



        $.post("../Controller/activo.php", {
            categoria: categoria,
            tipo: tipo,
            subtipo: subtipo,
            marca: marca,
            serie: serie,
            codigo: codigo,
            nombreequipo: nombreequipo,
            otros: otros,
            estado: estado,
            rnd: rnd,
            ciexcodigoperificacion: ciexcodigoperificacion,
            ciexdescripcion01: ciexdescripcion01,
            ciexdescripcion02: ciexdescripcion02,
            ciexdescripcion03: ciexdescripcion03,
            ciexdescripcion04: ciexdescripcion04


        }, function (data) {
            $("#mensajefrm").html(data)

        }
        );
    } else {
        swal({
            title: 'Ingrese campos oblicatorio!',
            text: 'Categoria,Tipo,Subtipo,Marca,Serie,Codigo Patrimonial,Nombre de Equipo',
            type: 'error',
            confirmButtonText: 'OK'
        })
    }

}









function nuevoactivodetalle(codigo)
{

    if (confirm("¿Ver Detalle?"))
    {
        document.getElementById("cargar").innerHTML = "Cargando...";
        $.post("../View/cargardetalleactivos.php", {

            codigo: codigo
        },
                function (data) {
                    $("#cargar").html(data);
                });
    } else {

    }
}

function agregarperifericos() {


    idperifericos = $("#idperifericos").val();
    txtperifericos = $("#txtperifericos").val();
    txtespecificacion01 = $("#txtespecificacion01").val();
    txtespecificacion02 = $("#txtespecificacion02").val();
    txtespecificacion03 = $("#txtespecificacion03").val();
    txtespecificacion04 = $("#txtespecificacion04").val();

    agregar = $("#agregar").val();



    if
            (txtperifericos == "" || txtespecificacion01 == "" || txtespecificacion02 == "")
    {
        alert("Ingresar Especificación");
    } else
    {


        var elementos = $("#grilla tbody").find("tr").length;
        var j = 0;
        var r = 0;
        var g = 0;
        var ciex = "";
        for (i = 0; i < elementos; i++) {
            if (idperifericos == $("#grilla tbody").find("tr").eq(i).find("td").eq(0).html())
            {
                j = j + 1;
            }
        }
        if (j != 0) {
            alert("Periferico ya Ingresado");
        } else
        {


            cadena = "<tr style='text-align:center;'>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#idperifericos").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#txtperifericos").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#txtespecificacion01").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#txtespecificacion02").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#txtespecificacion03").val() + "</td>";
            cadena = cadena + "<td style='text-align:center;'>" + $("#txtespecificacion04").val() + "</td>";


            cadena = cadena + "<td style='text-align:center;'><a class='elimina'><img src='../View/img/delete.png' /></a></td></tr>";
            $("#grilla tbody").append(cadena);


            fn_dar_eliminarperifericos();
            document.getElementById("idperifericos").value = '';
            document.getElementById("txtperifericos").value = '';
            document.getElementById("txtespecificacion01").value = '';

            document.getElementById("txtespecificacion02").value = '';
            document.getElementById("txtespecificacion03").value = '';
            document.getElementById("txtespecificacion04").value = '';



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


