<?php // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles3']; // количество файлов
$uploadFileDir = "./upload_files/$username/$date/3/"; // Путь загрузки файлов
$id_ek = intval($_SESSION['id_ek'][0]);

if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files3']['name'][$i];
    /*move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . $i .' '.  $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',300, 1, 2,'3.1.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',301, 1, 2.5,'3.1.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',302, 1, 3,'3.1.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',303, 1, 2,'3.2.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',304, 1, 3,'3.2.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',305, 1, 4,'3.2.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',306, 1, 2,'3.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.4' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',307, 1, 5,'3.4 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',308, 1, 10,'3.5.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',309, 1, 7,'3.5.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 10:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',310, 1, 4,'3.5.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 11:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.6' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',311, 1, 4,'3.6 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
    }

}

echo '<script type="text/javascript"> // Переход на главный файл
window.location.href ="upload_end.php";
</script>';




