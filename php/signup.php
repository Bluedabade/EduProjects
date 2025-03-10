<?php
session_start();
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];
    $std_id = $_POST['std_id'];
    $details = $_POST['details'];

    $temp = explode('.', $_FILES['img']['name']);
    $filename = rand() . '.' . end($temp);
    $filepath = "../uploads/" . $filename;

    $sql_me = "SELECT * FROM `ed_member` WHERE `me_user`= '$username'";
    $result_me = $conn->query($sql_me);
    $row_me = $result_me->fetch_assoc();
    if (empty($row_me)) {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $filepath)) {
            $sql_ins = "INSERT INTO `ed_member`(`me_user`, `me_pass`, `me_img`, `me_firstname`, `me_lastname`, `me_department`, `me_std_id`, `me_detail`) 
            VALUES ('$username','$hash','$filename','$firstname','$lastname','$department','$std_id','$details')";
            if ($conn->query($sql_ins) === true) {
                echo "<script>alert('สมัครใช้งานเสร็จสิ้นกรุณาเข้าสู่ระบบ'); window.location='../index.php';</script>";
            }
        } else {
            echo "<script>alert('อัพโหลดไฟล์ภาพไม่สำเร็จ'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('มีชื่อผู้ใช้นี้อยู่แล้ว'); window.history.back();</script>";
    }
}
