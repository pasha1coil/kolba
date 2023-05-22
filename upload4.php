<?php // Загрузка файлов ПОНИЖАЮЩИЕ ПОКАЗАТЕЛИ
session_start();
require ('connect.php');
$username=$_SESSION['username_for_lowball'];
$educator_id=$_SESSION['educator_id_for_lowball']; /*Комментарий: когда декан-директор сначала загружает пониж.коэф, потом свои файлы, файлы в бд привязываются к преподу с пониж.коэф.*/
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles4']; // количество файлов
$uploadFileDir = "./upload_files/$username/$date/4/"; // Путь загрузки файлов
if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}

$id_ek = $_SESSION['id_ek_for_lowball'];
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files4']['name'][$i];
    var_dump($_FILES['files4']['name'][$i]);
    file_put_contents("./upload_files/filename.txt", "$filename");
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',400, 1, -3,'4.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',401, 1, -1,'4.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.3.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',402, 1, -3,'4.3.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.3.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',403, 1, -5,'4.3.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.4' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',404, 1, -4,'4.4 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.5' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',405, 1, -1,'4.5 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.6' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',406, 1, -2,'4.6 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.7' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',407, 1, -5,'4.7 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.8' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',408, 1, -3,'4.8 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files4']['tmp_name'][$i], $uploadFileDir . '4.9' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',409, 1, -2,'4.9 $filename')";
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




