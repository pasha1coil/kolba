<?php
session_start();
$hostname = 'kolba'; // Тут заменить данные на нужные
$server_login = 'root'; // Тут заменить данные на нужные
$server_password = ''; // Тут заменить данные на нужные
$database = 'server2'; // Тут заменить данные на нужные
$connection =mysqli_connect($hostname,$server_login,$server_password, $database);
$dbh = new PDO('mysql:dbname=server2;host=kolba', 'root', '');// Тут заменить host на нужное
if(isset($_GET['id_ek'])) {
    $id = $_GET['id_ek'];
    $_SESSION['id_ek_for_lowball']=$id;}

$lastname= mysqli_query($connection,"select last_name from employees where educator_id=(select educator_id from eff_contract where id_ek=$id)")->fetch_assoc()['last_name'];
$firstname=mysqli_query($connection,"select name_real from employees where educator_id=(select educator_id from eff_contract where id_ek=$id)")->fetch_assoc()['name_real'];
$patronymic=mysqli_query($connection,"select patronymic from employees where educator_id=(select educator_id from eff_contract where id_ek=$id)")->fetch_assoc()['patronymic'];
$position=mysqli_query($connection,"select position from employees where educator_id=(select educator_id from eff_contract where id_ek=$id)")->fetch_assoc()['position'];
$department=mysqli_query($connection,"select department from employees where educator_id=(select educator_id from eff_contract where id_ek=$id)")->fetch_assoc()['department'];
$stavka=mysqli_query($connection,"select stavka from employees where educator_id=(select educator_id from eff_contract where id_ek=$id)")->fetch_assoc()['stavka'];
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

<script>
	function a (){ //ни к чему не привязана! нужно привязать
		let arr = [];
		var  cFiles
		for (var i = 1; i<9; i++){
			arr.push(document.getElementsByClassName(i).files.length)
		}
		console.log(arr); //arr - spisok peremennaya
	}
</script>

<title>Понижающие показатели</title>
<center><button class="floating-button">Назад</button></center>
  <body>
  <form method="POST" action="upload_lowball.php" enctype="multipart/form-data">
	<div class="content">

        <center>

            <div class="card">
                <h3>Профиль</h3>
                <p class="title"><?php echo $lastname, ' ', $firstname, ' ', $patronymic; ?></p>
                <h3 class="title">Должность</h3>
                <p class="title"><?php echo $position; ?></p>
                <h3 class="title">Факультет</h3>
                <p class="title"><?php echo $department; ?></p>
                <h3 class="title">Ставка</h3>
                <p class="title"><?php echo $stavka,' ', 'руб.'; ?></p>
                <p>Российский государственный гидрометеорологический университет</p>


            </div>

        </center>

    <div class="container">


      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
		<h2 class="mb-5"><center>Понижающие показатели</center></h2>
          <thead>
            <tr>
              <th scope="col"><center>Показатели</center></th>
              <th scope="col"><center>Загрузить файлы</center></th>
            </tr>
          </thead>
        <tbody>
            <tr scope="row">
              <td>
                Срыв занятий по дисциплинам кафедры
              </td>

			 <td><center><fieldset id="1" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Опоздание на занятие
              </td>

			 <td><center><fieldset id="2" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Уменьшение контингента студентов обучающихся за счет бюджета РФ
              </td>

			 <td><center><fieldset id="3" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Невыполнение студентами требований Интернет-экзамена по дисциплине, прочитанной преподавателем, менее допустимого предела
              </td>

			 <td><center><fieldset id="4" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                За ненадлежащее обеспечение воспитательного процесса
              </td>

			 <td><center><fieldset id="5" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Замечание, оформленное приказом ректора
              </td>

			 <td><center><fieldset id="6" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Выговор, оформленный приказом ректора
              </td>

			 <td><center><fieldset id="7" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Предоставление недостоверной информации
              </td>

			 <td><center><fieldset id="8" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Несвоевременное выполнение решений ректората, установленных сроков сдачи отчетности
              </td>

			 <td><center><fieldset id="9" align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>

            </tr>
		</table>
      </div>	
    </div>
        <center><input name="lowballUploadBtn" type='submit' value="Отправить" href="" class="floating-button"/></center>
	</div>
    </form>


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