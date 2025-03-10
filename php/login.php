<?php
session_start();
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    $sql_me = "SELECT * FROM `ed_member` WHERE `me_user`= '$username'";
    $result_me = $conn->query($sql_me);
    $row_me = $result_me->fetch_assoc();
    if (!empty($row_me)) {
        if (password_verify($_POST['pass'], $row_me['me_pass'])) {
            if ($row_me['me_permis'] == 1) {
                switch ($row_me['me_role']) {
                    case 'admin':
                        $path = '../pages/admin/index.php';
                        $_SESSION['a_id'] = $row_me['me_id'];
                        $_SESSION['role'] = $row_me['me_role'];
                        break;
                    case 'std':
                        $path = '../pages/user/index.php';
                        $_SESSION['s_id'] = $row_me['me_id'];
                        break;
                }
                echo "<script>alert('ยินดีต้อนรับ'); window.location='$path';</script>";
            } else {
                echo "<script>alert('คุณยังไม่ได้รับการอนุมัติ'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('รหัสผ่านผิด'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('ชื่อผู้ใช้ไม่ถูกต้อง'); window.history.back();</script>";
    }
}
