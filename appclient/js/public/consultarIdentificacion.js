$(function () {
    $('#btnBuscarAprendiz').click(function () {
        var identificacion = $("#txtIdentificacion").val();
        $.ajax({
            url: '?c=Aprendiz&a=consultarIdentificacion',
            data: 'aprendiz[perIdentificacion]=' + identificacion,
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                $('#alertConsulta').slideDown();
                //no es el metodo mas profesional pero sirve.
                if (data.data.perIdentificacion == identificacion) {
                    if ($('#alertConsulta').hasClass("alert-warning")) {
                        $('#alertConsulta').removeClass("alert-warning");
                    }
                    $('#alertConsulta').addClass("alert-success");
                    $('#alertConsulta').html(data.msg);
                } else {
                    if ($('#alertConsulta').hasClass("alert-success")) {
                        $('#alertConsulta').removeClass("alert-success");
                    }
                    $('#alertConsulta').addClass("alert-warning");
                    $('#alertConsulta').html("<i class='fa fa-close'></i> El aprendiz no encontrado");
                }
                
                setTimeout(function(){
                    $('#alertConsulta').hide("slow");
                },3000);
            }
        });
    });
});