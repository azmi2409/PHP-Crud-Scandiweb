<?php
include "includes/autoload.php";

if (isset($_POST['submit'])) {
    $type = filter_input(INPUT_POST, 'type', FILTER_DEFAULT);
    $save = new $type;
    //$data = $_POST['save'];
    $data = $_POST;
    $save->saveProduct($data);
    $home = new product;
    $home->goHome();
}

include_once "includes/product_add.html";
?>