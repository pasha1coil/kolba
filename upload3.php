<?php // Загрузка файлов НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА
session_start();
require ('connect.php');
$username=$_SESSION['username'];
$educator_id=$_SESSION['educator_id'];
$date=$_SESSION['date'];
$numfiles = $_SESSION['numfiles3']; // количество файлов
$uploadFileDir = "./upload_files/$username/$date/3/"; // Путь загрузки файлов
$id_ek = intval($_SESSION['id_ek'][0]);
$position=mysqli_query($connection,"select position from employees where login='$username'")->fetch_assoc()['position'];
$errors = 0;


if (!is_dir($uploadFileDir)){ // Создаётся каждый раз при нажатии кнопки. Лучше доработать
    mkdir($uploadFileDir,0700);}
for ($i = 0; $i < $numfiles; $i++) {
    $filename = $_FILES['files3']['name'][$i];
    $count = $_SESSION['arr3'][$i];
    /*move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . $i .' '.  $filename);*/
    switch ($i) { // Правильно работает, если загружать в 1 показатель только 1 файл
        case 0:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',300, '$count', (2*'$count'),'3.1.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 1:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',301, '$count', (2.5*'$count'),'3.1.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 2:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.1.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',302, '$count', (3*'$count'),'3.1.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 3:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',303, '$count', (2*'$count'),'3.2.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 4:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',304, '$count', (3*'$count'),'3.2.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 5:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.2.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',305, '$count', (4*'$count'),'3.2.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 6:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',306, '$count', (2*'$count'),'3.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 7:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.4' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',307, '$count', (5*'$count'),'3.4 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 8:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.1' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',308, '$count', (10*'$count'),'3.5.1 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 9:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.2' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',309, '$count', (7*'$count'),'3.5.2 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 10:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.5.3' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',310, '$count', (4*'$count'),'3.5.3 $filename')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                    $errors += 1;
                }
            }
            break;
        case 11:
            if (!empty($filename)) {
                move_uploaded_file($_FILES['files3']['tmp_name'][$i], $uploadFileDir . '3.6' .' '.  $filename);
                $query = "INSERT INTO docs (id_ek, educator_id,id_index,count,value,file_name) values ('$id_ek','$educator_id',311, '$count', (4*'$count'),'3.6 $filename')";
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




