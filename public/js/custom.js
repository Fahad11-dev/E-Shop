$(document).ready(function(){
    $("#Home").hover(function (){
        $(this).css('cursor','pointer');
        $(this).click(function(){
            window.location.replace('/');
        });
    });

    $("#cart").click(function(e){
        e.preventDefault();
        var id = $(this).attr('data'); 
        $.ajax({
            url : "AddCart/",
            method : "POST",
            data : {
                id : id,
            },
            headers: 
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            ,
            success:  function (response) {
                window.location.replace('/cart');
            },              
        });
    });



    $(".input-number").change(function(e){
       e.preventDefault();
       var quantity = $(this).val();
       var id = $("#cart_id").val();
       var unit_price = $(".price").attr('data');
       var total = unit_price * quantity;
        
       $.ajax({
        url : "updateCart/",
        method : "POST",
        data : {
            id : id,
            quantity : quantity,
            total : total,
        },
        headers: 
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        ,
        success:  function (response) {
            $("#total").text('$'+response.result);
            console.log(response.result);
            
        },              
    });
    });
});
