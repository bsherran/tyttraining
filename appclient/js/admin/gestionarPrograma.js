$(function() {
    obtenerProgramas("");
    $('#txtBuscarPrograma').change(function() {
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
        success: function(r) {

            if (r.data.length > 0) {
                var html = "";
                for (var i = 0; i < r.data.length; i++) {
                    var programa = r.data[i];
                    //console.log(programa)
                    html += "<tr>";
                    html += "<td>" + programa.proNombre + "</td>";
                    html += "<td><a url='?c=Programa&a=buscarPrograma1" +programa.ficId +"'></td>";
                    html += "<td>" + programa.cantidad + "</td>";
//                    html += "<td>" + + "</td>";
                    html += "<td class='text-center'><a href='?c=Ficha&a=delete&ficCodigo=" + programa.ficId + "'><i class='fa fa-search'></i></a></td>";
                    html += "</tr>";
                    $('#tblPrograma').find('tbody').html(html);
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
