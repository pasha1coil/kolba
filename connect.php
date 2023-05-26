<?php
$hostname = 'kolba-main'; // Тут заменить данные на нужные
$server_login = 'root'; // Тут заменить данные на нужные
$server_password = ''; // Тут заменить данные на нужные
$database = 'server2'; // Тут заменить данные на нужные
$connection =mysqli_connect($hostname,$server_login,$server_password, $database);
if (!$connection) {
    die("Failed;");
}
?>

