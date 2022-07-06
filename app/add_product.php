<?php
include_once 'products.php';
class add_product
{
    private $database;
    function __construct()
    {

        $this -> database = new database('127.0.0.1', 'o33670ws_scandi', '65%JZuMZ', 'o33670ws_scandi');
    }
    function add(
        $sku = NULL,
        $name = NULL,
        $price = NULL,
        $type = NULL,
        $size = NULL,
        $height = NULL,
        $width = NULL,
        $length = NULL,
        $weight = NULL)
    {
         $conn = $this->database->connect();
        $res = mysqli_query($conn, "SELECT * FROM products WHERE sku = ".$sku);
        $count = mysqli_num_rows($res);
        if ($count < 1){
            $sql = $conn->prepare("INSERT INTO `products` (sku, name, price, type, size, height, width, length, weight) VALUES (?,?,?,?,?,?,?,?,?)");
            $sql -> bind_param('ssisiiiii', $sku, $name, $price, $type, $size, $height, $width, $length, $weight);
            $sql -> execute();
        } else {
            echo ('<div class="alert alert-danger" role="alert">The product with this SKU already exists </div>');
        }

    }
}