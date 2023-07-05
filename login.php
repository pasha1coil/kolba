<?php
session_start();
require("connect.php");
if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $position ="";
    $query = "SELECT * FROM employees WHERE login='$username' and password='$password'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1)  {
        $_SESSION['username'] = $username;
        $s_query = mysqli_query($connection,"SELECT position FROM employees WHERE login='$username' and password='$password'");
        $array = mysqli_fetch_array($s_query);
        switch ($array[0]) {
            case Null:
                echo "Error: Null in position";
                break;
            case "admin":
                header('Location: ../adminpanel.php');
                break;
            case "Prepodavatel":
                header('Location: ../prepod.php');
                break;
            case "ZavKafedri":
                header('Location: ../zavkaf.php');
                break;
            case "Dekan" or "Direktor":
                header('Location: ../deka-dir.php');
                break;

        }
    } else {
        echo '<script type="text/javascript">
            alert("Нет такого пользователя в базе данных. Проверьте логин и пароль");
            window.location.href ="index.html";
        </script>';
    }

}

?>
