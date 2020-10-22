$(document).ready(function () {
    $(".list-image").click(function() {
        let src = $(this).attr("src");
        $("#image-show").attr("src", src);
    });
});
