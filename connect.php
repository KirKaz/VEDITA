<?php
function connect()
{
    $servername = "localhost";
    $username = "postgres";
    $password = "123";
    $dbname = "postgres";
    try {
        $conn = pg_connect('host=' . $servername . ' user=' . $username .
            ' password=' . $password . ' dbname=' . $dbname);
        if ($conn != false)
            return $conn;
        else echo "error";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}