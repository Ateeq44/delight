$(document).ready(function(){

    $('.addTocartBtn').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('.prod_data').find('.prod_id').val();
        var product_qty = $(this).closest('.prod_data').find('.qty-input').val();
        alert
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "GET",
            url: "{{ url('add-to-cart')}}"+"/",
            data: {
                'product_id' : product_id,
                'product_qty' : product_qty,
            },
            success: function (response){
                swal(response.status);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // alert(errorThrown)
                if(errorThrown == 'Unauthorized'){
                    swal('Login to continue')
                }
            }

        });

    });

    $('.addToWishlist').click(function (e) {
        // e.preventDefault();
        var product_id= $(this).val();
        console.log(product_id);
        $.ajax({
            method : "get",
            url : "{{url('/add-to-wishlist')}}",
            data :{
                'prod_id' : product_id,
            },
            success: function (response){
                swal(response.status);
            }
        })
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
