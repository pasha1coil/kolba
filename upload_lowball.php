<?php // Загрузка понижающих показателей (управление) Комментарий: не работает
session_start();
require("connect.php");
$id_ek = $_SESSION['id_ek_for_lowball'];
$username_for_lowball = mysqli_query($connection, "SELECT login FROM employees WHERE educator_id = (SELECT educator_id FROM eff_contract WHERE id_ek = $id_ek);")->fetch_assoc()['login'];
$_SESSION['username_for_lowball'] = $username_for_lowball;
$educator_id_for_lowball = mysqli_query($connection, "SELECT educator_id FROM eff_contract WHERE id_ek = $id_ek")->fetch_assoc()['educator_id'];
$_SESSION['educator_id_for_lowball'] = $educator_id_for_lowball;
$date = mysqli_query($connection, "SELECT DATE_FORMAT(docs.id_period, '%y-%m-%d') AS date 
                    FROM docs WHERE `id_ek` = $id_ek;")->fetch_assoc()['date'];
$_SESSION['date'] = $date;
$FileDir = "./upload_files/$username_for_lowball/$date/";

$numfiles4 = count($_FILES['files4']['tmp_name']);
$_SESSION['numfiles4']=$numfiles4;
if(isset($_POST['lowballUploadBtn'])) {

    if (!empty($_FILES['files4']['name'])) {
        require_once("upload4.php"); // Загрузка файлов ПОНИЖАЮЩИЕ ПОКАЗАТЕЛИ
    }
}

