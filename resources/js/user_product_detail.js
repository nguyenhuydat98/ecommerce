$(document).ready(function () {
    $(".list-image").click(function() {
        let src = $(this).attr("src");
        $("#image-show").attr("src", src);
    });

    $('.color').click(function() {
    	$(".color").css({
    		'background': '#fff',
    		'color': "#2577fd"
    	});
    	$(this).css({
    		'background': '#2577fd',
    		'color': "#fff"
    	});
        $('.hide-quantity').css('display', 'block');

    	let url = $(this).attr("data-url");
        $.ajax({
            url : url,
            type : "GET",
            success : function (data) {
                let productDetail = JSON.parse(data);
                $('#available').text(productDetail.quantity);
            },
            error : function ($data) {
                alert('Fail');
            },
            complete : function () {
                
            }
        });
    });

    $('#add-quantity').click(function() {
        let quantity = parseInt($('#quantity').val());
        $('#quantity').val(quantity + 1);
        let available = $('#show-quantity').val();
    });

    $('#sub-quantity').click(function() {
        let quantity = parseInt($('#quantity').val());
        if (quantity > 1) {
            $('#quantity').val(quantity - 1);
        }
    });
});
