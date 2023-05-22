<?php // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles1']; // Добавить это в upload как проверку на существование
$uploadFileDir = "./upload_files/$username/$date/1/"; // Путь загрузки файлов
/*file_put_contents("./upload_files/$username/$date/1/counts.txt", "count = $countfiles");*/


$id_ek = intval($_SESSION['id_ek'][0]);

if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files1']['name'][$i];
    /*move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . $i .' '. $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id, id_index, count, value, file_name) VALUES ('$id_ek','$educator_id',100, 1, 1,'1.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',101, 1, 2,'1.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.3.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',102, 1, 10,'1.3.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.3.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',103, 1, 5,'1.3.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',104, 1, 2,'1.4.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.3' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',105, 1, 2,'1.4.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.5' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',106, 1, 2,'1.4.5 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.6' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',107, 1, 1,'1.4.6 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.5.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',108, 1, 7,'1.5.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.5.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',109, 1, 3,'1.5.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 10:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.6' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',110, 1, 2,'1.6 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 11:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id, id_index, count, value, file_name) VALUES ('$id_ek','$educator_id',111, 1, 0.5,'1.7.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 12:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',112, 1, 0.5,'1.7.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 13:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.3' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',113, 1, 0.5,'1.7.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 14:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.8' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',114, 1, 0.5,'1.8 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 15:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',115, 1, 2,'1.9.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 16:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',116, 1, 2,'1.9.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 17:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.3' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',117, 1, 1,'1.9.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 18:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.10' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',118, 1, 5,'1.10 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 19:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.11' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',119, 1, 2,'1.11 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 20:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.12' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',120, 1, 2,'1.12 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 21:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.13.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',121, 1, 3,'1.13.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 22:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.13.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',122, 1, 2,'1.13.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 23:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.14' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',123, 1, 1,'1.14 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 24:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.15.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',124, 1, 10,'1.15.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 25:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.15.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',125, 1, 5,'1.15.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 26:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.16' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',126, 1, 0.5,'1.16 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
    }
}

/*$delete_err = mysqli_query($connection, "DELETE FROM docs WHERE file_name = '';");*/ /*Комментарий: Убрать после починки бага*/
echo '<script type="text/javascript"> // Переход на главный файл
window.location.href ="upload_end.php";
</script>';




