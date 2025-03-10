<?php
session_start();
require '../../config/db.php';
if (!$_SESSION['a_id'] && $_SESSION['role'] != "admin") {
    echo "<script>alert('กรุณาเข้าสู่ระบบ'); window.location='../../index.php';</script>";
}
