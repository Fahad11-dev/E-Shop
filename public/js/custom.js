$(document).ready(function(){
    $("#Home").hover(function (){
        $(this).css('cursor','pointer');
        $(this).click(function(){
            window.location.replace('/');
        });
    });

    $(".cart").click(function(e){
        e.preventDefault();
        var id = $(this).attr('data');
        var id;
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


    //Quantity Buttons
    
    $('.increment-btn').click(function(e) {
        e.preventDefault();
        var id  = $(this).attr('data');
        var inc_val = $('.qty'+id).val();
        var value = parseInt(inc_val, 10);
        value = isNaN(value) ? 0 : value;
        if (value <= 10) {
            value++
            $('.qty'+id).val(value)
        }
    });
   
    $('.decrement-btn').click(function(e) {
        e.preventDefault();
        var id  = $(this).attr('data');
        var inc_val = $('.qty'+id).val();
        var value = parseInt(inc_val, 10);
        value = isNaN(value) ? 0 : value;
        if (value >= 1) {
            value--
            $('.qty'+id).val(value)
        }
    });
    
  

        
    $(".setvalue").click(function(){
        var id  = $(this).attr('data');
        var quantity = $('.qty'+id).val();
        var unit_price = $(".price"+id).attr('data');
        var total = unit_price * quantity;
        $.ajax({
                url : "updateCart/",
                method : "POST",
                data : {
                    id : id,
                    quantity : quantity,
                    total : total,
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:  function (response) {
                    $(".total"+id).text('$'+response.result);
                    console.log(response.result);
                    },
                    });
    });


    $(".checkout_btn").click(function(){
        var cart_id = $("#cart_id").val();
        for(let i = 0; i < cart_id.length ; i++){  
            console.log(cart_id);
        var status = 'pending';
        $.ajax({
            url : "/getOrder",
            method : "POST",
            data : {
                cart_id : cart_id ,
                status : status
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:  function (response) {
                window.location.replace('/checkout');
                console.log(response.result);
                },
            });
        }
    }); 
});
