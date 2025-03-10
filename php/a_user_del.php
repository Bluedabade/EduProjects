<?php
session_start();
require '../config/db.php';
if (isset($_GET['me_id'])) {
    $me_id = $_GET['me_id'];
    $sql_del = "DELETE FROM `ed_member` WHERE `me_id` = '$me_id'";
    if($conn -> query($sql_del) === true){
        echo "<script>alert('ทำรายการสำเร็จ'); window.location='./../pages/admin/user_manage.php';</script>";
    }
}
