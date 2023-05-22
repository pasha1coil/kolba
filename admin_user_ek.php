<?php
session_start();
$connection =mysqli_connect('pojectkolba','root','', 'server2');
$dbh = new PDO('mysql:dbname=server2;host=localhost', 'root', '');
/* Запрос в БД */
if(isset($_GET['educator_id'])) {
    $id = $_GET['educator_id'];}
$lastname= mysqli_query($connection,"select last_name from employees where educator_id=$id")->fetch_assoc()['last_name'];
$firstname=mysqli_query($connection,"select name_real from employees where educator_id=$id")->fetch_assoc()['name_real'];
$patronymic=mysqli_query($connection,"select patronymic from employees where educator_id=$id")->fetch_assoc()['patronymic'];
$position=mysqli_query($connection,"select position from employees where educator_id=$id")->fetch_assoc()['position'];
$department=mysqli_query($connection,"select department from employees where educator_id=$id")->fetch_assoc()['department'];
$stavka=mysqli_query($connection,"select stavka from employees where educator_id=$id")->fetch_assoc()['stavka'];

$sth = $dbh->prepare("SELECT DISTINCT docs.*, eff_contract.checked, employees.login, DATE_FORMAT(docs.id_period, '%y-%m-%d') AS date, LEFT(docs.id_index, 1) AS section
FROM docs
INNER JOIN eff_contract ON docs.educator_id = eff_contract.educator_id
INNER JOIN employees ON employees.educator_id = docs.educator_id
WHERE docs.educator_id = $id AND eff_contract.checked = 0;
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
		
		#myInput {
		  background-image: url('/css/searchicon.png');
		  background-position: 10px 10px;
		  background-repeat: no-repeat;
		  width: 100%;
		  font-size: 16px;
		  padding: 12px 20px 12px 40px;
		  border: 1px solid #ddd;
		  margin-bottom: 12px;
		}
		
		.floating-buttonSvod {
		  text-decoration: none;
		  display: inline-block;
		  width: 250px;
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
		.floating-buttonSvod:hover {
		  background: #2EE59D;
		  box-shadow: 0 15px 20px rgba(46, 229, 157, .4);
		  color: white;
		  transform: translateY(-7px);
		}
		
	</style>
	
	<script>
   	function filter (phrase, _id){
		var words = phrase.value.toLowerCase().split(" ");
		var table = document.getElementById(_id);
		var ele;
		for (var r = 1; r < table.rows.length; r++){
			ele = table.rows[r].innerHTML.replace(/<[^>]+>/g,"");
		        var displayStyle = 'none';
		        for (var i = 0; i < words.length; i++) {
			    if (ele.toLowerCase().indexOf(words[i])>=0)
				displayStyle = '';
			    else {
				displayStyle = 'none';
				break;
			    }
		        }
			table.rows[r].style.display = displayStyle;
		}
	}
</script>

<body>

	<div>
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
	</div>
	
	<div>
		<center>
		<details>
		<summary class="floating-buttonSvod">Проверенные отчёты</summary>
		
		<div class="content">
    
			<div class="container">
			  
				<input class="form-control" type="text" placeholder="Параметры для фильтрации" id="search-text" onkeyup="filter(this, 'sf1')">
			  

			<div class="table-responsive custom-table-responsive">

				<table id = "sf1" class="table custom-table">
				  <thead>
					<tr>
                        <th scope="col">
                            <label class="control control--checkbox">
                                <input type="checkbox"  class="js-check-all"/>
                                <div class="control__indicator"></div>
                            </label>
                        </th>
                        <th scope="col"><center>Номер ЭК</center></th>
                        <th scope="col"><center>Номер документа</center></th>
                        <th scope="col"><center>Пункт ЭК</center></th>
                        <th scope="col"><center>Время отправки</center></th>
                        <!--<th scope="col"><center>Институт</center></th>-->
                        <th scope="col"><center>Кол-во баллов</center></th>
					</tr>
				  </thead>
				  <tbody>
                  <?php foreach ($list1 as $row1): ?>
                      <tr scope="row">
                          <th scope="row">
                              <label class="control control--checkbox">
                                  <input type="checkbox"/>
                                  <div class="control__indicator"></div>
                              </label>
                          </th>
                          <td>
                              <center><?php echo $row1['id_ek']; ?></center>
                          </td>
                          <td>
                              <center><?php echo $row1['id_doc']; ?></center>
                          </td>
                          <td>
                              <center><?php echo $row1['id_index']; ?></center>
                          </td>
                          <td>
                              <center><?php echo $row1['id_period']; ?></center>
                          </td>
                          <td>
                              <center><?php echo $row1['value']; ?></center>
                          </td>
                          <td><center><a href="" class="floating-button">Редактировать</a></center></td> <!--Комментарий: Исправить путь на нужный-->
                      </tr>
                      <tr class="spacer"><td colspan="100"></td></tr>
                  <?php endforeach; ?>
				  </tbody>
				</table>
			  </div>
			  
		  </div>
		</div>
		</details>
		</center>
	</div>
	
	<div class="content">
    
    <div class="container">
        <h2 class="mb-5"><center>НЕПРОВЕРЕННЫЕ ДОКУМЕНТЫ</center></h2>
	  
		<input class="form-control" type="text" placeholder="Параметры для фильтрации" id="search-text" onkeyup="filter(this, 'sf2')">
      

      <div class="table-responsive custom-table-responsive">

        <table id = "sf2" class="table custom-table">
          <thead>
            <tr>  

              <th scope="col">
                <label class="control control--checkbox">
                  <input type="checkbox"  class="js-check-all"/>
                  <div class="control__indicator"></div>
                </label>
              </th>
                <th scope="col"><center>Номер ЭК</center></th>
              <th scope="col"><center>Номер документа</center></th>
              <th scope="col"><center>Пункт ЭК</center></th>
              <th scope="col"><center>Время отправки</center></th>
              <!--<th scope="col"><center>Институт</center></th>-->
              <th scope="col"><center>Кол-во баллов</center></th>
			  <th scope="col"><center>Редактирование отчёта</center></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($list as $row): ?>
            <tr scope="row">
              <th scope="row">
                <label class="control control--checkbox">
                  <input type="checkbox"/>
                  <div class="control__indicator"></div>
                </label>
              </th>
                <td>
                    <center><?php echo $row['id_ek']; ?></center>
                </td>
              <td>
                 <center><?php echo $row['id_doc']; ?></center>
              </td>
              <td>
                  <center><?php echo $row['id_index']; ?></center>
              </td>
              <td>
                  <center><?php echo $row['id_period']; ?></center>
              </td>
              <td>
                  <center><?php echo $row['value']; ?></center>
              </td>
                <td><center><a href="./upload_files/<?php echo $row['login']; ?>/<?php echo $row['date']; ?>/<?php echo $row['section']; ?>/<?php echo $row['file_name']; ?>" class="floating-button" target="_blank">Скачать</a></center></td> <!--Комментарий: Исправить путь на нужный-->
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
	<center><a class="floating-button">Подтвердить</a></center>

	  
  </div>

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