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
                                <img src="https://cdn-icons-png.freepik.com/512/149/149071.png" class="avatar img-fluid"
                                    alt="">Username
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" href="#">ตั้งค่า</a></li>
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
                    <form class="form-horizontal" action="{{ url('update-user/' . $hrs->hr_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- กล่องข้อความ Username -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                                <div class="col-sm-10">
                                    <label for="name"
                                        class="col-sm-2 col-form-label">{{ $hrs->hr_username }}</label>
                                </div>
                            </div>
                            <!-- กล่องข้อความ FirstName -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">ชื่อ - นามสกุล</label>
                                <div class="col-sm-10">
                                    <label for="name"
                                        class="col-sm-2 col-form-label">{{ $hrs->hr_firstname . ' ' . $hrs->hr_lastname }}</label>
                                </div>
                            </div>
                            <!-- กล่องข้อความ Email -->
                            {{-- <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">อีเมล</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div> --}}
                            <!-- กล่องข้อความ รหัสผ่าน -->
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">อัพเดท</button>
                            <a href="#" class="btn btn-default float-right">ยกเลิก</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
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
    </script>
</body>

</html>
