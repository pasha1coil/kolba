<?php
session_start();
$connection =mysqli_connect('pojectkolba','root','', 'server2');
$dbh = new PDO('mysql:dbname=server2;host=localhost', 'root', '');
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
	
	<style>
		details summary {
		  display: block;  /* у summary по умолчанию свойство display в значении list-item, потому поддерживается свойство list-style */
		  width: 10em;
		  width: -webkit-fit-content;
		  width: -moz-fit-content;
		  width: fit-content;  /* блок раскрывается при щелчке по кнопке, а не по всей строке */
		  border-bottom: 1px dotted;  /* подводка точками или тире часто используется для элементов, с которыми пользователю предлагается взаимодействовать, можно заменить на text-decoration */
		  outline-style: none;  /* удалить обводку при фокусе */
		  cursor: pointer;
		}
		details summary::-webkit-details-marker {  /* нестандартный псевдоэлемент Google Chrome */
		  display: none;
		}
		
		body {
		background: #c7b39b url(images/bg-01.jpg); /* Цвет фона и путь к файлу */
		}
		.floating-button {
		  text-decoration: none;
		  display: inline-block;
		  width: 140px;
		  height: 45px;
		  line-height: 45px;
		  border-radius: 45px;
		  margin: 10px 20px;
		  font-family: 'Montserrat', sans-serif;
		  font-size: 11px;
		  text-transform: uppercase;
		  text-align: center;
		  letter-spacing: 3px;
		  font-weight: 600;
		  color: #524f4e;
		  background: white;
		  box-shadow: 0 8px 15px rgba(0, 0, 0, .1);
		  transition: .3s;
		}
		.floating-button:hover {
		  background: #2EE59D;
		  box-shadow: 0 15px 20px rgba(46, 229, 157, .4);
		  color: white;
		  transform: translateY(-7px);
		}
		.card {
		  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		  max-width: 550px;
		  margin: auto;
		  text-align: center;
		  font-family: Roboto;
		  background: #c7b39b url(images/background39.png); /* Цвет фона и путь к файлу */
		  border-radius: 50px;
		}

		.title {
		  color: grey;
		  font-size: 15px;
		}
		
	</style>
	
	

    <title>Понижающие показатели</title>
  </head>
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
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Опоздание на занятие
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Уменьшение контингента студентов обучающихся за счет бюджета РФ
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Невыполнение студентами требований Интернет-экзамена по дисциплине, прочитанной преподавателем, менее допустимого предела
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                За ненадлежащее обеспечение воспитательного процесса
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Замечание, оформленное приказом ректора
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Выговор, оформленный приказом ректора
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Предоставление недостоверной информации
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
			<tr scope="row">
              <td>
                Несвоевременное выполнение решений ректората, установленных сроков сдачи отчетности
              </td>
              
			 <td><center><fieldset align = "right"><p><input type="file" name="files4[]"></p></fieldset></center></td>
			  
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
            
		</table>
		</tbody>
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
	<script src="js/main2.js"></script>
	
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>