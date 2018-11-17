
$(document).ready(function(){
// Animations initialization
new WOW().init();
$var = 123;


// $("#login").on("submit", function(e){
//     e.preventDefault();
//     console.log($(this).serialize());
// });


$("#brand").on("change", function(){
// alert();
$brand = $(this).val();
$.ajax({
    url:'data/model.php',
    method:'post',
    data:{'brand':$brand},
    success:function(data){
        $("#model").html(data);
    }
});
})

$("#model").on("change", function(){
    //alert();
    $model = $(this).val();
    $.ajax({
        url:'data/variant.php',
        method:'post',
        data:{'model':$model},
        success:function(data){
            $("#variant").html(data);
        }
    });
})

$("#variant").on("change", function(){
    //alert();
    $variant = $(this).val();
    $.ajax({
        url:'data/fuel.php',
        method:'post',
        data:{'variant':$variant},
        success:function(data){
            $("#fuel").html(data);
        }
    });
})

});