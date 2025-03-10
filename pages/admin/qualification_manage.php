<?php
require './session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduProjects</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts.css">
    <link rel="stylesheet" href="../../assets/imgpreview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">EPs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">เล่มโครงการ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_manage.php">จัดการผู้ใช้</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">เล่มโครงการ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ข้อมูลส่วนตัว</a>
                    </li>
                </ul>
            </div>

            <a class="btn btn-outline-danger" onclick="return confirm('ยืนยันการออกจากระบบ?')" href="./logout.php">ออกจากระบบ</a>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>


</body>
<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/imgpreview.js"></script>

</html>