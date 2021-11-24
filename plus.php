<?php
include 'connect.php';
$connection = connect();
if(isset($_POST['do_plus'])) {
    $elem = pg_fetch_assoc(pg_query($connection, "SELECT * FROM products WHERE product_id = '$_POST[id]'"));
    $quantity = $elem['product_quantity'] + 1 ;
    $select_data = pg_update($connection,  'products',
        array('product_quantity' => $quantity),
        array('product_id' => $_POST['id']));
    echo "success";
    exit();
}