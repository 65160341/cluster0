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
        #applicationPeriod {
            margin-left: auto; /* ระยะห่างระหว่าง input text กับปฏิทิน */
        }
        .add-form {
            color: rgb(255, 255, 255);
            background-color: #870000;
            background-size: 10px;
        }
        table {
    border-collapse: collapse;
    margin-right: 40px;
    margin-bottom: 60px;
    width: 100%; /* เพิ่มให้ตารางเต็มความกว้าง */
}

th, td {
    padding: 10px; /* เพิ่มช่องว่างของเนื้อหาในเซลล์ */
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    border-top: 1px solid #ddd; /* เพิ่มเส้นขอบด้านบนให้กับหัวคอลัมน์ */
}
.popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .popup h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .popup input[type="text"],
        .popup select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .popup button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .cancel-button {
            background-color: #860202;
            color: white;
        }

        .confirm-button {
            background-color: #00FF00;
            color: white;
        }

        /* CSS สำหรับไอคอนเครื่องหมายถูก */
        .icon {
            color: #00FF00;
            font-size: 24px;
            vertical-align: middle;
            margin-right: 5px;
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

                                <a href="#" class="sidebar-link" style="color: #ff0000;">
                                    <i class='bx bx-chevron-right'></i>สร้างฟอร์มรับสมัคร</a>

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
         <form onsubmit="return confirmForm()">
                <div class="select_round">
                    <label for="applicationRound">รอบการรับสมัคร:</label>
                    <input type="text" id="form_roundcount" value="" name="form_roundcount" placeholder="ระบุรอบ/ปี เช่น รอบที่ 1/2566">
                </div>
                <div class="select_date">
                    <label for="applicationPeriod">ระยะเวลาการรับสมัคร:</label>
                    <input type="date" id="form_date_end" value="" name="form_date_end" class="form-control" placeholder="เลือกวันที่">
            </div>
        <div class="table-form">
        <label for="additionalInfo">รายละเอียดเพิ่มเติม:</label>
        <input type="text" id="pf_Info" value="" name="pf_Info" placeholder="กรอกรายละเอียดเพิ่มเติม">
        <button class="add-form" onclick="toggleConfirmationPopup()" >+ เพิ่มรายการรับสมัคร</button>
    </div>
</form>


<div>
<table>
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ลักษณะงาน</th>
            <th>ตำแหน่งงาน</th>
            <th>จำนวนการรับสมัคร</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($positionForms as $key => $positionForm)
        <tr>
            <td>{{ $key+1}}</td>
            <td>{{ $positionForm->pf_type_jobs }}</td>
            <td>{{ $positionForm->Positions->pos_name }}</td>
            <td>{{ $positionForm->pf_amount_of_position }}</td>
            <td>
                <button style="background-color: green; color: white;">แก้ไข</button>
                <button style="background-color: red; color: white;">ลบ</button>
            </td>
        </tr>
        @endforeach
        <!-- เพิ่มแถวตามความเหมาะสม -->
    </tbody>
</table>
</div><div class="popup" id="popup">
    <h2>เพิ่มรายการรับสมัคร</h2>
    <form onsubmit="return confirmForm()">

        <label for="jobType" >ลักษณะงาน:</label>
        <select id="pf_type_jobs" name="pf_type_jobs" >
            <option value="พนักงาน">พนักงาน</option>
            <option value="สหกิจ">สหกิจ</option>
        </select>
        <label for="position">ตำแหน่งงาน:</label>
        <select id="pf_name" name="pf_name" >
            <option value="ไม่ระบุตำแหน่งงาน">-</option>
            <option value="Tester">Tester</option>
            <option value="UX/UI">UX/UI</option>
            <option value="Project Manageer">Project Manageer</option>
        </select>
        <label for="numOfApplicants">จำนวนการรับสมัคร:</label>
        <input type="text" value="" id="pf_amount_of_position" name="pf_amount_of_position">
        <button type="button" class="cancel-button" onclick="togglePopup()">ยกเลิก</button>
        <button type="submit" class="confirm-button">ยืนยัน</button>
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

    function togglePopup() {
        var popup = document.getElementById("popup");
        if (popup.style.display === "block") {
            popup.style.display = "none";
        } else {
            popup.style.display = "block";
        }
    }

    function confirmForm() {
        togglePopup(); // ปิด popup เมื่อยืนยัน
        toggleConfirmationPopup(); // เปิด popup
    }

    function toggleConfirmationPopup() {
        var confirmationPopup = document.getElementById("confirmationPopup");
        if (confirmationPopup.style.display === "none") {
            confirmationPopup.style.display = "block";
        } else {
            confirmationPopup.style.display = "none";
        }
    }

</script>

    </script>
</body>

</html>
