
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


$(".adm-nav").on("click", function(e){
    //alert();
    e.preventDefault();
    $type = $(this).data('type');
    
    switch($type){
        case 'approval':
            $url = 'data/servicecenter.php';
            break;
        case 'view':
            //alert();
            $url = 'data/viewservicecenter.php';
            break;
        case 'addbrand':
            //alert();
            $url = '../adminbrand.php';
            break; 
            case 'viewbrand':
            //alert();
            $url = 'data/viewbrand.php';
           // alert();
            break;  
            case 'viewuser':
            $url='data/admindata.php';
            break;           

    }
   
    $.ajax({
        url: $url,
        method:'post',
        data:{'type':$type},
        success:function(data){
            $("#pageData").html(data);
        }
    });
}); 


$("body").on("click", ".adm-click", function(e){
   // e.preventDefault();
    $type = $(this).data('type');
    $id=$(this).data('id');
    //alert(this.$type);
    $.ajax({

        url: 'data/admindata.php',
        method:'post',
        data:{'type':$type,'id':$id},
        success:function(data){
            console.log(data);
            
          //  $("#pageData").html(data);
          if(data==1){
              $("#servControl"+$id).html('approved!');
          }
          if(data==2){
            $("#servControl"+$id).html('rejected!');
        }
        }
    });
});

});


$(".cntr-nav").on("click", function(e){
    //alert();
    e.preventDefault();
    $type = $(this).data('type');
    
    switch($type){
        case 'viewschemes':
            $url = 'data/centerdata.php';
            break;
                  

    }
   
    $.ajax({
        url: $url,
        method:'post',
        data:{'type':$type},
        success:function(data){
            $("#pageData").html(data);
        }
    });
}); 

$(".user-nav").on("click", function(e){
    //alert();
    e.preventDefault();
    $type = $(this).data('type');
    
    switch($type){
        case 'appointment':
            $url = 'data/usercenterview.php';
            break;
                  

    }
   
    $.ajax({
        url: $url,
        method:'post',
        data:{'type':$type},
        success:function(data){
            $("#pageData").html(data);
        }
    });
}); 