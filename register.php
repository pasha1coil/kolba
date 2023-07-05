<?php // Регистрация в БД
require("connect.php");
if (isset($_POST['username']) && isset($_POST['pass'])) {
    $last_name = $_POST['lastname'];
    $first_name = $_POST['firstname'];
    $patronymic = $_POST['patronymic'];
    $doljnost = $_POST['doljnost'];
    $stavka = $_POST['stavka'];
    $fakultet = $_POST['fakultet'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $sql_id = "SELECT COUNT(*) FROM employees";
    $result_id = mysqli_query($connection, $sql_id);
    $row = mysqli_fetch_row($result_id);
    $id = $row[0]; //Тут добавить проверку на повтор логина
    $query = "INSERT INTO employees (educator_id, last_name,name_real,patronymic,department,position, stavka,login,password) values ('$id','$last_name','$first_name', '$patronymic', '$fakultet','$doljnost', '$stavka', '$username', '$password')";
    $result = mysqli_query($connection, $query);
    mkdir("./upload_files/$username/",0700); // Создание папки пользователя
    if ($result)  {
        echo '<script type="text/javascript">
            alert("Успешная регистрация");
            window.location.href ="zavkaf.php";
        </script>';
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
        echo '<script type="text/javascript">
            window.location.href ="zavkaf.php";
        </script>';
    }

} else {
        echo '<script type="text/javascript">
            alert("Ошибка регистрации. Повторите попытку позже");
            window.location.href ="zavkaf.php";
        </script>';
}

?>

