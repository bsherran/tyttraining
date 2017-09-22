var bandera = true;
$(function() {
    obtenerFichas('');
    $('#txtBuscarFicha').change(function() {
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
        success: function(r) {

            if (r.data.length > 0) {
                var html = "";
                for (var i = 0; i < r.data.length; i++) {
                    var ficha = r.data[i];
                    html += "<tr>";
                    html += "<td>" + ficha.ficCodigo + "</td>";
                    html += "<td>" + ficha.proNombre + "</td>";
                    html += "<td>" + ficha.ficFechaInicio + "</td>";
                    html += "<td>" + ficha.ficFechaFin + "</td>";
                    html += "</tr>";
                    $("#tblFicha").find("tbody").html(html);
                }
            } else {
                alert("No hay datos");
                $("#tblFicha").find("tbody").html("");
            }


        }, error: function(e, err) {
            alert("error");
            $("#tblFicha").find("tbody").html("");
        }
    });
}

$(function() {
    $('')
});

