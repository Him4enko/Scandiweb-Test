<?php
require_once './app/products.php';
$products = new products();
$dvd = $products -> load_product('products', 'dvd');
$furniture = $products -> load_product('products', 'furniture');
$book = $products -> load_product('products', 'book');
$array = array();
$array = $_POST['check'];
$delete = $products -> products('products', $array);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product list</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="./assets/js/ajax.js"></script>
</head>


<body>
<form method="post" action="/" id="form">
    <div class="row" style="height: 15vh;">
        <div class="col d-flex d-sm-flex d-md-flex justify-content-end align-items-end align-content-end flex-wrap justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center">
            <h1>Product list</h1>
        </div>
        <div class="col d-flex d-lg-flex flex-row justify-content-end align-items-end align-content-end flex-wrap justify-content-lg-center align-items-lg-center"><button onclick="location.href = '/addproduct.php';" class="btn btn-primary" type="button" style="margin-right: 30px;">ADD</button><button class="btn btn-primary" id="delete-product-btn" type="submit" name="remove">MASS DELETE</button></div>
    </div>
    <hr>
    <div class="row" id="parent" style="height: 70vh;">
    <?php
    for($i=0; $i<count($dvd); $i++) {
        echo('
        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center" style="width: 150px;height: 170px;">
        <input class="delete-checkbox" type="checkbox" id="delete-checkbox" name="check[]" style="width: 20px;height: 20px;" value="'.$dvd[$i][0].'">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">'.$dvd[$i][1].'</h4>
                    <h4 class="card-title">'.$dvd[$i][2].'</h4>
                    <h4 class="card-title">'.$dvd[$i][3].' $</h4>
                    <h4 class="card-title">Size:'.$dvd[$i][5].'MB</h4>
                    </div>
                </div>
            </div>
        
        ');

    }
    for($i=0; $i<count($book); $i++) {
        echo('
        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center" style="width: 150px;height: 170px;">
        <input class="delete-checkbox" type="checkbox" id="delete-checkbox" name="check[]" style="width: 20px;height: 20px;" value="'.$book[$i][0].'">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">'.$book[$i][1].'</h4>
                    <h4 class="card-title">'.$book[$i][2].'</h4>
                    <h4 class="card-title">'.$book[$i][3].' $</h4>
                    <h4 class="card-title">Weight: '.$book[$i][9].'KG</h4>
                    </div>
                </div>
            </div>
        
        ');
    }
    for($i=0; $i<count($furniture); $i++) {
        echo('
        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center"  style="width: 150px;height: 170px;">
        <input class="delete-checkbox" type="checkbox" id="delete-checkbox" name="check[]" style="width: 20px;height: 20px;" value="'.$furniture[$i][0].'">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">'.$furniture[$i][1].'</h4>
                    <h4 class="card-title">'.$furniture[$i][2].'</h4>
                    <h4 class="card-title">'.$furniture[$i][3].' $</h4>
                    <h4 class="card-title">Dimensions : '.$furniture[$i][6].'x'.$furniture[$i][7].'x'.$furniture[$i][8].'</h4>
                    </div>
                </div>
            </div>
        
        ');
    }
    ?>

    </div>
    <div class="row" style="height: 15vh;">
        <div class="col">
            <h1 style="font-size: 23.88px;text-align: center;">Scandiweb Test Assignment</h1>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>