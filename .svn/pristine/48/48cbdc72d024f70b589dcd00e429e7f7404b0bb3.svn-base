$(function (e) {
    $(".avatar").click(function () {
        var padre = $(this).parents();
        var inputFile = $(padre).find("input[type=file]");
        $(inputFile).click();
    });
    $("input[type=file").change(function () {
       var image = this.files[0];
       var url = window.URL.createObjectURL(image);
      
       $("#foto").attr("src", url);

   });
});


