<?php

class CProducts
{
    //Функция, возвращающая массив данных из таблицы
    public function pgsql ($connect, $count){
        return pg_query($connect, "SELECT * FROM products WHERE product_id IS NOT NULL order by date_create DESC LIMIT '$count' ");
    }
}