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

$dbh = new PDO('mysql:dbname=server4;host=projectkolba', 'root', '');// Тут заменить host на нужное
$pos = $_POST['selector'];
echo $pos;
/* Запрос в БД */
$sth = $dbh->prepare("SELECT emp.`last_name`,`emp`.`name_real`,`emp`.`patronymic`,
       `emp`.`position`,`emp`.`educator_id`, `ef`.`id_ek` FROM `eff_contract` as `ef`,`employees` as `emp` 
                                     WHERE `ef`.`educator_id`=`emp`.`educator_id` and `ef`.`checked`=0 
                                                                    and `emp`.`department`='$department' and `emp`.`position`='Prepodavatel';");//Поменять position на нужную
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
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
    function a() {
        let arr = [];
        for (var i = 1; i < 80; i++) {
            var a = document.getElementById('first' + i).value;
            arr.push(a);
        }
        console.log(arr); // arr - список переменных

        $.ajax({
            url: 'upload_start.php',
            method: 'POST',
            data: { data: arr },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }


    $(document).ready(function(){
    // Изменяем текст в элементе input button
    $("#myInput").prop("value", "Input New Text");

    // Изменяем текст в элементе button
    $("#myButton").html("Button New Text");
});

</script>
	

    <title>ДеканДиректор</title>

  <body>
  <button class="blockleft" onclick="show_popap('modal-1')">Профиль</button>
  <button class="blockright" onclick="location.href='logout.php';">Выход</button>
  
  <div class="overlay" id="modal-1">
		<div class="flex-popap">
		  <div class="popap">
				<h2><?php echo $lastname, ' ', $firstname, ' ', $patronymic; ?></h2>
                <p class="title">Должность</p>
                <p class="title"><?php echo $position; ?></p>
                <p class="title">Факультет</p>
                <p class="title"><?php echo $department; ?></p>
                <p class="title">Ставка</p>
                <p class="title"><?php echo $stavka,' ', 'руб.'; ?></p>
				<button class="floating-buttonSvod" onclick="close_popap('modal-1')">Закрыть</button>
		  </div>
		</div>
	</div>
    <center><button class="floating-buttonSvod" onclick="show_popap('modal-2')">Понижающие показатели</button></center>
    <form method="post">
    <div class="overlay" id="modal-2">

		    <div class="contentoverlay">
                <div class="popap">
                    <table id = 'sf'>
                        <input class="form-control" type="text" placeholder="Параметры для фильтрации" id="search-text" onkeyup="filter(this, 'sf')">
                        <tr>
                            <th><center>ФИО</center></th>
                            <th><center>Должность</center></th>
                            <th><center>Номер ЭК</center></th>
                            <th><center>Добавить Понижающие показатели</center></th>
                        </tr>
                    <?php foreach ($list as $row): ?>
                        <tr>
                            <td><?php echo $row['last_name'] ,' ',$row['name_real'],' ', $row['patronymic']; ?></td>
                            <td><?php echo $row['position']; ?></td>
                            <td><?php echo $row['id_ek']; ?></td>
                            <td><center><a href="lowball.php?id_ek=<?php echo $row['id_ek']; ?>" class="floating-button">Добавить</a></center></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                    <center><button class="floating-buttonSvod" onclick="close_popap('modal-2')">Закрыть</button></center>
                </div>
		    </div>
        </form>
	</div>

    <center><button class="floating-buttonSvod" onclick="show_popap('modal-3')">Подтверждение ЭК</button></center>

    <form method="post">
    <div class="overlay" id="modal-3">

		    <div class="contentoverlay">
                <div class="popap">
                    <table>
                        <tr>
                            <th><center>ФИО</center></th>
                            <th><center>Должность</center></th>
                            <th><center>Номер ЭК</center></th>
                            <th><center>Подтвердить ЭК</center></th>
                        </tr>
                    <?php foreach ($list as $row): ?>
                        <tr>
                            <td><?php echo $row['last_name'] ,' ',$row['name_real'],' ', $row['patronymic']; ?></td>
                            <td><?php echo $row['position']; ?></td>
                            <td><?php echo $row['id_ek']; ?></td>
                            <td><a href="dekan_direktor_accept.php?id=<?php echo $row['educator_id']; ?>" class="floating-button">Открыть папку</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                    <center><button class="floating-buttonSvod" onclick="close_popap('modal-3')">Закрыть</button></center>
                </div>
		    </div>
        </form>
	</div>

    <form method="POST" action="upload_stert.php" enctype="multipart/form-data">
        <div class="content">
        <table>
            <th colspan="6"><h2 class="mb-5"><center>УЧЕБНО-МЕТОДИЧЕСКАЯ РАБОТА</center></h2></th>
            <tr>
                <td>Номер</td>
                <td>Показатели</td>
                <td>Количество</td>
                <td>Единицы</td>
                <td>Баллы за показатель</td>
                <td>Загрузить файлы</td>
            </tr>
            <tr>
                <td>1.1</td>
                <td>Эксперт Минобрнауки, ВАКа, РФФИ, Росреестра, РНФ и др. гос. органов</td>
                <td id="f1"><input type="number" id="first1" oninput="mult(1,'first1','result1')" placeholder="__________"></td>
                <td>Количество экспертиз</td>
                <td id="result1"></td>
                <td><input type="file" name="files1[]" id = "1"></td>
            </tr>
            <tr>
                <td>1.2</td>
                <td>Чтение курсов лекций на иностранном языке направлений подготовки для неязыковых направлений</td>
                <td id="f2"><input type="number" id="first2" oninput="mult(2,'first2','result2')" placeholder="__________"></td>
                <td>Количество штук</td>
                <td id="result2"></td>
                <td><input type="file" name="files1[]" class = "1"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.3</td>
                <td td colspan="6">Разработка ООП по программам бакалавриата, специалитета, магистратуры, аспирантуры</td>
            </tr>
            <tr class="box">
                <td>1.3.1</td>
                <td>Новых направлений</td>
                <td><input type="number" id="first3" oninput="mult(10,'first3','result3')" placeholder="__________"></td>
                <td>Количество штук</td>
                <td id="result3"></td>
                <td><input type="file" name="files1[]" class = "1"></td>
            </tr>
            <tr class="box">
                <td>1.3.2</td>
                <td>Дисциплин подготовки</td>
                <td><input type="number" id="first4" oninput="mult(5,'first4','result4')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result4"></td>
                <td><input type="file" name="files1[]" class = "1"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.4</td>
                <td colspan="6">Издание нового авторского (в соавторстве) учебника (учебного пособия) объемом:</td>
            </tr>
            <tr class="box">
                <td>1.4.1</td>
                <td>В зарубежном издательстве или в соавторстве с профессорами зарубежных вузов:</td>
            </tr>
            <tr class="box">
                <td>1.4.2</td>
                <td>Не менее 7 п.л.:</td>
                <td><input type="number" id="first5" oninput="mult(2,'first5','result5')" placeholder="__________"></td>
                <td>Количество печатных листов</td>

                <td id="result5"></td>
                <td><input type="file" name="files1[]" id = "4" class = "1"></td>
            </tr>
            <tr class="box">
                <td>1.4.3</td>
                <td>Не менее 3 п.л.:</td>
                <td><input type="number" id="first6" oninput="mult(1.5,'first6','result6')" placeholder="__________"></td>
                <td>Количество печатных листов</td>

                <td id="result6"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.4.4</td>
                <td>В российском издательстве:</td>
            </tr>
            <tr class="box">
                <td>1.4.5</td>
                <td>Не менее 7 п.л.:</td>
                <td><input type="number" id="first7" oninput="mult(1.5,'first7','result7')" placeholder="__________"></td>
                <td>Количество печатных листов</td>

                <td id="result7"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.4.6</td>
                <td>Не менее 3 п.л.:</td>
                <td><input type="number" id="first8" oninput="mult(1,'first8','result8')" placeholder="__________"></td>
                <td>Количество печатных листов</td>

                <td id="result8"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.5</td>
                <td colspan="6">Переиздание авторского (в соавторстве) учебника (учебного пособия) объемом:</td>
            </tr>
            <tr class="box">
                <td>1.5.1</td>
                <td>Не менее 7 п.л.:</td>
                <td><input type="number" id="first9" oninput="mult(7,'first9','result9')" placeholder="__________"></td>
                <td>Количество учебников</td>

                <td id="result9"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.5.2</td>
                <td>Не менее 3 п.л.:</td>
                <td><input type="number" id="first10" oninput="mult(3,'first10','result10')" placeholder="__________"></td>
                <td>Количество учебников</td>

                <td id="result10"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.6</td>
                <td>Разработка дистанционных курсов обучения студентов на базе Moodle</td>
                <td><input type="number" id="first11" oninput="mult(2,'first11','result11')" placeholder="__________"></td>
                <td>Количество курсов</td>

                <td id="result11"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.7</td>
                <td colspan="6">Издание авторского пособия или методических указаний для самостоятельной работы студентов:</td>
            </tr>
            <tr class="box">
                <td>1.7.1</td>
                <td>По дипломному проектированию</td>
                <td><input type="number" id="first12" oninput="mult(0.5,'first12','result12')" placeholder="__________"></td>
                <td>Количество пособий</td>

                <td id="result12"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.7.2</td>
                <td>По курсовому проектированию</td>
                <td><input type="number" id="first13" oninput="mult(0.5,'first13','result13')" placeholder="__________"></td>
                <td>Количество пособий</td>

                <td id="result13"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.7.3</td>
                <td>Прочие, в том числе расчетно-графические работы</td>
                <td><input type="number" id="first14" oninput="mult(0.5,'first14','result14')" placeholder="__________"></td>
                <td>Количество пособий</td>

                <td id="result14"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.8.</td>
                <td>Подготовка и проведение олимпиад по дисциплинам (межвузовские)</td>
                <td><input type="number" id="first15" oninput="mult(0.5,'first15','result15')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result15"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.9</td>
                <td colspan="6">Руководство студентами, аспирантами - призерами, победителями олимпиад, конкурсов</td>
            </tr>
            <tr class="box">
                <td>1.9.1</td>
                <td>Международных</td>
                <td><input type="number" id="first16" oninput="mult(2,'first16','result16')" placeholder="__________"></td>
                <td>Количество олимпиад</td>

                <td id="result16"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.9.2</td>
                <td>Всероссийских</td>
                <td><input type="number" id="first17" oninput="mult(1.5,'first17','result17')" placeholder="__________"></td>
                <td>Количество олимпиад</td>

                <td id="result17"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.9.3</td>
                <td>Региональных</td>
                <td><input type="number" id="first18" oninput="mult(1,'first18','result18')" placeholder="__________"></td>
                <td>Количество олимпиад</td>

                <td id="result18"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.10</td>
                <td>Победитель конкурса учебников</td>
                <td><input type="number" id="first19" oninput="mult(5,'first19','result19')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result19"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.11</td>
                <td>Выполнение "дорожной карты" на факультете, в институте (нормативное соотношение приведенного контингента студентов к количеству ППС)</td>
                <td><input type="number" id="first20" oninput="mult(0,'first20','result20')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result20"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.12</td>
                <td>Сохранность контингента обучающихся (не менее 90%) в течение учебного года</td>
                <td><input type="number" id="first21" oninput="mult(0,'first21','result21')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result21"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.13</td>
                <td colspan="6">Приглашение в зарубежные вузы и научные центры</td>
            </tr>
            <tr class="box">
                <td>1.13.1</td>
                <td>Чтение курса лекций</td>
                <td><input type="number" id="first22" oninput="mult(3,'first22','result22')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result22"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.13.2</td>
                <td>Выступление с научной статьей и/или докладом</td>
                <td><input type="number" id="first23" oninput="mult(2,'first23','result23')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result23"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.14</td>
                <td>Приглашение в отечественные вузы и научные центры (с докладом, лекцией, модерирование на конференции)</td>
                <td><input type="number" id="first24" oninput="mult(1,'first24','result24')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result24"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>1.15</td>
                <td colspan="6">Издание монографии по направлениям и специальностям Университета</td>
            </tr>
            <tr class="box">
                <td>1.15.1</td>
                <td>В зарубежном издательстве</td>
                <td><input type="number" id="first25" oninput="mult(10,'first25','result25')" placeholder="__________"></td>
                <td>Количество монографии</td>

                <td id="result25"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr class="box">
                <td>1.15.2</td>
                <td>В российском издательстве</td>
                <td><input type="number" id="first26" oninput="mult(5,'first26','result26')" placeholder="__________"></td>
                <td>Количество монографии</td>

                <td id="result26"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <tr>
                <td>1.16</td>
                <td>Участие в работе ГАК в других вузах</td>
                <td><input type="number" id="first27" oninput="mult(0.5,'first27','result27')" placeholder="__________"></td>
                <td>Количество раз</td>

                <td id="result27"></td>
                <td><input type="file" name="files1[]"></td>
            </tr>
            <th colspan="6"><h2 class="mb-5"><center>НАУЧНО-ИССЛЕДОВАТЕЛЬСКАЯ РАБОТА</center></h2></th>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.1</td>
                <td colspan="6">Утверждение в ВАК диссертации преподавателя:</td>
            </tr>
            <tr class="box">
                <td>2.1.1</td>
                <td>Кандидатская диссертация</td>
                <td><input type="number" id="first28" oninput="mult(20,'first28','result28')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result28"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.1.2</td>
                <td>Докторская диссертация</td>
                <td><input type="number" id="first29" oninput="mult(40,'first29','result29')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result29"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.2</td>
                <td colspan="6">Утверждение в ВАК диссертации преподавателя:</td>
            </tr>
            <tr class="box">
                <td>2.2.1</td>
                <td>Кандидатскую диссертацию</td>
                <td><input type="number" id="first30" oninput="mult(2,'first30','result30')" placeholder="__________"></td>
                <td>Количество человек</td>

                <td id="result30"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.3</td>
                <td colspan="6">Научному консультанту преподавателя утвердившего в ВАК:</td>
            </tr>
            <tr class="box">
                <td>2.3.1</td>
                <td>Кандидатскую диссертацию</td>
                <td><input type="number" id="first31" oninput="mult(1,'first31','result31')" placeholder="__________"></td>
                <td>Количество человек</td>

                <td id="result31"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.3.2</td>
                <td>Докторскую диссертацию</td>
                <td><input type="number" id="first32" oninput="mult(2,'first32','result32')" placeholder="__________"></td>
                <td>Количество человек</td>

                <td id="result32"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.4</td>
                <td colspan="6">Награда за участие в научно- исследовательских конкурсах международного, федерального, городского уровня</td>
            </tr>
            <tr class="box">
                <td>2.4.1</td>
                <td>Международного уровня</td>
                <td><input type="number" id="first33" oninput="mult(1,'first33','result33')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result33"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.4.2</td>
                <td>Федерального уровня</td>
                <td><input type="number" id="first34" oninput="mult(0.5,'first34','result34')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result34"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.4.3</td>
                <td>Городского уровня</td>
                <td><input type="number" id="first35" oninput="mult(0.2,'first35','result35')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result35"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.5</td>
                <td colspan="6">Участие в диссертационных советах университета</td>
            </tr>
            <tr class="box">
                <td>2.5.1</td>
                <td>Председатель диссертационного совета</td>
                <td><input type="number" id="first36" oninput="mult(5,'first36','result36')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result36"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.5.2</td>
                <td>Член диссертационного совета</td>
                <td><input type="number" id="first37" oninput="mult(2,'first37','result37')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result37"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.5.3</td>
                <td>Ученый секретарь диссертационного совета</td>
                <td><input type="number" id="first38" oninput="mult(3,'first38','result38')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result38"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.6</td>
                <td colspan="6">Подготовка студентов к выступлению на международных, федеральных, региональных и пр. конференциях</td>
            </tr>
            <tr class="box">
                <td>2.6.1</td>
                <td>Международных конференциях</td>
                <td><input type="number" id="first39" oninput="mult(0.4,'first39','result39')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result39"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.6.2</td>
                <td>Федеральных конференциях</td>
                <td><input type="number" id="first40" oninput="mult(0.3,'first40','result40')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result40"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.6.3</td>
                <td>Региональных конференциях</td>
                <td><input type="number" id="first41" oninput="mult(0.2,'first41','result41')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result41"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.7</td>
                <td colspan="6">Доля студентов, участвующих в НИРС (доклады на научных конференциях, семинарах всех уровней; научные публикации; экспонаты и творческие работы, представленные на выставках с участием студентов)</td>
            </tr>
            <tr class="box">
                <td>2.7.1</td>
                <td>От 5% до 10%</td>
                <td><input type="number" id="first42" oninput="mult(0,'first42','result42')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result42"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.7.2</td>
                <td>От 10% до 20%</td>
                <td><input type="number" id="first43" oninput="mult(0,'first43','result43')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result43"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.7.3</td>
                <td>Свыше 20%</td>
                <td><input type="number" id="first44" oninput="mult(0,'first44','result44')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result44"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.8</td>
                <td>Количество патентов, свидетельств о регистрации результатов интеллектуальной деятельности</td>
                <td><input type="number" id="first45" oninput="mult(0.5,'first45','result45')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result45"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.9</td>
                <td>Выполнение инициативной научно- исследовательской работы, включенной в план НИР кафедры</td>
                <td><input type="number" id="first46" oninput="mult(0.1,'first46','result46')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result46"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.10</td>
                <td colspan="6">Публикация научных статей в индивидуальном порядке:</td>
            </tr>
            <tr class="box">
                <td>2.10.1</td>
                <td>В журнале входящем в список Scopus, Webof Sciens</td>
                <td><input type="number" id="first47" oninput="mult(15,'first47','result47')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result47"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.10.2</td>
                <td>В журналах, индексируемых РИНЦ и рекомендованных ВАК</td>
                <td><input type="number" id="first48" oninput="mult(5,'first48','result48')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result48"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.10.3</td>
                <td>В прочих журналах РИНЦ</td>
                <td><input type="number" id="first49" oninput="mult(1,'first49','result49')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result49"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.11</td>
                <td colspan="6">Публикация научных статей в рамках гранта/софинансирования:</td>
            </tr>
            <tr class="box">
                <td>2.11.1</td>
                <td>В журнале входящем в список Scopus, Webof Sciens</td>
                <td><input type="number" id="first50" oninput="mult(1,'first50','result50')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result50"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.11.2</td>
                <td>В журналах, индексируемых РИНЦ и рекомендованных ВАК</td>
                <td><input type="number" id="first51" oninput="mult(1,'first51','result51')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result51"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.11.3</td>
                <td>В прочих журналах РИНЦ</td>
                <td><input type="number" id="first52" oninput="mult(0.5,'first52','result52')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result52"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.12</td>
                <td>Индекс цитирования ХИРША, 1 h-index = 1балл, но не более 10 баллов</td>
                <td><input type="number" id="first53" oninput="mult(1,'first53','result53')" placeholder="__________"></td>
                <td>h-index</td>

                <td id="result53"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.13</td>
                <td>Увеличение индекса цитирования РИНЦ по сравнению с предыдущим годом, 1 балл РИНЦ = 0.1баллу, но не более 10 баллов</td>
                <td><input type="number" id="first54" oninput="mult(0.1,'first54','result54')" placeholder="__________"></td>
                <td>Количество баллов РИНЦ</td>

                <td id="result54"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.14</td>
                <td colspan="6">Отзыв на автореферат диссертации</td>
            </tr>
            <tr class="box">
                <td>2.14.1</td>
                <td>Докторская диссертация</td>
                <td><input type="number" id="first55" oninput="mult(0.5,'first55','result55')" placeholder="__________"></td>
                <td>Количество отзывов</td>

                <td id="result55"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.14.2</td>
                <td>Кандидатская диссертация</td>
                <td><input type="number" id="first56" oninput="mult(0.2,'first56','result56')" placeholder="__________"></td>
                <td>Количество отзывов</td>

                <td id="result56"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.15</td>
                <td colspan="6">Официальное оппонирование или написание отзыва ведущей организации</td>
            </tr>
            <tr class="box">
                <td>2.15.1</td>
                <td>Докторская диссертация</td>
                <td><input type="number" id="first57" oninput="mult(5,'first57','result57')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result57"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.15.2</td>
                <td>Кандидатская диссертация</td>
                <td><input type="number" id="first58" oninput="mult(3,'first58','result58')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result58"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.16</td>
                <td>Участие в конференциях, семинарах, круглых столах, выставках, форумах с опубликованием статьи, в редакционном совете (редакционной коллегии) журнала издаваемого во внешних редакциях</td>
                <td><input type="number" id="first59" oninput="mult(0.2,'first59','result59')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result59"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.17</td>
                <td colspan="6">Количество студенческих научных проектов, получивших поддержку в грантовых конкурсах разных уровней</td>
            </tr>
            <tr class="box">
                <td>2.17.1</td>
                <td>Международных</td>
                <td><input type="number" id="first60" oninput="mult(0.4,'first60','result60')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result60"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.17.2</td>
                <td>Всероссийских</td>
                <td><input type="number" id="first61" oninput="mult(0.3,'first61','result61')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result61"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.17.3</td>
                <td>Региональных</td>
                <td><input type="number" id="first62" oninput="mult(0.2,'first62','result62')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result62"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.18</td>
                <td>Привлечение средств на НИР из внебюджетных источников, 2 балла за каждые 100 тыс.руб. поступивших на счет Университета</td>
                <td><input type="number" id="first63" oninput="mult(2,'first63','result63')" placeholder="__________"></td>
                <td>Количество рублей</td>

                <td id="result63"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.19</td>
                <td>Получение дохода от внедрения результатов интеллектуальной деятельности, 2 балла за каждые 100 тыс.руб. поступивших на счет Университета</td>
                <td><input type="number" id="first64" oninput="mult(2,'first64','result64')" placeholder="__________"></td>
                <td>Количество рублей</td>

                <td id="result64"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr>
                <td>2.20</td>
                <td>Организация работы СНО</td>
                <td><input type="number" id="first65" oninput="mult(4,'first65','result65')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result65"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>2.21</td>
                <td colspan="6">Участие в деятельности научно-теоретического журнала «Ученые записки РГГМУ»</td>
            </tr>
            <tr class="box">
                <td>2.21.1</td>
                <td>Член редколлегии</td>
                <td><input type="number" id="first66" oninput="mult(0.2,'first66','result66')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result66"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <tr class="box">
                <td>2.21.2</td>
                <td>Рецензирование статейх</td>
                <td><input type="number" id="first67" oninput="mult(0.2,'first67','result67')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result67"></td>
                <td><input type="file" name="files2[]"></td>
            </tr>
            <th colspan="6"><h2 class="mb-5"><center>УЧЕБНО - ВОСПИТАТЕЛЬНАЯ РАБОТА</center></h2></th>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>3.1</td>
                <td colspan="6">Проведение мероприятий по профессиональной ориентации и привлечению абитуриентов: прирост численности студентов, принятых в текущем учебном году к уровню предыдущего периода на контрактной основе</td>
            </tr>
            <tr class="box">
                <td>3.1.1</td>
                <td>От 5% до 10%</td>
                <td><input type="number" id="first68" oninput="mult(2,'first68','result68')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result68"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="box">
                <td>3.1.2</td>
                <td>От 10% до 20%</td>
                <td><input type="number" id="first69" oninput="mult(2.5,'first69','result69')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result69"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="box">
                <td>3.1.3</td>
                <td>Свыше 20%</td>
                <td><input type="number" id="first70" oninput="mult(3,'first70','result70')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result70"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>3.2</td>
                <td colspan="6">Доля преподавателей, участвующих в студенческих мероприятиях</td>
            </tr>
            <tr class="box">
                <td>3.2.1</td>
                <td>От 5% до 10%</td>
                <td><input type="number" id="first71" oninput="mult(0,'first71','result71')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result71"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="box">
                <td>3.2.2</td>
                <td>От 10% до 20%</td>
                <td><input type="number" id="first72" oninput="mult(0,'first72','result72')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result72"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="box">
                <td>3.2.3</td>
                <td>Свыше 20%</td>
                <td><input type="number" id="first73" oninput="mult(0,'first73','result73')" placeholder="__________"></td>
                <td>Количество процентов</td>

                <td id="result73"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr>
                <td>3.3</td>
                <td>Кураторская работа</td>
                <td><input type="number" id="first74" oninput="mult(2,'first74','result74')" placeholder="__________"></td>
                <td>Количество групп</td>

                <td id="result74"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr>
                <td>3.4</td>
                <td>Ведение сборных команд Университета</td>
                <td><input type="number" id="first75" oninput="mult(5,'first75','result75')" placeholder="__________"></td>
                <td>Количество комманд</td>

                <td id="result75"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="parent">
                <td class="control control--checkbox">
                    <input type="checkbox"/>3.5</td>
                <td colspan="6">Присуждение призовых мест (1,2,3 место) студентам во внешних, межвузовских спортивных мероприятиях (соревнования, конкурсы, смотры и т.п.)</td>
            </tr>
            <tr class="box">
                <td>3.5.1</td>
                <td>1-место/td>
                <td><input type="number" id="first76" oninput="mult(10,'first76','result76')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result76"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="box">
                <td>3.5.2</td>
                <td>2-место</td>
                <td><input type="number" id="first77" oninput="mult(7,'first77','result77')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result77"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr class="box">
                <td>3.5.3</td>
                <td>3-место</td>
                <td><input type="number" id="first78" oninput="mult(4,'first78','result78')" placeholder="__________"></td>
                <td>Цифра</td>

                <td id="result78"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr>
                <td>3.6</td>
                <td>Работа в комиссиях, созданных по приказу ректора</td>
                <td><input type="number" id="first79" oninput="mult(0.5,'first79','result79')" placeholder="__________"></td>
                <td>Количество штук</td>

                <td id="result79"></td>
                <td><input type="file" name="files3[]"></td>
            </tr>
            <tr>
                <td></td>
                <td><a class="floating-buttonSvod" onclick="sumballAll()">Количество баллов</a></td>
                <td colspan="3">Предполагаемое количество баллов:</td>
                <td><label id='result'></label></td>
            </tr>

        </table>
    </div>
    </div>
    <center><input name="uploadBtn" type='submit' value="Отправить" href="" class="floating-button" onclick="a()"/></center>
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