<?php // Загрузка файлов УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles2']; // количество файлов
$uploadFileDir = "./upload_files/$username/$date/2/"; // Путь загрузки файлов
$id_ek = intval($_SESSION['id_ek'][0]);


if (!is_dir($uploadFileDir) ){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files2']['name'][$i];
    /*move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . $i .' '.  $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.1.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',200, 1, 20,'2.1.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.1.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',201, 1, 40,'2.1.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.2.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',202, 1, 2,'2.2.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.3.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',203, 1, 1,'2.3.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.3.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',204, 1, 2,'2.3.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',205, 1, 1,'2.4.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',206, 1, 0.5,'2.4.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',207, 1, 0.2,'2.4.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',208, 1, 5,'2.5.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',209, 1, 2,'2.5.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 10:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',210, 1, 3,'2.5.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 11:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',211, 1, 0.4,'2.6.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 12:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',212, 1, 0.3,'2.6.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 13:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',213, 1, 0.2,'2.6.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 14:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',214, 1, 0,'2.7.1 $filename')"; /*Комментарий: уточнить значение баллов либо добавить ввод балла*/
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 15:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',215, 1, 0,'2.7.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 16:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',216, 1, 0,'2.7.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 17:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.8' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',217, 1, 0.5,'2.8 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 18:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.9' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',218, 1, 0.1,'2.9 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 19:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',219, 1, 15,'2.10.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 20:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',220, 1, 5,'2.10.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 21:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',221, 1, 1,'2.10.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 22:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',222, 1, 1,'2.11.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 23:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',223, 1, 1,'2.11.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 24:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',224, 1, 0.5,'2.11.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 25:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.12' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',225, 1, 1,'2.12 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 26:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.13' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',226, 1, 0.1,'2.13 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 27:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.14.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',227, 1, 0.5,'2.14.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 28:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.14.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',228, 1, 0.2,'2.14.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 29:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.15.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',229, 1, 5,'2.15.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 30:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.15.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',230, 1, 3,'2.15.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 31:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.16' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',231, 1, 0.2,'2.16 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 32:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',232, 1, 0.4,'2.17.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 33:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',233, 1, 0.3,'2.17.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 34:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',234, 1, 0.2,'2.17.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 35:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.18' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',235, 1, 2,'2.18 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 36:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.19' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',236, 1, 2,'2.19 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 37:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.20' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',237, 1, 4,'2.20 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 38:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.21.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',238, 1, 0.2,'2.21.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 39:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.21.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',239, 1, 0.2,'2.21.2 $filename')";
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




