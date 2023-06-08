<?php
session_start();
require("connect.php");
$dbh = new PDO('mysql:dbname=server4;host=projectkolba', 'root', '');// Тут заменить host на нужное
/* Запрос в БД */
if(isset($_GET['id'])) {
    $id = $_GET['id'];}
$lastname= mysqli_query($connection,"select last_name from employees where educator_id=$id")->fetch_assoc()['last_name'];
$firstname=mysqli_query($connection,"select name_real from employees where educator_id=$id")->fetch_assoc()['name_real'];
$patronymic=mysqli_query($connection,"select patronymic from employees where educator_id=$id")->fetch_assoc()['patronymic'];
$position=mysqli_query($connection,"select position from employees where educator_id=$id")->fetch_assoc()['position'];
$department=mysqli_query($connection,"select department from employees where educator_id=$id")->fetch_assoc()['department'];
$stavka=mysqli_query($connection,"select stavka from employees where educator_id=$id")->fetch_assoc()['stavka'];

$sth = $dbh->prepare("SELECT DISTINCT docs.*, eff_contract.checked, employees.login, DATE_FORMAT(docs.id_period, '%y-%m-%d') AS date, LEFT(docs.id_index, 1) AS section, table_index.name AS index_name
FROM docs
INNER JOIN eff_contract ON docs.educator_id = eff_contract.educator_id
INNER JOIN employees ON employees.educator_id = docs.educator_id
INNER JOIN table_index ON table_index.`id index` = docs.id_index
WHERE docs.educator_id = $id AND eff_contract.checked = 0;;
;
");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth1 = $dbh->prepare("SELECT *
FROM docs
INNER JOIN eff_contract 
ON docs.educator_id = eff_contract.educator_id 
where docs.educator_id=$id and checked=1");
$sth1->execute();
$list1 = $sth1->fetchAll(PDO::FETCH_ASSOC);
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
<center><button class="floating-button"  onclick="location.href='deka-dir.php';">Назад</button></center>
	<div class="content">
			<table>
				
				<th colspan="8"><h2 class="mb-5"><center>Отчеты</center></h2></th>
                <tr>
                    <td>Выбор документов</td>
                    <td>Номер ЭК</td>
                    <td>Номер документа</td>
                    <td>Пункт ЭК</td>
                    <td>Время отправки</td>
                    <td>Кол-во баллов</td>
                    <td>Скачать документы</td>
                </tr>

				<?php foreach ($list as $row): ?>
				<tr>
					<td scope="row">
						<label class="control control--checkbox">
                            <input type="checkbox" name="selected_docs[]" value="<?php echo $row['id_doc']; ?>"/>
						<div class="control__indicator"></div>
						</label>
					</td>
					<td><?php echo $row['id_ek']; ?></td>
					<td><?php echo $row['id_doc']; ?></td>
					<td><?php echo $row['index_name']; ?></td>
					<td><?php echo $row['id_period']; ?></td>
					<td><?php echo $row['value']; ?></td>
                    <td><center><a href="./upload_files/<?php echo $row['login']; ?>/<?php echo $row['date']; ?>/<?php echo $row['section']; ?>/<?php echo $row['file_name']; ?>" class="floating-button" target="_blank">Скачать</a></center></td>
            	</tr>
          		<?php endforeach; ?>
			</table>
	</div>
	<center><a class="floating-button" id="confirm-button">Подтвердить</a></center>

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
<!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById('confirm-button').addEventListener('click', function () {
            var checkboxes = document.getElementsByName('selected_docs[]');
            var selectedDocs = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedDocs.push(checkboxes[i].value);
                }
            }

            if (selectedDocs.length === 0) {
                alert("Выберите хотя бы один документ.");
            } else {
                var selectedDocsString = selectedDocs.join(',');
                window.location.href = 'deka_dir_confirm.php?id=<?php echo $id; ?>&selected_docs=' + selectedDocsString;
            }
        });

    </script>
</body>
</html>