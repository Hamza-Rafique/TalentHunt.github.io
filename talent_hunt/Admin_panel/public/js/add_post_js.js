$(document).ready(function () {
$("#rate").hide();

})

function getValue(values) {

    var value_menu=values;

    $.ajax({
        url:'usman.php',
        type:'POST',
        data:{cat_value:1,value_menu:value_menu},
        success:function (result) {
            $("#get_data").html(result);
        }
    })
}