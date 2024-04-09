<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การตั้งค่าโปรไฟล์</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset\dist\css\style.css') }}">
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class='bx bx-menu'></i>
                </button>

                <div class="sidebar-logo">
                    <span class="image">
                        <img src="https://blog.clicknext.com/wp-content/themes/clicknext_blog2/assets/images/clicknext-logo.png"
                            alt="logo">
                    </span>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class='bx bxs-dashboard'></i>
                        <span>แดชบอร์ด</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                        aria-expanded="false" aria-controls="auth">
                        <i class='bx bxs-food-menu'></i>
                        <span>ฟอร์ม</span>
                    </a>
                    <div id="auth" class="sidebar-dropdown collapse">
                        <ul class="list-unstyled">
                            <li class="sidebar-item">

                                <a href="#" class="sidebar-link"><i
                                        class='bx bx-chevron-right'></i>สร้างฟอร์มรับสมัคร</a>
                            </li>
                            <li class="sidebar-item">

                                <a href="/myform" class="sidebar-link"><i
                                        class='bx bx-chevron-right'></i>ฟอร์มของฉัน</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a href="/information" class="sidebar-link">
                        <i class='bx bxs-info-circle'></i>
                        <span>ข้อมูล</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class='bx bx-log-out'></i>
                    <span>ออกจากระบบ</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand-lg px-4 py-3">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="Unknown_person.jpg" class="avatar img-fluid" alt="">Username
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" href="">ตั้งค่า</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">การตั้งค่า</h3>
                    </div>
                    @foreach ($hrs as $hr)
                        <form class="form-horizontal" action="/update-profile" method="post"
                            enctype="multipart/form-data">
                            <!-- Form fields... -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $hr->hr_firstname }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="surname" class="col-sm-2 col-form-label">นามสกุล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            value="{{ $hr->hr_lastname }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">อีเมล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">โทรศัพท์</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="old_password" class="col-sm-2 col-form-label">รหัสผ่านเก่า</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="old_password"
                                            name="old_password" value="{{ $hr->hr_password }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_password"
                                        class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">อัปเดต</button>
                                <a href="{{ url('/main') }}" class="btn btn-default float-right">Cancel</a>
                            </div>

                        </form>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

        document.querySelector(".form-horizontal").addEventListener("submit", function(event) {
            event.preventDefault(); // ป้องกันการส่งฟอร์มเป็นวิธีการที่ไม่ใช่จาก JavaScript
            const formData = new FormData(this);

            fetch('/update-profile', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // ทำสิ่งที่คุณต้องการหลังจากที่ได้รับการตอบกลับจากเซิร์ฟเวอร์ เช่น แสดงข้อความว่าอัปเดตสำเร็จ
                    console.log('Update successful:', data);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        });

        const express = require('express');
        const bodyParser = require('body-parser');
        const app = express();

        // เรียกใช้ middleware เพื่อให้ Express สามารถอ่านข้อมูลที่ถูกส่งมาจากฟอร์มได้
        app.use(bodyParser.urlencoded({
            extended: true
        }));
        app.use(bodyParser.json());

        // กำหนดเส้นทางสำหรับการอัปเดตข้อมูลผู้ใช้
        app.post('/update-profile', (req, res) => {
            const userData = req.body;
            // ทำตามขั้นตอนที่เหมาะสมเพื่ออัปเดตข้อมูลผู้ใช้ในฐานข้อมูลของคุณ
            // ตัวอย่างเช่น: ใช้ ORM หรือการเขียนคำสั่ง SQL เพื่ออัปเดตข้อมูลผู้ใช้
            res.json({
                message: 'User profile updated successfully'
            });
        });

        app.listen(3000, () => console.log('Server is running on port 3000'));
    </script>
</body>

</html>
