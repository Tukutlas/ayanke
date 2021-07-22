var total_image=1;
function add_more_images() {
    total_image++;
    var html='<div class="col-lg-6" style="margin-top:20px;" id="add_image_box_'+total_image+'"><label for="image" class="form-control-label">Image</label><input type="file" name="product_images[]" class="form-control" required><button type="button" class="btn btn-lg btn-danger btn-block" onClick = remove_image("'+total_image+'")><span id="payment-button-amount">Remove</span></button></div>';
    jQuery('#image_box').append(html);
}


function remove_image(id) {
    jQuery('#add_image_box_'+id).remove();
}