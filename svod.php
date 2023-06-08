<?php
session_start();
$institute = $_POST['search_institute'];
$department = $_POST['search_department'];
$position = $_POST['search_position'];
echo $institute;
echo $department;
echo $position;

$dbh = new PDO('mysql:dbname=server4;host=projectkolba', 'root', '');
/* Запрос в БД */
$search = $dbh->prepare("SELECT * FROM employees where position in (select position from table_position where position ='$position')");
$search->execute();
$list = $search->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">


    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util2.css">
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <!--===============================================================================================-->

    <title>Понижающие показатели</title>
</head>
<body>

<div class="content">
    <table>
        <tr>
            <td>ФИО</td>
            <td>Должность</td>
            <td>Департамент</td>
            <td>Открыть папку</td>
        </tr>
            <?php foreach ($list as $row): ?>
                <tr scope="row">
                    <td><?php echo $row['last_name'] ,' ',$row['name_real'],' ', $row['patronymic']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><a href="adminpanel.php" class="floating-button">Открыть папку</a></td>
                </tr>
                <tr class="spacer"><td colspan="100"></td></tr>
            <?php endforeach; ?>
    </table>
</div>
    <center><a href="" class="floating-button">Отправить</a></center>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/schitalka.js"></script>

</body>
</html>
