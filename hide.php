<?php
include 'connect.php';
$connection = connect();
if(isset($_POST['do_hide'])) {
    $select_data = pg_update($connection,  'products',
    array('product_id' =>  NULL),
    array('product_id' => $_POST['id']));
    echo "success";
    exit();
}

