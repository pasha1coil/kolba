<?php // Загрузка файлов УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles1']; // Добавить это в upload как проверку на существование
$uploadFileDir = "./upload_files/$username/$date/1/"; // Путь загрузки файлов
$id_ek = intval($_SESSION['id_ek'][0]);
$position=mysqli_query($connection,"select position from employees where login='$username'")->fetch_assoc()['position'];
$errors = 0;


if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files1']['name'][$i];
    $count = $_SESSION['arr1'][$i];
    /*move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . $i .' '. $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id, id_index, count, value, file_name) VALUES ('$id_ek','$educator_id',100, '$count', (1*'$count'),'1.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',101, '$count', (2*'$count'),'1.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.3.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',102, '$count', (10*'$count'),'1.3.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.3.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',103, '$count', (5*'$count'),'1.3.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',104, '$count', (2*'$count'),'1.4.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.3' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',105, '$count', (2*'$count'),'1.4.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.5' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',106, '$count', (2*'$count'),'1.4.5 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.4.6' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',107, '$count', (1*'$count'),'1.4.6 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.5.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',108, '$count', (7*'$count'),'1.5.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.5.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',109, '$count', (3*'$count'),'1.5.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 10:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.6' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',110, '$count', (2*'$count'),'1.6 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 11:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id, id_index, count, value, file_name) VALUES ('$id_ek','$educator_id',111, '$count', (0.5*'$count'),'1.7.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 12:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',112, '$count', (0.5*'$count'),'1.7.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 13:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.7.3' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',113, '$count', (0.5*'$count'),'1.7.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 14:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.8' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',114, '$count', (0.5*'$count'),'1.8 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 15:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',115, '$count', (2*'$count'),'1.9.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 16:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',116, '$count', (2*'$count'),'1.9.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 17:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.9.3' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',117, '$count', (1*'$count'),'1.9.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 18:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.10' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',118, '$count', (5*'$count'),'1.10 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 19:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.11' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',119, '$count', (2*'$count'),'1.11 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 20:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.12' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',120, '$count', (2*'$count'),'1.12 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 21:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.13.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',121, '$count', (3*'$count'),'1.13.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 22:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.13.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',122, '$count', (2*'$count'),'1.13.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 23:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.14' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',123, '$count', (1*'$count'),'1.14 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 24:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.15.1' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',124, '$count', (10*'$count'),'1.15.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 25:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.15.2' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',125, '$count', (5*'$count'),'1.15.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 26:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files1']['tmp_name'][$i], $uploadFileDir . '1.16' . ' ' . $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',126, '$count', (0.5*'$count'),'1.16 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
    }
}

if($errors > 0) {
    switch ($position) { // Переход на страницу
        case Null:
            echo "Error: Null in position";
            break;
        case "Prepodavatel": // Переход на страницу для преподавателей
            echo '<script type="text/javascript">
            alert("Произошла ошибка при загрузке данных. Проверьте правильность загрузки");
            window.location.href ="prepod.php";
        </script>';
            break;
        case "ZavKafedri": // Переход на страницу для завкафедры
            echo '<script type="text/javascript">
            alert("Произошла ошибка при загрузке данных. Проверьте правильность загрузки");
            window.location.href ="zavkaf.php";
        </script>';
            break;
        case "Dekan" or "Direktor": // Переход на страницу для декана или директора
            echo '<script type="text/javascript">
            alert("Произошла ошибка при загрузке данных. Проверьте правильность загрузки");
            window.location.href ="deka-dir.php";
        </script>';
            break;
    }
}
echo '<script type="text/javascript"> // Переход на главный файл
window.location.href ="upload_end.php";
</script>';




