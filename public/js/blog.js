$(document).ready(function() {



    $("#mesarticles a u").append("<span></span>");

    $("#mesarticles a u").hover(
        function () {
            $(this).children("span").stop(true,true).animate({"left": "95px"}, 500);


        },
        function () {
            $(this).children("span").animate({"left": "38px"}, 500);


        }
    );
});