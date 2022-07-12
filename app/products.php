<?php
include 'a_products.php';
include_once 'database.php';
class products extends a_products
{
    function __construct()
    {
        $this -> database = new database('127.0.0.1', 'root', '', 'scandiweb');

    }

    public function load_product($table, $type)
    {
        $conn = $this -> database->connect();
        $sql = "SELECT * FROM $table WHERE type = \"".$type."\"";
        $products = mysqli_query($conn, $sql);
        return mysqli_fetch_all($products);

    }

    function products($table ,$arr)
    {
        $conn = $this -> database -> connect();
        $d = '';
        $data = array();
        foreach ($arr as $key){
            array_push($data, $key);
        }
        $d = implode(',', $data);
        foreach($data as $key){
            $sql = "DELETE FROM $table WHERE id=".$key;
            mysqli_query($conn, $sql);
        }

    }
}
