<?php // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles1']; // Добавить это в upload как проверку на существование
$uploadFileDir = "./upload_files/$username/$date/1/"; // Путь загрузки файлов
/*file_put_contents("./upload_files/$username/$date/1/counts.txt", "count = $countfiles");*/


$id_ek=$_SESSION['id_ek'];

if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files1']['name'][$i];
    /*move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . $i .' '. $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.1' . ' ' . $filename);
            $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value) values ('$id_ek','$educator_id',100, 1, 1)";
            $result = mysqli_query($connection, $query); /*Комментарий: перепроверить загрузку в бд*/
            break;
        case 1:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.2' . ' ' . $filename);
            break;
        case 2:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.3.1' . ' ' . $filename);
            break;
        case 3:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.3.2' . ' ' . $filename);
            break;
        case 4:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.2' . ' ' . $filename);
            break;
        case 5:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.3' . ' ' . $filename);
            break;
        case 6:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.5' . ' ' . $filename);
            break;
        case 7:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.6' . ' ' . $filename);
            break;
        case 8:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.5.1' . ' ' . $filename);
            break;
        case 9:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.5.2' . ' ' . $filename);
            break;
        case 10:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.6' . ' ' . $filename);
            break;
        case 11:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.1' . ' ' . $filename);
            break;
        case 12:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.2' . ' ' . $filename);
            break;
        case 13:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.3' . ' ' . $filename);
            break;
        case 14:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.8' . ' ' . $filename);
            break;
        case 15:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.1' . ' ' . $filename);
            break;
        case 16:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.2' . ' ' . $filename);
            break;
        case 17:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.3' . ' ' . $filename);
            break;
        case 18:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.10' . ' ' . $filename);
            break;
        case 19:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.11' . ' ' . $filename);
            break;
        case 20:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.12' . ' ' . $filename);
            break;
        case 21:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.13.1' . ' ' . $filename);
            break;
        case 22:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.13.2' . ' ' . $filename);
            break;
        case 23:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.14' . ' ' . $filename);
            break;
        case 24:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.15.1' . ' ' . $filename);
            break;
        case 25:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.15.2' . ' ' . $filename);
            break;
        case 26:
            move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.16' . ' ' . $filename);
            break;
    }
}

echo '<script type="text/javascript"> // Переход на главный файл
window.location.href ="upload.php";
</script>';




