<?php
include_once 'database.php';
class products
{
    function __construct()
    {
        $this -> database = new database('127.0.0.1', 'o33670ws_scandi', '65%JZuMZ', 'o33670ws_scandi');

    }

    public function load_product($table, $type)
    {
        $conn = $this -> database->connect();
        $sql = "SELECT * FROM $table WHERE type = \"".$type."\"";
        $products = mysqli_query($conn, $sql);
        return mysqli_fetch_all($products);

    }

    function delete_product($table ,$arr)
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
