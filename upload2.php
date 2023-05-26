<?php // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles2']; // количество файлов
$uploadFileDir = "./upload_files/$username/$date/2/"; // Путь загрузки файлов
/*file_put_contents("./upload_files/$username/$date/2/counts.txt", "count = $countfiles");*/
if (!is_dir($uploadFileDir) ){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files2']['name'][$i];
    /*move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . $i .' '.  $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.1.1' .' '.  $filename);
            break;
        case 1:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.1.2' .' '.  $filename);
            break;
        case 2:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.2.1' .' '.  $filename);
            break;
        case 3:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.3.1' .' '.  $filename);
            break;
        case 4:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.3.2' .' '.  $filename);
            break;
        case 5:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.1' .' '.  $filename);
            break;
        case 6:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.2' .' '.  $filename);
            break;
        case 7:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.3' .' '.  $filename);
            break;
        case 8:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.1' .' '.  $filename);
            break;
        case 9:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.2' .' '.  $filename);
            break;
        case 10:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.3' .' '.  $filename);
            break;
        case 11:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.1' .' '.  $filename);
            break;
        case 12:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.2' .' '.  $filename);
            break;
        case 13:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.3' .' '.  $filename);
            break;
        case 14:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.1' .' '.  $filename);
            break;
        case 15:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.2' .' '.  $filename);
            break;
        case 16:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.3' .' '.  $filename);
            break;
        case 17:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.8' .' '.  $filename);
            break;
        case 18:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.9' .' '.  $filename);
            break;
        case 19:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.1' .' '.  $filename);
            break;
        case 20:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.2' .' '.  $filename);
            break;
        case 21:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.3' .' '.  $filename);
            break;
        case 22:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.1' .' '.  $filename);
            break;
        case 23:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.2' .' '.  $filename);
            break;
        case 24:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.3' .' '.  $filename);
            break;
        case 25:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.12' .' '.  $filename);
            break;
        case 26:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.13' .' '.  $filename);
            break;
        case 27:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.14.1' .' '.  $filename);
            break;
        case 28:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.14.2' .' '.  $filename);
            break;
        case 29:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.15.1' .' '.  $filename);
            break;
        case 30:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.15.2' .' '.  $filename);
            break;
        case 31:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.16' .' '.  $filename);
            break;
        case 32:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.1' .' '.  $filename);
            break;
        case 33:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.2' .' '.  $filename);
            break;
        case 34:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.3' .' '.  $filename);
            break;
        case 35:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.18' .' '.  $filename);
            break;
        case 36:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.19' .' '.  $filename);
            break;
        case 37:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.20' .' '.  $filename);
            break;
        case 38:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.21.1' .' '.  $filename);
            break;
        case 39:
            move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.21.2' .' '.  $filename);
            break;
    }
}

echo '<script type="text/javascript"> // Переход на главный файл
window.location.href ="upload_end.php";
</script>';




