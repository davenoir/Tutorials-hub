$(function() {

    //Navigation highlighting
    $(".pages li a").click(function() {
        var id = $(this).attr("id");

        $('#' + id).siblings().find(".active").removeClass("active");
        $('#' + id).addClass("active");
        localStorage.setItem("selectedolditem", id);
    });

    var selectedolditem = localStorage.getItem('selectedolditem');

    if (selectedolditem != null) {
        $('#' + selectedolditem).siblings().find(".active").removeClass("active");
        $('#' + selectedolditem).addClass("active");
    }

});