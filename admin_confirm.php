<?php
session_start();
require('connect.php');

if (isset($_GET['selected_docs'])) {
    $selectedDocs = $_GET['selected_docs'];
    if (!is_array($selectedDocs)) {
        // Преобразование строки в массив
        $selectedDocs = explode(',', $selectedDocs);
    }
    // Обработка выбранных документов
    foreach ($selectedDocs as $docId) {
        $update_docs = "UPDATE docs SET checked = 1 WHERE id_doc = '$docId'";
        mysqli_query($connection, $update_docs);
    }
    $update_eff_contract =
        'UPDATE eff_contract ec
        SET ec.checked = 1
        WHERE ec.id_ek IN (
          SELECT d.id_ek
          FROM docs d
          WHERE d.checked = 1
          GROUP BY d.id_ek
          HAVING COUNT(*) = (
            SELECT COUNT(*)
            FROM docs
            WHERE id_ek = d.id_ek
          )
        );
        ';
    mysqli_query($connection, $update_eff_contract);
    echo '<script type="text/javascript">
            alert("Файлы успешно проверены");
        </script>';

    header('Location:adminpanel.php');
    exit();
} else {
    echo '<script type="text/javascript">
            alert("Произошла ошибка при подтверждении");
        </script>';
}
?>
