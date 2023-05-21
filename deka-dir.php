<?php
session_start();
require("connect.php");
$username=$_SESSION['username'];
$lastname= mysqli_query($connection,"select last_name from employees where login='$username'")->fetch_assoc()['last_name'];
$firstname=mysqli_query($connection,"select name_real from employees where login='$username'")->fetch_assoc()['name_real'];
$patronymic=mysqli_query($connection,"select patronymic from employees where login='$username'")->fetch_assoc()['patronymic'];
$position=mysqli_query($connection,"select position from employees where login='$username'")->fetch_assoc()['position'];
$department=mysqli_query($connection,"select department from employees where login='$username'")->fetch_assoc()['department'];
$stavka=mysqli_query($connection,"select stavka from employees where login='$username'")->fetch_assoc()['stavka'];
$educator_id=mysqli_query($connection,"select educator_id from employees where login='$username'")->fetch_assoc()['educator_id'];
$id_ek=mysqli_query($connection,"select id_ek from eff_contract where educator_id='$educator_id'")->fetch_assoc()['id_ek'];

$_SESSION['educator_id'] = $educator_id;

$dbh = new PDO('mysql:dbname=server2;host=localhost', 'root', '');
$pos = $_POST['selector'];
echo $pos;
/* Запрос в БД */
$sth = $dbh->prepare("SELECT emp.`last_name`,`emp`.`name_real`,`emp`.`patronymic`,
       `emp`.`position`,`ef`.`id_ek` FROM `eff_contract` as `ef`,`employees` as `emp` 
                                     WHERE `ef`.`educator_id`=`emp`.`educator_id` and `ef`.`checked`=0;");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
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
		
		[data-tooltip] {
		position: relative; /* Относительное позиционирование */ 
	   }
	   [data-tooltip]::after {
		content: attr(data-tooltip); /* Выводим текст */
		font-family: 'Montserrat', sans-serif;
		position: absolute; /* Абсолютное позиционирование */
		width: 250px; /* Ширина подсказки */
		left: 0; top: 0; /* Положение подсказки */
		background: url(images/background39.png); /* Цвет фона */
		color: #000000; /* Цвет текста */
		padding: 0.5em; /* Поля вокруг текста */
		box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Параметры тени */
		pointer-events: none; /* Подсказка */
		opacity: 0; /* Подсказка невидима */
		transition: 1s; /* Время появления подсказки */
	   } 
	   [data-tooltip]:hover::after {
		opacity: 1; /* Показываем подсказку */
		top: 2em; /* Положение подсказки */
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

          function mult(second,first,result) {
              second.value = second
              var first = document.getElementById(first).value;
              document.getElementById(result).innerText = first * second;


          }
          function sumballAll() {
              var res ='result';
              let i = 1
              var names= [];
              while (i < 80) {
                  name = res+i;
                  var chislo = document.getElementById(name).textContent;
                  names.push(chislo);
                  i++;
              }
              var sum = 0
              for(var j = 0; j < names.length; j++){
                  names[j]=Number(names[j])
                  sum += names[j];
              }
              document.getElementById("sumball").innerText = sum;
          }





      </script>
	
	

    <title>ДеканДиректор</title>
  </head>
  <body>
  
	<div>
		<center>
		<details>
		<summary class="floating-button">Профиль</summary>

            <div class="card">
                <h1>ФИО</h1>
                <p class="title"><?php echo $lastname, ' ', $firstname, ' ', $patronymic; ?></p>
                <p class="title">Должность</p>
                <p class="title"><?php echo $position; ?></p>
                <p class="title">Факультет</p>
                <p class="title"><?php echo $department; ?></p>
                <p class="title">Ставка</p>
                <p class="title"><?php echo $stavka,' ', 'руб.'; ?></p>
                <center><a href="" class="floating-button">История</a></center>
                <p>Российский государственный гидрометеорологический университет</p>
                <form action="logout.php">
                    <button>Logout</button>
                </form>
		  
		</div>
		</details>
		</center>
	</div>
	
	<div>
		<center>
		<details>
		<summary class="floating-buttonSvod">Понижающие показатели</summary>
		
		<div class="content">
    
			<div class="container">
			  
				<input class="form-control" type="text" placeholder="Параметры для фильтрации" id="search-text" onkeyup="filter(this, 'sf')">
			  

			<div class="table-responsive custom-table-responsive">
                <form method="post">
				<table id = "sf" class="table custom-table">
				  <thead>
					<tr>
					  <th scope="col"><center>ФИО</center></th>
                        <th scope="col"><center>Должность</center></th>
                        <th scope="col"><center>Номер ЭК</center></th>
					  <th scope="col"><center>Добавить Понижающие показатели</center></th>
					</tr>
				  </thead>
				  <tbody id="selector">
                  <?php foreach ($list as $row): ?>
					<tr scope="row">
					  <td>
                          <center><?php echo $row['last_name'] ,' ',$row['name_real'],' ', $row['patronymic']; ?></center>
					  </td>
                        <td>
                            <?php echo $row['position']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_ek']; ?>
                        </td>
					  <td><center><a href="lowball.php?id_ek=<?php echo $row['id_ek']; ?>" class="floating-button">Добавить</a></center></td>
					</tr>
					<tr class="spacer"><td colspan="100"></td></tr>

                  <?php endforeach; ?>
				  </tbody>
				</table>
                </form>
			  </div>
			  
		  </div>
		</div>
		</details>
		</center>
	</div>

    <form method="POST" action="upload_start.php" enctype="multipart/form-data">
        <div class="content">



        <div class="container">


            <div class="table-responsive custom-table-responsive">

                <table class="table custom-table">
                <h2 class="mb-5"><center>УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА</center></h2>
                <thead>
                    <tr>
                    <th scope="col"><center>Показатели</center></th>
                    <th scope="col"><center>Количество</center></th>
                    <th scope="col"><center>Количество баллов</center></th>
                    <th scope="col"><center>Загрузить файлы</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                    <td>
                        1.1 Эксперт Минобрнауки, ВАКа, РФФИ, Росреестра, РНФ и др. гос. органов
                    </td>

                    <td><center data-tooltip="Количество экспертиз"><input type="text" id="first1" oninput="mult(1,'first1','result1')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first1' id='result1'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">
                    <td>
                        1.2 Чтение курсов лекций на иностранном языке направлений подготовки для неязыковых направлений
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first2" oninput="mult(2,'first2','result2')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first2' id='result2'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>


                <details>
                <summary><center>1.3 Разработка ООП по программам бакалавриата, специалитета, магистратуры, аспирантуры</center></summary>
                <table class="table custom-table">

                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.3.1 новых направлений
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first3" oninput="mult(10,'first3','result3')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first3' id='result3'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.3.2 дисциплин подготовки
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first4" oninput="mult(5,'first4','result4')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first4' id='result4'></label></center></td>
                    <td><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>1.4 Издание нового авторского (в соавторстве) учебника (учебного пособия) объемом:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.4.1 - в зарубежном издательстве или в соавторстве с профессорами зарубежных вузов:
                    </td>

                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.4.2 - не менее 7 п.л.:
                    </td>
                    <td><center data-tooltip="Количество печатных листов"><input type="text" id="first5" oninput="mult(2,'first5','result5')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first5' id='result5'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.4.3 - не менее 3 п.л.:
                    </td>
                    <td><center data-tooltip="Количество печатных листов"><input type="text" id="first6" oninput="mult(1.5,'first6','result6')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first6' id='result6'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.4.4 - в российском издательстве:
                    </td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.4.5 - не менее 7 п.л.:
                    </td>
                    <td><center data-tooltip="Количество печатных листов"><input type="text" id="first7" oninput="mult(1.5,'first7','result7')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first7' id='result7'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.4.6 - не менее 3 п.л.:
                    </td>
                    <td><center data-tooltip="Количество печатных листов"><input type="text" id="first8" oninput="mult(1,'first8','result8')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first8' id='result8'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>1.5 Переиздание авторского (в соавторстве) учебника (учебного пособия) объемом:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.5.1 - не менее 7 п.л.:
                    </td>
                    <td><center data-tooltip="Количество учебников"><input type="text" id="first9" oninput="mult(7,'first9','result9')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first9' id='result9'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.5.2 - не менее 3 п.л.:
                    </td>
                    <td><center data-tooltip="Количество учебников"><input type="text" id="first10" oninput="mult(3,'first10','result10')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first10' id='result10'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.6 Разработка дистанционных курсов обучения студентов на базе Moodle
                    </td>
                    <td><center data-tooltip="Количество курсов"><input type="text" id="first11" oninput="mult(2,'first11','result11')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first11' id='result11'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>1.7 Издание авторского пособия или методических указаний для самостоятельной работы студентов:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.7.1 - по дипломному проектированию
                    </td>
                    <td><center data-tooltip="Количество пособий"><input type="text" id="first12" oninput="mult(0.5,'first12','result12')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first12' id='result12'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.7.2 - по курсовому проектированию
                    </td>
                    <td><center data-tooltip="Количество пособий"><input type="text" id="first13" oninput="mult(0.5,'first13','result13')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first13' id='result13'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.7.3 - прочие, в том числе расчетно-графические работы
                    </td>
                    <td><center data-tooltip="Количество пособий"><input type="text" id="first14" oninput="mult(0.5,'first14','result14')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first14' id='result14'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.8. - Подготовка и проведение олимпиад по дисциплинам (межвузовские)
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first15" oninput="mult(0.5,'first15','result15')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first15' id='result15'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>1.9 Руководство студентами, аспирантами - призерами, победителями олимпиад, конкурсов</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.9.1 - международных
                    </td>
                    <td><center data-tooltip="Количество олимпиад"><input type="text" id="first16" oninput="mult(2,'first16','result16')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first16' id='result16'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.9.2 -всероссийских
                    </td>
                    <td><center data-tooltip="Количество олимпиад"><input type="text" id="first17" oninput="mult(1.5,'first17','result17')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first17' id='result17'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.9.3 -региональных
                    </td>
                    <td><center data-tooltip="Количество олимпиад"><input type="text" id="first18" oninput="mult(1,'first18','result18')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first18' id='result18'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.10 Победитель конкурса учебников
                    </td>
                    <td><center><input type="text" id="first19" oninput="mult(5,'first19','result19')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first19' id='result19'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.11 Выполнение "дорожной карты" на факультете, в институте (нормативное соотношение приведенного контингента студентов к количеству ППС)
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="first20" oninput="mult(2,'first20','result20')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first20' id='result20'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.12 Сохранность контингента обучающихся (не менее 90%) в течение учебного года
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="first21" oninput="mult(2,'first21','result21')" size="5" placeholder="__________"></td>
                    <td><center><label for='first21' id='result21'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>1.13 Приглашение в зарубежные вузы и научные центры</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.13.1 - чтение курса лекций
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first22" oninput="mult(3,'first22','result22')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first22' id='result22'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.13.2 - выступление с научной статьей и/или докладом
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first23" oninput="mult(2,'first23','result23')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first23' id='result23'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.14 Приглашение в отечественные вузы и научные центры (с докладом, лекцией, модерирование на конференции)
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="first24" oninput="mult(1,'first24','result24')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first24' id='result24'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>1.15 Издание монографии по направлениям и специальностям Университета</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        1.15.1 - в зарубежном издательстве
                    </td>
                    <td><center data-tooltip="Количество монографии"><input type="text" id="first25" oninput="mult(10,'first25','result25')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first25' id='result25'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        1.15.2 - в российском издательстве
                    </td>
                    <td><center data-tooltip="Количество монографии"><input type="text" id="first26" oninput="mult(5,'first26','result26')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first26' id='result26'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        1.16 Участие в работе ГАК в других вузах
                    </td>
                    <td><center data-tooltip="Количество раз"><input type="text" id="first27" oninput="mult(0.5,'first27','result27')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='first27' id='result27'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files1[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table>
                <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                <h2 class="mb-5"><center>НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА</center></h2>

                <details>
                <summary><center>2.1 Утверждение в ВАК диссертации преподавателя:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.1.1 - кандидатская диссертация
                    </td>
                    <td><center><input type="text" id="second1" oninput="mult(20,'second1','result28')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second1' id='result28'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.1.2 - докторская диссертация
                    </td>
                    <td><center><input type="text" id="second2" oninput="mult(40,'second2','result29')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second2' id='result29'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.2 Руководителю преподавателя утвердившего в ВАК:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.2.1 -кандидатскую диссертацию
                    </td>
                    <td><center data-tooltip="Количество человек"><input type="text" id="second3" oninput="mult(2,'second3','result30')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second3' id='result30'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.3 Научному консультанту преподавателя утвердившего в ВАК:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.3.1 -кандидатскую диссертацию
                    </td>
                    <td><center data-tooltip="Количество человек"><input type="text" id="second4" oninput="mult(1,'second4','result31')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second4' id='result31'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.3.2 - докторскую диссертацию
                    </td>
                    <td><center data-tooltip="Количество человек"><input type="text" id="second5" oninput="mult(2,'second5','result32')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second5' id='result32'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.4 Награда за участие в научно- исследовательских конкурсах международного, федерального, городского уровня</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.4.1 - международного уровня
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second6" oninput="mult(1,'second6','result33')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second6' id='result33'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.4.2 - федерального уровня
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second7" oninput="mult(0.5,'second7','result34')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second7' id='result34'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.4.3 - городского уровня
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second8" oninput="mult(0.2,'second8','result35')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second8' id='result35'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.5 Участие в диссертационных советах университета</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.5.1 - Председатель диссертационного совета
                    </td>
                    <td><center><input type="text" id="second9" oninput="mult(5,'second9','result36')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second9' id='result36'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.5.2 - член диссертационного совета
                    </td>
                    <td><center><input type="text" id="second10" oninput="mult(2,'second10','result37')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second10' id='result37'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.5.3 - ученый секретарь диссертационного совета
                    </td>
                    <td><center><input type="text" id="second11" oninput="mult(3,'second11','result38')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second11' id='result38'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.6 Подготовка студентов к выступлению на международных, федеральных, региональных и пр. конференциях</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.6.1 - международных конференциях
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second12" oninput="mult(0.4,'second12','result39')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second12' id='result39'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.6.2 - федеральных конференциях
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second13" oninput="mult(0.3,'second13','result40')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second13' id='result40'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.6.3 - региональных конференциях
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second14" oninput="mult(0.2,'second14','result41')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second14' id='result41'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary>2.7 Доля студентов, участвующих в НИРС (доклады на научных конференциях, семинарах всех уровней; научные публикации; экспонаты и творческие работы, представленные на выставках с участием студентов)</summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.7.1 - от 5% до 10%
                    </td>
                    <td><center data-tooltip="Сколько процентов?"><input type="text" id="second15" oninput="mult(0,'second15','result42')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second15' id='result42'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.7.2 - от 10% до 20%
                    </td>
                    <td><center data-tooltip="Сколько процентов?"><input type="text" id="second16" oninput="mult(0,'second16','result43')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second16' id='result43'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.7.3 - свыше 20%
                    </td>
                    <td><center data-tooltip="Сколько процентов?"><input type="text" id="second17" oninput="mult(0,'second17','result44')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second17' id='result44'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.8 Количество патентов, свидетельств о регистрации результатов интеллектуальной деятельности
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second18" oninput="mult(0.5,'second18','result45')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second18' id='result45'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.9 Выполнение инициативной научно- исследовательской работы, включенной в план НИР кафедры
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second19" oninput="mult(0.1,'second19','result46')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second19' id='result46'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>2.10 Публикация научных статей в индивидуальном порядке:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.10.1 - в журнале входящем в список Scopus, Webof Sciens
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second20" oninput="mult(15,'second20','result47')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second20' id='result47'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.10.2 - в журналах, индексируемых РИНЦ и рекомендованных ВАК
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second21" oninput="mult(5,'second21','result48')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second21' id='result48'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.10.3 - в прочих журналах РИНЦ
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second22" oninput="mult(1,'second22','result49')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second22' id='result49'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.11 Публикация научных статей в рамках гранта/софинансирования:</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.11.1 - в журнале входящем в список Scopus, Webof Sciens
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second23" oninput="mult(1,'second23','result50')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second23' id='result50'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.11.2 - в журналах, индексируемых РИНЦ и рекомендованных ВАК
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second24" oninput="mult(1,'second24','result51')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second24' id='result51'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.11.3 - в прочих журналах РИНЦ
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second25" oninput="mult(0.5,'second25','result52')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second25' id='result52'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.12 Индекс цитирования ХИРША, 1 h-index = 1балл, но не более 10 баллов
                    </td>
                    <td><center data-tooltip="h-index"><input type="text" id="second26" oninput="mult(1,'second26','result53')" size="5" placeholder="__________"></td>
                    <td><center><label for='second26' id='result53'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.13 Увеличение индекса цитирования РИНЦ по сравнению с предыдущим годом, 1 балл РИНЦ = 0.1баллу, но не более 10 баллов
                    </td>
                    <td><center data-tooltip="Количество баллов РИНЦ"><input type="text" id="second27" oninput="mult(0.1,'second27','result54')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second27' id='result54'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>2.14 Отзыв на автореферат диссертации</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.14.1 - докторская диссертация
                    </td>
                    <td><center data-tooltip="Количество отзывов"><input type="text" id="second28" oninput="mult(0.5,'second28','result55')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second28' id='result55'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.14.2 - кандидатская диссертация
                    </td>
                    <td><center data-tooltip="Количество отзывов"><input type="text" id="second29" oninput="mult(0.2,'second29','result56')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second29' id='result56'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>2.15 Официальное оппонирование или написание отзыва ведущей организации</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.15.1 - докторская диссертация
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second30" oninput="mult(5,'second30','result57')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second30' id='result57'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.15.2 - кандидатская диссертация
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second31" oninput="mult(3,'second31','result58')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second31' id='result58'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>



                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.16 Участие в конференциях, семинарах, круглых столах, выставках, форумах с опубликованием статьи, в редакционном совете (редакционной коллегии) журнала издаваемого во внешних редакциях
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second32" oninput="mult(0.2,'second32','result59')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second32' id='result59'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>2.17 Количество студенческих научных проектов, получивших поддержку в грантовых конкурсах разных уровней</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.17.1 - международных
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second33" oninput="mult(0.4,'second33','result60')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second33' id='result60'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.17.2 - всероссийских
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second34" oninput="mult(0.3,'second34','result61')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second34' id='result61'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.17.3 - региональных
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="second35" oninput="mult(0.2,'second35','result62')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second35' id='result62'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.18 Привлечение средств на НИР из внебюджетных источников, 2 балла за каждые 100 тыс.руб. поступивших на счет Университета
                    </td>
                    <td><center data-tooltip="Количество рублей"><input type="text" id="second36" oninput="mult(2,'second36','result63')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second36' id='result63'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.19 Получение дохода от внедрения результатов интеллектуальной деятельности, 2 балла за каждые 100 тыс.руб. поступивших на счет Университета
                    </td>
                    <td><center data-tooltip="Количество рублей"><input type="text" id="second37" oninput="mult(2,'second37','result64')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second37' id='result64'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        2.20 Организация работы СНО
                    </td>
                    <td><center><input type="text" id="second38" oninput="mult(4,'second38','result65')" size="5" placeholder="__________"></td>
                    <td><center><label for='second38' id='result65'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary><center>2.21 Участие в деятельности научно-теоретического журнала «Ученые записки РГГМУ»</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        2.21.1 - член редколлегии
                    </td>
                    <td><center data-tooltip="Факт"><input type="text" id="second39" oninput="mult(0.2,'second39','result66')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second39' id='result66'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        2.21.2 - рецензирование статейх
                    </td>
                    <td><center data-tooltip="Факт"><input type="text" id="second40" oninput="mult(0.2,'second40','result67')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='second40' id='result67'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files2[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr class="spacer"><td colspan="100"></td></tr>
                </table>

                <h2 class="mb-5"><center>УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА</center></h2>

                <details>
                <summary>3.1 Проведение мероприятий по профессиональной ориентации и привлечению абитуриентов: прирост численности студентов, принятых в текущем учебном году к уровню предыдущего периода на контрактной основе</summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        3.1.1 - от 5% до 10%
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="three1" oninput="mult(2,'three1','result68')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three1' id='result68'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        3.1.2 - от 10% до 20%
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="three2" oninput="mult(2.5,'three2','result69')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three2' id='result69'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        3.1.3 - свыше 20%
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="three3" oninput="mult(3,'three3','result70')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three3' id='result70'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <details>
                <summary><center>3.2 Доля преподавателей, участвующих в студенческих мероприятиях</center></summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        3.2.1 - от 5% до 10%
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="three4" oninput="mult(2,'three4','result71')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three4' id='result71'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        3.2.2 - от 10% до 20%
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="three5" oninput="mult(3,'three5','result72')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three5' id='result72'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        3.2.3 - свыше 20%
                    </td>
                    <td><center data-tooltip="Количество процентов"><input type="text" id="three6" oninput="mult(4,'three6','result73')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three6' id='result73'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        3.3 Кураторская работа
                    </td>
                    <td><center data-tooltip="Номер группы"><input type="text" id="three7" oninput="mult(2,'three7','result74')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three7' id='result74'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>

                </tr>
                </table>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        3.4 Ведение сборных команд Университета
                    </td>
                    <td><center data-tooltip="Название команды"><input type="text" id="three8" oninput="mult(5,'three8','result75')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three8' id='result75'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>

                </tr>
                </table>

                <details>
                <summary>3.5 Присуждение призовых мест (1,2,3 место) студентам во внешних, межвузовских спортивных мероприятиях (соревнования, конкурсы, смотры и т.п.)</summary>
                <table class="table custom-table">
                    <tr class="spacer"><td colspan="100"></td></tr>

                    <tr scope="row">

                    <td>
                        3.5.1 - 1-место
                    </td>
                    <td><center><input type="text" id="three9" oninput="mult(10,'three9','result76')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three9' id='result76'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        3.5.2 - 2-место
                    </td>
                    <td><center><input type="text" id="three10" oninput="mult(7,'three10','result77')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three10' id='result77'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr scope="row">
                    <td>
                        3.5.3 - 3-место
                    </td>
                    <td><center><input type="text" id="three11" oninput="mult(4,'three11','result78')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three11' id='result78'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    </tr>

                </table>
                </details>

                <table class="table custom-table">
                <tr scope="row">
                    <td>
                        3.6 Работа в комиссиях, созданных по приказу ректора
                    </td>
                    <td><center data-tooltip="Количество штук"><input type="text" id="three12" oninput="mult(4,'three12','result79')" size="5" placeholder="__________"></center></td>
                    <td><center><label for='three12' id='result79'></label></center></td>
                    <td><center><fieldset align = "right"><p><input type="file" name="files3[]"></p></fieldset></center></td>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                </tr>
                </table>

                <table class="table custom-table">
                    <tr scope="row">
                        <td button type="submit" onclick="sumballAll();">
                            Нажми чтобы узнать баллы:
                        </td>
                        <td></td>
                        <td></td>
                        <td><center><label id='sumball'>0</label></center></td>

                    </tr>
                </table>
                </tbody>
            </div>
        </div>
        <center><input name="uploadBtn" type='submit' value="Отправить" href="" class="floating-button"/></center>
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