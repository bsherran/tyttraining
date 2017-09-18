$(function () {
    obtenerProgramas("");
    $('#txtBuscarPrograma').keyup(function () {
        var keyword = $(this).val();
        obtenerProgramas(keyword);
    });
});

function obtenerProgramas(keyword) {
    $.ajax({
        url: '?c=Programa&a=buscarPrograma',
        data: 'keyword=' + keyword,
        method: 'post',
        dataType: 'json',
        success: function (data) {
            var html = "";
            for (var i = 0; i < data.data.length; i++) {
                var programa = data.data[i];
                html += "<tr>";
//                html += "<td>" + programa.proId + "</td>";                
                html += "<td>" + programa.proNombre + "</td>";
//                html += "<td class='text-center'><a href='?c=Ficha&a=delete&ficCodigo="+programa.ficId+"'><i class='fa fa-pencil-square'></i></a></td>";
//                html += "<td class='text-center'><a href='?c=Ficha&a=delete&ficCodigo="+programa.ficCodigo +"'><i class='fa fa-trash'></i></a></td>";
                html += "</tr>";
            }
            $('#tblPrograma').find('tbody').html(html);
        }, error: function (e, err) {
            alert("err");
        }
    });
}


