        
        //event fly to cart

        $('.add_to_cart_button').click(function(event) {
            event.preventDefault();

            var parent = $(this).parents('.single-shop-product');
            var source = parent.find('img').attr('src');
            var cart = $(document).find('.shopping-item');
            var parTop = parent.offset().top;
            var parLeft = parent.offset().left;

            $('<img />',{
               src : source, 
               class:'img-product-fly'
            }).appendTo('body').css({
                top: parseInt(parTop),
                left: parseInt(parLeft) + parseInt(parent.width()) - 80
            });
            
            setTimeout(function(){
                $(document).find('.img-product-fly').css({
                    top: parseInt(cart.offset().top),
                    left: parseInt(cart.offset().left)
                });
                
                setTimeout(function(){
                    $(document).find('.img-product-fly').remove();
                },1000);
                
            },5);

        });

        