<?php
session_start();
$hostname = 'projectkolba'; // Тут заменить данные на нужные
$server_login = 'root'; // Тут заменить данные на нужные
$server_password = ''; // Тут заменить данные на нужные
$database = 'server4'; // Тут заменить данные на нужные
$connection =mysqli_connect($hostname,$server_login,$server_password, $database);
$dbh = new PDO('mysql:dbname=server4;host=projectkolba', 'root', '');// Тут заменить host на нужное
/* Запрос в БД */
$sth = $dbh->prepare("SELECT * FROM employees where position!='admin'");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth2 = $dbh->prepare("SELECT * FROM eff_contract,employees where checked=1 and eff_contract.educator_id=employees.educator_id");
$sth2->execute();
$list2 = $sth2->fetchAll(PDO::FETCH_ASSOC);

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

<body>
<div>
		<a class="blockleft" href="http://localhost:8080/" target="_blank">Сводная таблица</a>
	</div>
	<div>
		<button class="blockright"  onclick="location.href='logout.php';">Выход</button>
	</div>
	<center><button class="floating-buttonSvod" onclick="show_popap('modal-2')">Проверенные отчёты</button></center>

	

	<div class="overlay" id="modal-2">
		<div class="contentoverlay">
			<div class="popap">
				<table id = 'sf1'>
					<input class="form-control" type="text" placeholder="Параметры для фильтрации" id="search-text" onkeyup="filter(this, 'sf1')">
					<tr>  
						<th><center>Номер ЭК</center></th>
						<th><center>ФИО</center></th>
						<!--<th scope="col"><center>Кафедра</center></th>
						<th scope="col"><center>Институт</center></th>-->
						<th><center>Кол-во баллов</center></th>
						<!--<th scope="col"><center>Скачать отчёт</center></th>-->
					</tr>
					<?php foreach ($list2 as $row2): ?>
					<tr>
						<td><?php echo $row2['id_ek']; ?></td>
						<td><?php echo $row2['last_name'] . ' ' . $row2['name_real'] . ' ' . $row2['patronymic']; ?></td>
						<td><?php echo $row2['all_value']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<center><button class="floating-buttonSvod" onclick="close_popap('modal-2')">Закрыть</button></center>
			</div>
		</div>
	</div>
	
	<div class="content">
			<table id="sf2">
			<input class="form-control" type="text" placeholder="Параметры для фильтрации" id="search-text" onkeyup="filter(this, 'sf2')">
				<th colspan="6"><h2 class="mb-5"><center>Отчеты</center></h2></th>
				<tr>
					<td>ФИО</td>
					<td>Должность</td>
					<td>Кафедра</td>
					<td>Кол-во непроверенных отчётов / Всего отчётов</td>
					<td>Скачать отчёт</td>
				</tr>
              <?php foreach ($list as $row): ?>
                  <tr>
                      <td><?php echo $row['last_name'] . ' ' . $row['name_real'] . ' ' . $row['patronymic']; ?></td>
                      <td><?php echo $row['position']; ?></td>
                      <td><?php echo $row['department']; ?></td>
                      <td>
                              <?php
                              $not_checked_query = "SELECT COUNT(*) as not_checked FROM eff_contract WHERE educator_id = " . $row['educator_id'] . " AND checked = 0";
                              $not_checked_result = mysqli_query($connection, $not_checked_query);
                              $not_checked = mysqli_fetch_assoc($not_checked_result);
                              echo $not_checked['not_checked'];
                              ?>/<?php
                              $all_ek_query = "SELECT COUNT(*) as all_ek FROM eff_contract WHERE educator_id = " . $row['educator_id'];
                              $all_ek_result = mysqli_query($connection, $all_ek_query);
                              $all_ek = mysqli_fetch_assoc($all_ek_result);
                              echo $all_ek['all_ek'];
                              ?>
                      </td>
                      <td><a href="admin_user_ek.php?id=<?php echo $row['educator_id']; ?>" class="floating-button">Открыть папку</a></td>
                  </tr>
              <?php endforeach; ?>
          </table>
    </div>
</body>
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
</html>