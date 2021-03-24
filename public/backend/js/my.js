function addInputFile() {
    let html = '<input type="file" name="image[]" class="form-control col-md-6"/>'
    html += '<button class="btn btn-danger" type="button">-</button>'
    document.getElementById('list-input').innerHTML += html
}
