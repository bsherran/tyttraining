var bandera = true;
$(function () {
    obtenerFichas('');
    $('#txtBuscarFicha').keyup(function () {
        var keyword = $(this).val();
        bandera = false;
        obtenerFichas(keyword);
    });
});

function obtenerFichas(keyword) {

    if (bandera) {
        keyword = "";
    } else {
        keyword = keyword;
    }

    $.ajax({
        url: '?c=Ficha&a=buscarFicha',
        data: 'keyword=' + keyword,
        method: 'post',
        dataType: 'json',
        success: function (data) {

            var html = "";
            for (var i = 0; i < data.data.length; i++) {
                var ficha = data.data[i];
                html += "<tr>";
//                html += "<td>" + ficha.ficId + "</td>";
                html += "<td>" + ficha.ficCodigo + "</td>";
                html += "<td>" + ficha.proNombre + "</td>";
                html += "<td>" + ficha.ficFechaInicio + "</td>";
                html += "<td>" + ficha.ficFechaFin + "</td>";
//                html += "<td class='text-center'><a href='?c=Ficha&a=delete&ficCodigo=" + ficha.ficId + "'><i class='fa fa-pencil-square'></i></a></td>";
//                html += "<td class='text-center'><a href='?c=Ficha&a=delete&ficCodigo=" + ficha.ficCodigo + "'><i class='fa fa-trash'></i></a></td>";
                html += "</tr>";
            }
            $('#tblFicha').find('tbody').html(html);
        }, error: function (e, err) {
            alert("No se encuentran los datos ingresados");
        }
    });
}


