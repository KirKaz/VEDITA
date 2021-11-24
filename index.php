<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<?php
include 'connect.php';

$connection = connect();
$lim = $_POST;
//Форма запроса количества выводимых товаров
echo <<<HTML
<form action="" method="post">
Введите количество выводимых товаров
<input type="text" name="lim">
<input type="submit" value="вывести">
</form>
HTML;

//Функция, возвращающая массив данных из таблицы
function pgsql ($connect, $tab){
    return pg_query($connect, "SELECT * FROM products WHERE product_id IS NOT NULL order by date_create DESC LIMIT '$tab[lim]' ");
}

//Количество выведенных на страницу товаров
if (isset($lim['lim'])){
    echo "Список $lim[lim] последних товаров".'<br>';
    $list = pgsql($connection, $lim);



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
        $counter = $product['product_quantity'];
        echo
            '<tr id = '.$product['product_id'] .'>'.
            '<td><b>'.$product['product_name'] . '</b></td>'.
            '<td>' . $product['product_price'] . '</td>'.
            '<td>' . $product['product_article'] . '</td>'.
            '<td>
                <form method="post">
                    <button type="button" class="minus" name='.$product['product_id'] .'>-</button> 
                        <input type="text" value='.$counter.'>
                    <button type="button" class="plus" name='.$product['product_id'] .'>+</button>
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

