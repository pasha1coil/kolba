<?php // Основной файл загрузки
session_start();
require("connect.php");
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$position=mysqli_query($connection,"select position from employees where login='$username'")->fetch_assoc()['position'];
$date=date('y-m-d');
$time=date("h:i:s");
$_SESSION['date']=$date;
$FileDir="./upload_files/$username/$date/";
$numfiles1= count($_FILES['files1']['name']);
$_SESSION['numfiles1']=$numfiles1;
$numfiles2= count($_FILES['files2']['name']);
$_SESSION['numfiles2']=$numfiles2;
$numfiles3= count($_FILES['files3']['name']);
$_SESSION['numfiles3']=$numfiles3;

$sql_id = "SELECT COUNT(*) FROM eff_contract";
$result_id = mysqli_query($connection, $sql_id);
$row = mysqli_fetch_row($result_id);
$id_ek = $row[1];
$_SESSION['id_ek']=$id_ek;
$new_ek = "INSERT INTO eff_contract (id_ek, educator_id,all_value,checked) values ('$id_ek','$educator_id',0,0)";
$result = mysqli_query($connection, $new_ek); /*Комментарий: перепроверить загрузку в бд*/

if (!is_dir($FileDir)){
    mkdir($FileDir,0700);}

/*file_put_contents("./upload_files/$username/$date/counts.txt", " $numfiles1, $numfiles2, $numfiles3, $date, $time, $position");*/

if(isset($_POST['uploadBtn'])) {

    if ($numfiles1 > 0) {
        require_once("upload1.php"); // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
    }
    if ($numfiles2 > 0) {
        require_once("upload2.php"); // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
    }
    if ($numfiles3 > 0) {
        require_once("upload3.php"); // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
    }

    /*require_once("upload1.php"); // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
    require_once("upload2.php"); // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
    require_once ("upload3.php"); // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА*/
}

$update_values = 'UPDATE eff_contract ec
INNER JOIN (
    SELECT id_ek, SUM(value * count) AS total_value
    FROM docs
    GROUP BY id_ek
) d ON ec.id_ek = d.id_ek
SET ec.all_value = d.total_value;';

switch ($position) { // Переход на страницу
    case Null:
        echo "Error: Null in position";
        break;
    case "Prepodavatel": // Переход на страницу для преподавателей
        echo '<script type="text/javascript">
            alert("Файлы успешно загружены");
            window.location.href ="prepod.php";
        </script>';
        break;
    case "ZavKafedri": // Переход на страницу для завкафедры
        echo '<script type="text/javascript">
            alert("Файлы успешно загружены");
            window.location.href ="zavkaf.php";
        </script>';
        break;
    case "Dekan" or "Direktor": // Переход на страницу для декана или директора
        echo '<script type="text/javascript">
            alert("Файлы успешно загружены");
            window.location.href ="deka-dir.php";
        </script>';
        break;
}

