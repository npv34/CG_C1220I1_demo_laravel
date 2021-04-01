function addInputFile() {
    let html = '<input type="file" name="image[]" class="form-control col-md-6"/>'
    html += '<button class="btn btn-danger" type="button">-</button>'
    document.getElementById('list-input').innerHTML += html
}

$(document).ready(function (){
    $('.user-list').hover(function (){
        $(this).css('background-color', 'red')
    }, function () {
        $(this).css('background-color', 'white')
    });

    $('.quantity_product').on('change', function (){
        alert(1)
    })

})
