<?php // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles3']; // количество файлов
$uploadFileDir = "./upload_files/$username/$date/3/"; // Путь загрузки файлов
/*file_put_contents("./upload_files/$username/$date/3/counts.txt", "count = $countfiles");*/
if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 1; $i < $numfiles; $i++) {
    $filename = $_FILES['files3']['name'][$i];
    /*move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . $i .' '.  $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.1' .' '.  $filename);
            break;
        case 1:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.2' .' '.  $filename);
            break;
        case 2:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.3' .' '.  $filename);
            break;
        case 3:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.1' .' '.  $filename);
            break;
        case 4:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.2' .' '.  $filename);
            break;
        case 5:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.3' .' '.  $filename);
            break;
        case 6:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.3' .' '.  $filename);
            break;
        case 7:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.4' .' '.  $filename);
            break;
        case 8:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.1' .' '.  $filename);
            break;
        case 9:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.2' .' '.  $filename);
            break;
        case 10:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.3' .' '.  $filename);
            break;
        case 11:
            move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.6' .' '.  $filename);
            break;
    }

}

echo '<script type="text/javascript"> // Переход на главный файл
window.location.href ="upload.php";
</script>';




