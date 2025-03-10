<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduProjects</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fonts.css">
    <link rel="stylesheet" href="./assets/imgpreview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EPs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ค้นหา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ข้อมูลส่วนตัว</a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                เข้าสู่ระบบ
            </button>

            <!-- Modal -->
            <div class="modal fade text-light" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เข้าสู่ระบบ / ลงทะเบียน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Tab Navigation -->
                            <ul class="nav nav-tabs" id="authTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                        type="button" role="tab" aria-controls="login" aria-selected="true">เข้าสู่ระบบ</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                                        type="button" role="tab" aria-controls="register" aria-selected="false">ลงทะเบียน</button>
                                </li>
                            </ul>

                            <div class="tab-content mt-3" id="authTabsContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                    <form action="./php/login.php" method="post">
                                        <!-- ชื่อผู้ใช้ -->
                                        <div class="mb-3">
                                            <label class="form-label">ชื่อผู้ใช้</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้" required>
                                            </div>
                                        </div>

                                        <!-- รหัสผ่าน -->
                                        <div class="mb-3">
                                            <label class="form-label">รหัสผ่าน</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                                <input name="pass" type="password" class="form-control" placeholder="รหัสผ่าน" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="./php/signup.php" method="post" enctype="multipart/form-data">

                                        <!-- ชื่อผู้ใช้ -->
                                        <div class="mb-3">
                                            <label class="form-label">ชื่อผู้ใช้</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้" required>
                                            </div>
                                        </div>

                                        <!-- รหัสผ่าน -->
                                        <div class="mb-3">
                                            <label class="form-label">รหัสผ่าน</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                                <input name="pass" type="password" class="form-control" placeholder="รหัสผ่าน" required>
                                            </div>
                                        </div>

                                        <!-- อัปโหลดรูปโปรไฟล์ -->
                                        <div class="mb-3 text-center">
                                            <label class="form-label">ภาพโปรไฟล์</label>
                                            <img src="https://via.placeholder.com/120" alt="Profile Picture" id="imgPreview">
                                            <input name="img" type="file" class="form-control mt-2" id="imgInput" accept="image/*">
                                        </div>

                                        <!-- ชื่อและนามสกุล -->
                                        <div class="mb-3">
                                            <label class="form-label">ชื่อ - นามสกุล</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                                <input name="firstname" type="text" class="form-control" placeholder="ชื่อ" required>
                                                <input name="lastname" type="text" class="form-control" placeholder="นามสกุล" required>
                                            </div>
                                        </div>

                                        <!-- แผนก -->
                                        <div class="mb-3">
                                            <label class="form-label">แผนก</label>
                                            <select name="department" class="form-select">
                                                <option selected disabled>เลือกแผนก</option>
                                                <option value="1">แผนก 1</option>
                                                <option value="2">แผนก 2</option>
                                                <option value="3">แผนก 3</option>
                                            </select>
                                        </div>

                                        <!-- รหัสนักศึกษา -->
                                        <div class="mb-3">
                                            <label class="form-label">รหัสนักศึกษา (11 หลัก)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-card-list"></i></span>
                                                <input name="std_id" type="text" class="form-control" placeholder="รหัสนักศึกษา" maxlength="11" pattern="\d{11}" required>
                                            </div>
                                        </div>

                                        <!-- รายละเอียดเพิ่มเติม -->
                                        <div class="mb-3">
                                            <label class="form-label">รายละเอียดเพิ่มเติม (เว้นว่างได้)</label>
                                            <textarea name="details" class="form-control" rows="3"></textarea>
                                        </div>

                                        <!-- ปุ่มลงทะเบียน -->
                                        <button type="submit" class="btn btn-success w-100">ลงทะเบียน</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


</body>
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/imgpreview.js"></script>

</html>