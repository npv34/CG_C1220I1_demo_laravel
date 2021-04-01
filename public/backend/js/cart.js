$(document).ready(function (){
    $('.quantity_product').on('change', function (){
        let productQty = $(this).val();
        let idProduct = $(this).attr('data-id');

        let origin = location.origin;
        //loi goi ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/cart/update-cart',
            method: 'POST',
            data: {
                productQty: productQty,
                idProduct: idProduct
            },
            success: function (res) {
                console.log(res)
            }
        })
    })

})
