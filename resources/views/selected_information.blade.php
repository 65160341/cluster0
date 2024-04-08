<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงผลผู้สมัครที่คัดเลือก</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


        /* หน้า Model Title  */
        .modal-content {
            text-align: center;
        }

        .modal-header img {
            display: block;
            margin: auto;
        }

        .modal-body p {
            text-align: center;
        }

        .modal-footer {
            display: flex;
            justify-content: space-around;
        }

        .modal-footer .btn {
            margin: 0;
        }



        /* ================  */

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
                    <a href="/dashboard" class="sidebar-link">
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
                    <div class="mb-3 d-flex align-items-center">
                        <h4 class="me-3">สถานะการคัดเลือก : </h4>
                        <div class="dropdown shadow-sm">
                            <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ยังไม่ได้คัดเลือก
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">คัดเลือกแล้ว</a></li>
                            </ul>
                        </div>
                        <div class="mb-3 d-flex align-items-center ms-auto"> <!-- เพิ่ม class ms-auto -->
                            <div class="dropdown shadow-sm">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    ข้อมูลทั้งหมด
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <!-- เปลี่ยนตำแหน่งของ dropdown-menu ไปอยู่ท้ายสุด -->
                                    <li><a class="dropdown-item" href="#">ข้อมูลที่เปิดเผย</a></li>
                                    <li><a class="dropdown-item" href="#">ข้อมูลที่ซ่อนไว้</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">
                                        <div class="dropdown">
                                            <button class="btn btn-white dropdown-toggle" type="button"
                                                id="selectionStatusDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                ลักษณะงาน
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="selectionStatusDropdown">
                                                <li><a class="dropdown-item" href="#">สหกิจศึกษา</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">สมัครงาน</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="dropdown">
                                            <button class="btn btn-white dropdown-toggle" type="button"
                                                id="selectionStatusDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                ตำแหน่งงาน
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="selectionStatusDropdown">
                                                <li><a class="dropdown-item" href="#">Developer</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Programmer</a></li>
                                                <li><a class="dropdown-item" href="#">Tester</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">System Analyst</a></li>
                                                <li><a class="dropdown-item" href="#">Fullstack Developer</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Fronted Developer</a></li>
                                                <li><a class="dropdown-item" href="#">Backend Developer</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Ui Design</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th scope="col">วันที่ตอบรับ</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">ฟอร์ม</th>
                                </tr>
                            </thead>
                            <tbody id="my_tbody">
                                    <tr>
                                       <td>{{ $user->app_firstname . ' ' . $user->app_lastname }}</td>
                                       <td></td>
                                       <td>{{ $pos_name }}</td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="/selected" role="button">กลับไปหน้าคัดเลือก</a>
                    </div>
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

        const viewButtons = document.querySelectorAll(".userinfo");

        viewButtons.forEach(button => {
            button.addEventListener("click", function() {
                // เมื่อคลิกปุ่ม "view" ดึงข้อมูล ID ของรายการที่เกี่ยวข้อง
                const userId = this.getAttribute("data-id");

                // แสดงข้อความ ID ของผู้ใช้
                alert("ID ของผู้ใช้: " + userId);

                // สามารถดำเนินการโหลดข้อมูลผู้ใช้และแสดงในโมดัลหรือหน้าใหม่ต่อไปได้
                // showModalWithUserInfo(userId);  // หรืออื่น ๆ
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const selectButtons = document.querySelectorAll('.btn-success');
            const modal = document.querySelector('.modal');
            const closeModalButtons = document.querySelectorAll('.btn-close, [data-bs-dismiss="modal"]');
            const confirmButton = document.getElementById('confirmButton'); // ดำเนินการเปลี่ยนนี้

            selectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // แสดงหน้า Modal เมื่อคลิกปุ่ม "คัดเลือก"
                    modal.style.display = 'block';
                    // กำหนดข้อความใน Modal title ตามที่ต้องการ
                    document.querySelector('.modal-title').innerText = 'Modal title';
                });
            });

            // เพิ่มการปิด Modal เมื่อคลิกที่ปุ่มปิดหรือพื้นหลังภายนอก Modal
            closeModalButtons.forEach(closeButton => {
                closeButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            });

            // เพิ่มการแสดงข้อความ "คัดเลือกเสร็จสิ้น" เมื่อกดปุ่มยืนยัน
            confirmButton.addEventListener('click', function() {
                // ทำสิ่งที่คุณต้องการเมื่อกดปุ่มยืนยันที่นี่
                alert('คัดเลือกเสร็จสิ้น');
                // ปิด Modal หลังจากที่ทำการยืนยัน
                modal.style.display = 'none';
            });
        });
    </script>
    <div class="modal" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://blog.clicknext.com/wp-content/themes/clicknext_blog2/assets/images/clicknext-logo.png"
                        alt="logo">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="margin: center">
                    <h4>
                        <p>ยืนยันการคัดเลือก</p>
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success" id="confirmButton"
                        data-bs-dismiss="modal">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
