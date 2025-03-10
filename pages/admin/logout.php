<?php
session_start();
require '../../config/db.php';
unset($_SESSION['a_id']);
unset($_SESSION['role']);
echo "<script>alert('ออกจากระบบสำเร็จ'); window.location='../../index.php';</script>";

