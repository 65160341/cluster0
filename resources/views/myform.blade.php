<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบรับสมัครพนักงงาน</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="styleTest.css"> --}}
    <link rel="stylesheet" href="{{ asset('asset\dist\css\page.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
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

                                <a href="#" class="sidebar-link"><i
                                        class='bx bx-chevron-right'></i>ฟอร์มของฉัน</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
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
                                <li><a class="dropdown-item" href="#">โปรไฟล์</a></li>
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
                <div class="container-fluid">
                    <div class="mb-3">

                        <div class="row align-items-center mb-3">
                            <div class="col-auto">
                                <span>ปีที่เปิดรับสมัคร</span>
                            </div>
                            <div class="col-auto">
                                <select class="form-select shadow sm-1 mb-1 bg-body rounded" aria-label="Default select example">
                                    <option selected>ปีที่รับสมัคร</option>
                                    <option value="1">2024</option>
                                    <option value="2">2023</option>
                                    <option value="3">2022</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-12 columnset">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="150px">รอบการรับสมัคร</th>
                                        <th width="200px">รายละเอียด</th>
                                        <th width="200px">วันที่เปิดรับ</th>
                                        <th width="200px">วันที่สิ้นสุด</th>
                                        <th width="200px">สถานะ</th>
                                        <th width="200px" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1/2024</td>
                                        <td>ฟดฟดฟดหห</td>
                                        <td>01/08/2024</td>
                                        <td>07/08/2024</td>
                                        <td><font style="color:#E8042C">ปิดรับสมัคร</font></td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2/2024</td>
                                        <td>รับสมัครที่</td>
                                        <td>01/11/2024</td>
                                        <td>01/18/2024</td>
                                        <td>ปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3/2024</td>
                                        <td>ฟกดฟกดฟดฟ</td>
                                        <td>01/19/2024</td>
                                        <td>01/22/2024</td>
                                        <td>เปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4/2024</td>
                                        <td>รับสมัครที่มฟหกฟฟเฟเฟหเ</td>
                                        <td>01/24/2024</td>
                                        <td>01/31/2024</td>
                                        <td>ปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5/2024</td>
                                        <td>รับสมัครที่ม.หัวเฉียว</td>
                                        <td>02/01/2024</td>
                                        <td>02/08/2024</td>
                                        <td>เปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6/2024</td>
                                        <td>รับสมัครที่ม.ธรรมศาสตร์</td>
                                        <td>02/01/2024</td>
                                        <td>02/08/2024</td>
                                        <td>เปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7/2024</td>
                                        <td>รับสมัครที่ม.เกษตร</td>
                                        <td>02/01/2024</td>
                                        <td>02/08/2024</td>
                                        <td>ปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8/2024</td>
                                        <td>รับสมัครที่ม.บูรพา</td>
                                        <td>02/01/2024</td>
                                        <td>02/08/2024</td>
                                        <td>เปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9/2024</td>
                                        <td>-</td>
                                        <td>02/01/2024</td>
                                        <td>02/08/2024</td>
                                        <td>เปิดรับสมัคร</td>
                                        <td><button class="btn btn-primary">ตรวจสอบ</button>
                                            <button class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
          var table = $('#example').DataTable({
            columnDefs: [
              { className: 'text-center', targets: [0, 1, 2, 3, 4] }
            ],
            stateSave: true
          });
        });
        </script>
</body>

</html>
