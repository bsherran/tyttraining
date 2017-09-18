$(function () {
    $("#select-pre").on("change", function () {
        var html = "";
        if ($(this).val() === "Unica") {
            html = "<table>";
            for (var i = 0; i <= 3; i++) {
                html += "<tr>";
                html += "<td width='100'><label>Opcion " + (i+1) + "</label></td>";
                html += "<td width='400'><input class='form-control' type='text' name='opcion["+i+"]' required /></td>";
                html += "<td><input class='form-control' type='radio' name='esRespuesta' value='"+i+"' /></td>";
                html += "</tr>";
            }
            html += "</table>";
        } else if ($(this).val() === "Multiple") {
            html = "<table>";
            for (var i = 0; i <= 3; i++) {
                html += "<tr>";
                html += "<td width='100'><label>Opcion " + (i+1) + "</label></td>";
                html += "<td width='400'><input class='form-control' type='text' name='opcion["+i+"]' required /></td>";
                html += "<td><input class='form-control' type='checkbox' name='esRespuesta["+i+"]'  /></td>";
                html += "</tr>";
            }
            html += "</table>";
        } else if ($(this).val() === "Logica") {
            html = "<table>";
            html += "<tr>";
            html += "<td width='400'><label>No</label><input class='form-control' type='hidden' name='opcion[0]' value='No' /></td>";
            html += "<td><input class='form-control' type='radio' name='esRespuesta' value='0' /></td>";
            html += "</tr>";
            html += "<tr>";
            html += "<td width='400'><label>Si</label><input class='form-control' type='hidden' name='opcion[1]' value='Si' /></td>";
            html += "<td><input class='form-control' type='radio' name='esRespuesta' value='1' /></td>";
            html += "</tr>";
            html += "</table>";
        }
        $("#contenedor-opciones").html(html);
    });
});