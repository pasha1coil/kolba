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



if (!is_dir($FileDir)){
    mkdir($FileDir,0700);}

if (isset($_POST['data'])) {

    $arr = $_POST['data'];
   $arr1 = array_slice($arr,0,27);
    foreach ($arr1 as $key => $value) {
        if ($value !== '') {
            $arr1[$key] = intval($value);
        }
    }
    $_SESSION['arr1'] = $arr1;


    $arr2 = array_slice($arr,27,40);
    foreach ($arr2 as $key => $value) {
        if ($value !== '') {
            $arr2[$key] = intval($value);
        }
    }
    $_SESSION['arr2'] = $arr2;


    $arr3 = array_slice($arr,67,12);
    foreach ($arr3 as $key => $value) {
        if ($value !== '') {
            $arr3[$key] = intval($value);
        }
    }
    $_SESSION['arr3'] = $arr3;
}

if(isset($_POST['uploadBtn'])) {

    $new_ek = "INSERT INTO eff_contract (educator_id,all_value,checked) values ('$educator_id',0,0)";
    $result = mysqli_query($connection, $new_ek);
    if (!$result) {
        echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
    }

    $sql_id = "SELECT id_ek FROM eff_contract WHERE educator_id = '$educator_id' ORDER BY id_ek DESC LIMIT 1;";
    $result_id = mysqli_query($connection, $sql_id);
    $id_ek = mysqli_fetch_row($result_id);
    $_SESSION['id_ek']=$id_ek;

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
    if ($uploadedFiles1>0   ) {
        require_once("upload1.php"); // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
    }
    if ($uploadedFiles2>0) {
        require_once("upload2.php"); // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
    }
    if ($uploadedFiles3>0) {
        require_once("upload3.php"); // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
    } else {
        switch ($position) { // Переход на страницу
            case Null:
                echo "Error: Null in position";
                break;
            case "Prepodavatel": // Переход на страницу для преподавателей
                echo '<script type="text/javascript">
            alert("Файлы не обнаружены. Загрузите файл");
            window.location.href ="prepod.php";
        </script>';
                break;
            case "ZavKafedri": // Переход на страницу для завкафедры
                echo '<script type="text/javascript">
            alert("Файлы не обнаружены. Загрузите файл");
            window.location.href ="zavkaf.php";
        </script>';
                break;
            case "Dekan" or "Direktor": // Переход на страницу для декана или директора
                echo '<script type="text/javascript">
            alert("Файлы не обнаружены. Загрузите файл");
            window.location.href ="deka-dir.php";
        </script>';
                break;
        }
    }
}

