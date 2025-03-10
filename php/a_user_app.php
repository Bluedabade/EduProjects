<?php
session_start();
require '../config/db.php';
if (isset($_GET['me_id'], $_GET['me_permis'])) {
    $permis = 0;
    $me_id = filter_input(INPUT_GET, 'me_id', FILTER_VALIDATE_INT);
    $me_permis = filter_input(INPUT_GET, 'me_permis', FILTER_VALIDATE_INT);
    if ($me_permis == 0) {
        $permis = 1;
    }
    $sql_up = "UPDATE `ed_member` SET `me_permis`= '$permis' WHERE `me_id` = '$me_id' ";
    if ($conn->query($sql_up) === true) {
        echo "<script>alert('ทำรายการสำเร็จ'); window.location='./../pages/admin/user_manage.php';</script>";
    }
}
