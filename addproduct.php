<?php
require_once './app/add_product.php';
$product = new add_product();
if(isset($_POST['sku'])){
    $product->add($_POST['sku'],$_POST['name'],$_POST['price'],$_POST['type'], $_POST['size'],$_POST['height'],$_POST['width'], $_POST['length'],$_POST['weight']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product list Add</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>

<body>
<script>
    $(document).ready(function(){
        $('select').change(function(e){
            switch ($(this).val()){
                case 'book':
                    $('#dvd, #book, #furniture').remove();
                    $('#parent').append('<div class="d-flex book" id="book" style="margin-top: 20px;"><p style="margin-left: 22px;">Weight( KG)</p><input class="form-control" name="weight" type="number" id="weight" required placeholder="Specify the weight of the product in KG." style="width: 20vw;margin: 0px;margin-left: 39px;"></div>');
                    break;
                case 'dvd':
                    $('#dvd, #book, #furniture').remove();
                    $('#parent').append('<div class="d-flex dvd" id="dvd" style="margin-top: 20px;"><p style="margin-left: 22px;">Size (MB)</p><input id="size" name="size" required placeholder="Specify the disk size in MB" class="form-control" type="number" style="width: 20vw;margin: 0px;margin-left: 39px;" /></div>');
                    break;
                case 'furniture':
                    $('#dvd, #book, #furniture').remove();
                    $('#parent').append('<div class="d-grid furniture" id="furniture" style="margin-top: 20px;"><p style="margin-left: 22px;">Height (CM)</p><input class="form-control" required placeholder="Specify the height in CM" name="height" type="number" id="height" style="width: 20vw;margin: 0px;margin-left: 39px;"><p style="margin-left: 22px;">Width (CM)</p><input class="form-control" required placeholder="Specify the width in CM" name="width" type="number" id="width" style="width: 20vw;margin: 0px;margin-left: 39px;"><p style="margin-left: 22px;">Length (CM)</p><input class="form-control" required placeholder="Specify the length in CM" name="length" type="number" id="length" style="width: 20vw;margin: 0px;margin-left: 39px;"></div>');
                    break;
            }
        });

        $('#form').on('submit', function(e) {
            e.preventDefault();
            $.post('./addproduct.php', $(this).serialize(), function (data) {

            }).error(function() {
                // This is executed when the call to mail.php failed.
            });

        });
    });

</script>
<form method="post" id="product_form">
    <div class="row" style="height: 15vh;">
        <div class="col d-flex d-sm-flex d-md-flex justify-content-end align-items-end align-content-end flex-wrap justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center">
            <h1>Product list</h1>
        </div>
        <div class="col d-flex d-lg-flex flex-row justify-content-end align-items-end align-content-end flex-wrap justify-content-lg-center align-items-lg-center"><button class="btn btn-primary" type="submit" style="margin-right: 30px;">Save</button><button class="btn btn-primary" onclick="location.href = '../'"  type="button">Cancle</button></div>
    </div>
    <hr>
    <div class="row d-lg-flex justify-content-lg-center" style="height: 70vh;">
        <div class="col d-flex d-lg-flex flex-column justify-content-lg-start align-items-lg-start" id="parent" style="margin: 6px;padding: 0px;">
            <div class="d-flex justify-content-sm-start align-items-sm-center justify-content-md-start justify-content-lg-center align-items-lg-center" style="margin-top: 5px;">
                <p style="margin-left: 22px;">SKU</p><input class="form-control" name="sku" required placeholder="Please, enter SKU for this products" type="text" id="sku" style="width: 20vw;margin: 0px;margin-left: 53px;">
            </div>
            <div class="d-flex" style="margin-top: 20px;">
                <p style="margin-left: 22px;">Name</p><input class="form-control" name="name" required placeholder="Please, enter name of this product" type="text" id="name" style="width: 20vw;margin: 0px;margin-left: 39px;">
            </div>
            <div class="d-flex" style="margin-top: 20px;">
                <p style="margin-left: 22px;">Price ($)</p><input class="form-control" name="price" required placeholder="Please, enter price for this product" type="number" id="price" style="width: 20vw;margin: 0px;margin-left: 24px;">
            </div>
            <div><select class="form-select" id="productType" style="margin-left: 55px;margin-top: 53px;" name="type" required>
                    <optgroup label="Select Category">
                        <option value="" selected="">Select Category</option>
                        <option value="dvd">DVD</option>
                        <option value="furniture">Furniture</option>
                        <option value="book">Book</option>
                    </optgroup>
                </select></div>
        </div>
    </div>
    <hr>
    <div class="row" style="height: 15vh;">
        <div class="col">
            <h1 style="font-size: 23.88px;text-align: center;">Scandiweb Test Assignment</h1>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
