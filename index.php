<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .title{
            color: green;
        }
    </style>

</head>
<body>
<?php
include 'connect.php';

$connection = connect();
$lim = $_POST;
if(empty($lim))
    $lim['lim'] = null;
//Форма запроса количества выводимых товаров
echo <<<HTML
<form action="" method="post">
Введите количество выводимых товаров
<input type="text" name="lim" value="$lim[lim]">
<input type="submit" value="вывести">
</form>
HTML;


//Количество выведенных на страницу товаров
if (isset($lim['lim'])){
    echo '<p class="title"><b>'."Список из $lim[lim] последних товаров".'</b></p><br>';

    require 'CProducts.php';
    $tab = new CProducts();
    $list = $tab ->pgsql($connection, $lim['lim']);



    //Создание HTML таблицы товаров
    echo <<<HTML
    <table>
    <tr>
    <th>Товар</th>
    <th>Цена</th>
    <th>Описание</th>
    <th>Количество</th>
   </tr>
HTML;
    while ($product = pg_fetch_assoc($list)){
        echo
            '<tr id = '.$product['product_id'] .'>'.
            '<td><b>'.$product['product_name'] . '</b></td>'.
            '<td>' . $product['product_price'] . '</td>'.
            '<td>' . $product['product_article'] . '</td>'.
            '<td>
                <form>
                    <button type="button"  class="minus" name='.$product['product_id'] .'>-</button> 
                        <input type="text" id='.'input'.$product['product_id'].' value='.$product['product_quantity'].'>
                    <button type="button"  class="plus" name='.$product['product_id'] .'>+</button>
                </form>
            </td>'.
            '<td><button id='.$product['id'].'>скрыть</button></td>'.
            '</tr>';
    }
    echo '</table>';
}
echo <<<HTML
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="plus.js"></script>
<script type="text/javascript" src="minus.js"></script>
HTML;


?>
</body>
</html>

