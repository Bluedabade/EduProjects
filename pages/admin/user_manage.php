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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* ปรับขนาดรูปโปรไฟล์ในตาราง */
        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* ปรับขนาดปุ่ม */
        .btn-sm {
            width: 6rem;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">EPs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">เล่มโครงการ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="user_manage.php">จัดการผู้ใช้</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ข้อมูลส่วนตัว</a></li>
                </ul>
                <a class="btn btn-outline-danger" onclick="return confirm('ยืนยันการออกจากระบบ?')" href="./logout.php">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center mb-3">จัดการผู้ใช้</h3>

        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="ค้นหาผู้ใช้... (ชื่อ, รหัสนักศึกษา)">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รูปโปรไฟล์</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>แผนก</th>
                        <th>รหัสนักศึกษา</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <?php
                    $sql_me = "SELECT * FROM ed_member WHERE me_role != 'admin'";
                    $result_me = $conn->query($sql_me);
                    while ($row_me = $result_me->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo $row_me['me_id'] ?></td>
                            <td><?php echo htmlspecialchars($row_me['me_user']) ?></td>
                            <td>
                                <img src="../../uploads/<?php echo htmlspecialchars($row_me['me_img']) ?>" class="profile-img" alt="Profile">
                            </td>
                            <td><?php echo htmlspecialchars($row_me['me_firstname']) ?></td>
                            <td><?php echo htmlspecialchars($row_me['me_lastname']) ?></td>
                            <td><?php echo htmlspecialchars($row_me['me_department']) ?></td>
                            <td><?php echo htmlspecialchars($row_me['me_std_id']) ?></td>
                            <td><?php echo htmlspecialchars($row_me['me_detail']) ?></td>
                            <td>
                                <?php if ($row_me['me_permis'] == 0): ?>
                                    <span class="badge bg-warning">รออนุมัติ</span>
                                <?php else: ?>
                                    <span class="badge bg-success">อนุมัติแล้ว</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($row_me['me_permis'] == 0): ?>
                                    <a class="btn btn-success btn-sm" onclick="return confirm('ยืนยันการอนุมัติ <?php echo $row_me['me_user'] ?>?')"
                                        href="../../php/a_user_app.php?me_id=<?php echo $row_me['me_id'] ?>&me_permis=<?php echo $row_me['me_permis'] ?>">
                                        <i class="bi bi-check-circle"></i> อนุมัติ
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-warning btn-sm" onclick="return confirm('ยกเลิกการอนุมัติ <?php echo $row_me['me_user'] ?>?')"
                                        href="../../php/a_user_app.php?me_id=<?php echo $row_me['me_id'] ?>&me_permis=<?php echo $row_me['me_permis'] ?>">
                                        <i class="bi bi-x-circle"></i> ยกเลิก
                                    </a>
                                <?php endif; ?>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ <?php echo $row_me['me_user'] ?>?')" href="../../php/a_user_del.php?me_id=<?php echo $row_me['me_id'] ?>">
                                    <i class="bi bi-trash"></i> ลบ
                                </a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#userTable tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>

</body>
<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>