$(function () {
    obtenerAprendices("");
    $('#txtBuscarAprendiz').keyup(function () {
        var keyword = $(this).val();
        obtenerAprendices(keyword);
    });
});

function obtenerAprendices(keyword) {

    $.ajax({
        url: '?c=Aprendiz&a=buscarAprendiz',
        data: 'keyword=' + keyword,
        method: 'post',
        dataType: 'json',
        success: function (data) {

            var html = "";
            for (var i = 0; i < data.data.length; i++) {
                var persona = data.data[i];
                html += "<tr>";
                html += "<td>" + persona.perIdentificacion + "</td>";
                html += "<td>" + persona.perNombre + "</td>";
                html += "<td>" + persona.perApellido + "</td>";
                html += "<td>" + persona.perCorreo + "</td>";
                html += "<td>" + persona.perTelefono + "</td>";
                html += "</tr>";
            }
            $("#tblAprendiz").find("tbody").html(html);
        }, errorApr: function (e, err) {
            console.error(e);
        }
    });
}

