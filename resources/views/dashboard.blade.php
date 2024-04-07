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
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:wght@300;400;500;600;700&display=swap');

        ::after,
        ::before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        header .sidebar-logo .header-text {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo img {
            width: 150px;
            /* ปรับขนาดภาพ */
            height: 110%;
            object-fit: cover;
            /* ปรับขนาดภาพให้พอดีกับขนาดที่กำหนด */
        }

        /* ปรับตำแหน่งของ logo */
        .sidebar-logo {
            margin: 20px auto;
            /* ตำแหน่งตามต้องการ */
        }

        /* แก้ไขมา */
        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
        }

        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
            background-color: #d5d5d5;
            min-width: 0;
        }

        #sidebar {
            width: 70px;
            min-width: 70px;
            z-index: 1000;
            transition: all .25s ease-in-out;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
        }

        #sidebar.expand {
            width: 260px;
            min-width: 260px;
        }

        .toggle-btn {
            background-color: transparent;
            cursor: pointer;
            border: 0;
            padding: 1rem 1.5rem;
        }

        .toggle-btn i {
            font-size: 1.5rem;
            color: #000000;
        }

        .sidebar-logo {
            margin: auto 0;
        }

        .sidebar-logo a {
            color: #ff0000;
            font-size: 1.15rem;
            font-weight: 600;
        }

        #sidebar:not(.expand) .sidebar-logo,
        #sidebar:not(.expand) a.sidebar-link span {
            display: none;
        }

        #sidebar.expand .sidebar-logo,
        #sidebar.expand a.sidebar-link span {
            animation: fadeIn .25s ease;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .sidebar-nav {
            padding: 2rem 0;
            flex: 1 1 auto;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #000000;
            display: block;
            font-size: 0.9rem;
            white-space: nowrap;
            border-left: 3px solid transparent;
        }

        .sidebar-link i,
        .dropdown-item i {
            font-size: 1.1rem;
            margin-right: .75rem;
        }

        a.sidebar-link:hover {
            background-color: red;
            border-left: 3px solid #3b7ddd;
        }

        .sidebar-item {
            position: relative;
        }

        #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
            position: absolute;
            top: 0;
            left: 70px;
            background-color: #0e2238;
            padding: 0;
            min-width: 15rem;
            display: none;
        }

        #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
            display: block;
            max-height: 15em;
            width: 100%;
            opacity: 1;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        .navbar {
            background-color: #ff0000;
            box-shadow: 0 0 2rem 0 rgba(33, 37, 41, .1);
        }

        .navbar-expand .navbar-collapse {
            min-width: 200px;
        }

        .avatar {
            height: 40px;
            width: 40px;
        }

        .sidebar-item.active a.sidebar-link {
            background-color: red;
            color: white;
            border-left: 3px solid #3b7ddd;
        }

        @media (min-width: 768px) {}
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
                    <a href="#/dashboard" class="sidebar-link">
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
                        
                        <h4>
                            <label for="รอบการรับสมัคร">รอบการรับสมัคร</label>
                            <input type="month">ระยะเวลาการรับสมัคร
                            <label for="รายละเอียดเพิ่มเติม">รายละเอียดเพิ่มเติม</label>
                            <input type="text" id="fname" name="fname"><br><br>
                        </h4>
                        <body>
                            <!-- Button trigger modal -->
                            <style>
                                .btn-primary {
                                    background-color: #FF0000; /* สีส้ม */
                                    color: white; /* สีของตัวอักษร */
                                }
                            </style>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                           + เพิ่มรายการรับสมัคร
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <!-- <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> -->
                                <div class="modal-body">
                                  <div class="container">
                                    <h2 class="text-center">เพิ่มรายการรับสมัคร</h2>
                                    <div class="row mt-5" style="display: flex">
                                        <div class="col">
                                            ลักษณะงาน
                                        </div>
                                        <div class="col">
                                            <div class="dropdown float-left">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    ลักษณะงาน
                                                </a>
                                              
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <li><a class="dropdown-item" href="#">สมัครงาน</a></li>
                                                  <li><a class="dropdown-item" href="#">สหกิจศึกษา</a></li>
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            ตำแหน่ง
                                        </div>
                                        <div class="col">
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" >
                                                    ตำแหน่งงาน
                                                </a>
                                              
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <li><a class="dropdown-item" href="#">Developper</a></li>
                                                  <li><a class="dropdown-item" href="#">Programmer</a></li>
                                                  <li><a class="dropdown-item" href="#">Tester</a></li>
                                                  <li><a class="dropdown-item" href="#">System Analyst</a></li>
                                                  <li><a class="dropdown-item" href="#">UI Design</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            จำนวนที่รับสมัคร
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" style="font-size: 12px; width: 125px;">

                                        </div>
                                    </div>
                        
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>
                                            <button class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                        </div>
                                        <div>
                                            <button class="btn btn-success" data-bs-dismiss="modal">ยืนยัน</button>
                                            
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </body>
    
                        
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ลักษณะงาน</th>
                                            <th scope="col">ตำแหน่ง</th>
                                            <th scope="col">จำนวนการรับสมัคร</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>สหกิจศึกษา</td>
                                            <td>Developper</td>
                                            <td>10</td>
                                            
                                            <td ><a href="#แก้ไข" style="color:rgb(56, 255, 1);">แก้ไข</a></td>

                                            <td ><a href="#ลบ" style="color:rgb(212, 6, 6);">ลบ</a></td>
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" >สร้างฟอร์มและคิวอาร์โค้ด</button>
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
</body>

</html>
