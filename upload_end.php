<?php // Завершение загрузки файлов
session_start();
require("connect.php");
$username=$_SESSION['username'];
$position=mysqli_query($connection,"select position from employees where login='$username'")->fetch_assoc()['position'];
$update_values = 'UPDATE eff_contract as ec
INNER JOIN (
    SELECT id_ek, SUM(value * count) AS total_value
    FROM docs 
    GROUP BY id_ek
) d ON ec.id_ek = d.id_ek
SET ec.all_value = d.total_value;';
$result_update = mysqli_query($connection, $update_values);
if (!$result_update) {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}

switch ($position) { // Переход на страницу
    case Null:
        echo "Error: Null in position";
        break;
    case "Prepodavatel": // Переход на страницу для преподавателей
        echo '<script type="text/javascript">
            alert("Файлы успешно загружены");
            window.location.href ="prepod.php";
        </script>';
        break;
    case "ZavKafedri": // Переход на страницу для завкафедры
        echo '<script type="text/javascript">
            alert("Файлы успешно загружены");
            window.location.href ="zavkaf.php";
        </script>';
        break;
    case "Dekan" or "Direktor": // Переход на страницу для декана или директора
        echo '<script type="text/javascript">
            alert("Файлы успешно загружены");
            window.location.href ="deka-dir.php";
        </script>';
        break;
}

