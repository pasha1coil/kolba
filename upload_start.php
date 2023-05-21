<?php // Начало загрузки файлов
session_start();
require("connect.php");
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$position=mysqli_query($connection,"select position from employees where login='$username'")->fetch_assoc()['position'];
$date=date('y-m-d');
$time=date("h:i:s");
$_SESSION['date']=$date;
$FileDir="./upload_files/$username/$date/";
$numfiles1 = count($_FILES['files1']['tmp_name']);
$_SESSION['numfiles1']=$numfiles1;
$numfiles2 = count($_FILES['files2']['tmp_name']);
$_SESSION['numfiles2']=$numfiles2;
$numfiles3 = count($_FILES['files3']['tmp_name']);
$_SESSION['numfiles3']=$numfiles3;

$new_ek = "INSERT INTO eff_contract (educator_id,all_value,checked) values ('$educator_id',0,0)";
$result = mysqli_query($connection, $new_ek);
if (!$result) {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}
$sql_id = "SELECT id_ek FROM eff_contract WHERE educator_id = '$educator_id' ORDER BY id_ek DESC LIMIT 1;";
$result_id = mysqli_query($connection, $sql_id);
$id_ek = mysqli_fetch_row($result_id);
$_SESSION['id_ek']=$id_ek;

if (!is_dir($FileDir)){
    mkdir($FileDir,0700);}



if(isset($_POST['uploadBtn'])) {

    if (!empty($_FILES['files1']['name'])) {
        require_once("upload1.php"); // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
    }
    if (!empty($_FILES['files2']['name'])) {
        require_once("upload2.php"); // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
    }
    if (!empty($_FILES['files3']['name'])) {
        require_once("upload3.php"); // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
    }
}

