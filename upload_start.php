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

$a=count($_FILES['files1']['name']).' '.count($_FILES['files2']['name']).' '.count($_FILES['files3']['name']);
file_put_contents($FileDir.'arr.txt',$a);

if(isset($_POST['uploadBtn'])) {

    $file1Count = count($_FILES['files1']['name']);
    $uploadedFiles1 = 0;
    $file2Count = count($_FILES['files2']['name']);
    $uploadedFiles2 = 0;
    $file3Count = count($_FILES['files3']['name']);
    $uploadedFiles3 = 0;

    for ($i = 0; $i < $file1Count; $i++) {
        $fileName = $_FILES['files1']['name'][$i];

        if ($_FILES['files1']['error'][$i] == UPLOAD_ERR_OK && !empty($fileName)) {
            // Файл загружен и не пустой
            $uploadedFiles1++;
        }
    }
    for ($i = 0; $i < $file2Count; $i++) {
        $fileName = $_FILES['files2']['name'][$i];

        if ($_FILES['files2']['error'][$i] == UPLOAD_ERR_OK && !empty($fileName)) {
            // Файл загружен и не пустой
            $uploadedFiles2++;
        }
    }
    for ($i = 0; $i < $file3Count; $i++) {
        $fileName = $_FILES['files3']['name'][$i];

        if ($_FILES['files3']['error'][$i] == UPLOAD_ERR_OK && !empty($fileName)) {
            // Файл загружен и не пустой
            $uploadedFiles3++;
        }
    }
    if ($uploadedFiles1>0) {
        require_once("upload1.php"); // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
    }
    if ($uploadedFiles2>0) {
        require_once("upload2.php"); // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
    }
    if ($uploadedFiles3>0) {
        require_once("upload3.php"); // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
    }
}

