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
    $count = $_SESSION['arr2'][$i];
    /*move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . $i .' '.  $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.1.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',200, '$count', (20*'$count'),'2.1.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.1.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',201,'$count',(40*'$count'),'2.1.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.2.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',202,'$count',(2*'$count'),'2.2.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.3.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',203,'$count',(1*'$count'),'2.3.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.3.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',204,'$count',(2*'$count'),'2.3.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',205,'$count',(1*'$count'),'2.4.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',206,'$count',(0.5*'$count'),'2.4.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.4.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',207,'$count',(0.2*'$count'),'2.4.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',208,'$count',(5*'$count'),'2.5.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',209,'$count',(2*'$count'),'2.5.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 10:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.5.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',210,'$count',(3*'$count'),'2.5.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 11:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',211,'$count',(0.4*'$count'),'2.6.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 12:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',212,'$count',(0.3*'$count'),'2.6.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 13:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.6.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',213,'$count',(0.2*'$count'),'2.6.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 14:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',214,'$count',0,'2.7.1 $filename')"; /*Комментарий: уточнить значение баллов либо добавить ввод балла*/
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 15:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',215,'$count',0,'2.7.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 16:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.7.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',216,'$count',0,'2.7.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 17:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.8' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',217,'$count',(0.5*'$count'),'2.8 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 18:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.9' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',218,'$count',(0.1*'$count'),'2.9 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 19:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',219,'$count',(15*'$count'),'2.10.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 20:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',220,'$count',(5*'$count'),'2.10.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 21:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.10.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',221,'$count',(1*'$count'),'2.10.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 22:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',222,'$count',(1*'$count'),'2.11.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 23:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',223,'$count',(1*'$count'),'2.11.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 24:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.11.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',224,'$count',(0.5*'$count'),'2.11.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 25:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.12' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',225,'$count',(1*'$count'),'2.12 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 26:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.13' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',226,'$count',(0.1*'$count'),'2.13 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 27:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.14.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',227,'$count',(0.5*'$count'),'2.14.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 28:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.14.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',228,'$count',(0.2*'$count'),'2.14.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 29:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.15.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',229,'$count',(5*'$count'),'2.15.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 30:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.15.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',230,'$count',(3*'$count'),'2.15.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 31:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.16' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',231,'$count',(0.2*'$count'),'2.16 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 32:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',232,'$count',(0.4*'$count'),'2.17.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 33:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',233,'$count',(0.3*'$count'),'2.17.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 34:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.17.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',234,'$count',(0.2*'$count'),'2.17.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 35:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.18' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',235,'$count',(2*'$count'),'2.18 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 36:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.19' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',236,'$count',(2*'$count'),'2.19 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 37:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.20' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',237,'$count',(4*'$count'),'2.20 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 38:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.21.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',238,'$count',(0.2*'$count'),'2.21.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            }
            break;
        case 39:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files2']['tmp_name'][$i], $uploadFileDir . '2.21.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',239,'$count',(0.2*'$count'),'2.21.2 $filename')";
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




