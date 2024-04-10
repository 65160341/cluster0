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

    table {
        border-collapse: collapse;
        margin-right: 40px;
        margin-bottom: 60px;
        width: 100%;
        /* เพิ่มให้ตารางเต็มความกว้าง */
    }

    th,
    td {
        padding: 10px;
        /* เพิ่มช่องว่างของเนื้อหาในเซลล์ */
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        border-top: 1px solid #ddd;
        /* เพิ่มเส้นขอบด้านบนให้กับหัวคอลัมน์ */
    }

    @media (min-width: 768px) {}
</style>



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
                    <a href="dashboard" class="sidebar-link">
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


                {{-- <label for="applicationRound">รอบการรับสมัคร:</label>
                        <input type="text" id="form_roundcount" value="" name="form_roundcount" placeholder="ระบุรอบ/ปี เช่น รอบที่ 1/2566">


                        <label for="applicationPeriod">ระยะเวลาการรับสมัคร:</label>
                        <input type="date" id="form_date_end" value="" name="form_date_end" class="form-control" placeholder="เลือกวันที่">


                        <label for="additionalInfo">รายละเอียดเพิ่มเติม:</label>
                        <input type="text" id="pf_info" value="" name="pf_info" placeholder="กรอกรายละเอียดเพิ่มเติม"> --}}
                <form action="{{ Route('stored_data') }}" method="POST">
                    <div style="display: flex; flex-direction: column;">
                        @php
                            // เรียกข้อมูลรอบการรับสมัครล่าสุด
                            $latestFormRound = \App\Models\PositionForm::orderBy('form_roundcount', 'desc')->value(
                                'form_roundcount',
                            );

                            // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลหรือไม่
                            if (!$latestFormRound) {
                                // หากไม่มีข้อมูล กำหนดค่าให้เป็น '1/ปีปัจจุบัน'
                                $latestFormRound = '1/' . Carbon\Carbon::now()->year;
                            }
                        @endphp

                        <label for="applicationRound">รอบการรับสมัคร:</label>
                        <div class="input-box">
                            <span>{{ $latestFormRound }}</span>
                        </div>
                        <label for="applicationPeriod">ระยะเวลาการรับสมัคร:</label>
                        <div style="display: flex; align-items: center;">
                            <label for="dateStart" style="margin-right: 10px;">เวลาเริ่มต้น:</label>
                            <input type="date" id="form_date_start" value="" name="form_date_start"
                                class="form-control-sm" placeholder="เลือกวันที่เริ่ม" style="margin-right: 10px;">
                            <label for="dateEnd" style="margin-right: 10px;">เวลาสิ้นสุด:</label>
                            <input type="date" id="form_date_end" value="" name="form_date_end"
                                class="form-control-sm" placeholder="เลือกวันที่สิ้นสุด">
                        </div>

                        <label for="additionalInfo">รายละเอียดเพิ่มเติม:</label>
                        <input type="text" id="pf_info" value="" name="pf_info"
                            placeholder="กรอกรายละเอียดเพิ่มเติม">
                    </div>

                    <div>

                        <div onclick="addRow()">เพิ่มข้อมูล</div>

                        @csrf
                        <table id="dataTable">
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
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select name="pf_type_jobs[]" id="pf_type_jobs">
                                            <option value="" disabled selected>เลือก</option>
                                            <option value="พนักงาน">พนักงาน</option>
                                            <option value="สหกิจ">สหกิจ</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="pos_id[]" id="pos_id">
                                            <option value="" disabled selected>เลือก</option>
                                            <option value="1">Tester</option>
                                            <option value="2">UX/UI</option>
                                            <option value="3">Project Manager</option>
                                            <option value="4">Designer</option>
                                            <option value="5">Developer</option>
                                            <option value="6">Business Analytics</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div onclick="decreaseApplicants(this)">-</div>
                                        <input type="number" id="pf_amount_of_positions"
                                            name="pf_amount_of_position[]" min="0" value="0">
                                        <div onclick="increaseApplicants(this)">+</div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" style="background-color: red; color: white;"
                            onclick="submit()">สร้างฟอร์มและ QR Code</button>
                </form>

        </div>

        <script>
            function increaseApplicants() {
                var input = document.querySelector('input[type="number"]');
                var currentValue = parseInt(input.value);
                input.value = currentValue + 1;
            }

            function decreaseApplicants() {
                var input = document.querySelector('input[type="number"]');
                var currentValue = parseInt(input.value);
                if (currentValue > 0) {
                    input.value = currentValue - 1;
                }
            }
        </script>






        </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

        function collectFormData() {
            var formData = {
                jobType: [],
                position: [],
                numOfApplicants: []
            };

            // เก็บข้อมูลจากฟอร์ม
            var jobTypes = document.getElementsByName('pf_job_Type[]');
            var positions = document.getElementsByName('pos_id[]');
            var numOfApplicants = document.getElementsByName('pf_amount_of_position[]');

            // วนลูปเพื่อเก็บข้อมูลจากแต่ละฟิลด์
            for (var i = 0; i < jobTypes.length; i++) {
                formData.jobType.push(jobTypes[i].value);
                formData.position.push(positions[i].value);
                formData.numOfApplicants.push(numOfApplicants[i].value);
            }

            return formData;
        }

        function increaseApplicants(button) {
            var input = button.parentNode.querySelector('input[type="number"]');
            var currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        }

        function decreaseApplicants(button) {
            var input = button.parentNode.querySelector('input[type="number"]');
            var currentValue = parseInt(input.value);
            if (currentValue > 0) {
                input.value = currentValue - 1;
            }
        }

        function addRow() {
            var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var rowCount = table.rows.length;
            if (rowCount < 10) {
                var newRow = table.insertRow(rowCount);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                var cell5 = newRow.insertCell(4);
                cell1.innerHTML = rowCount + 1;
                cell2.innerHTML =
                    '<select name="pf_job_type[]" class="job-type"><option value="" disabled selected>เลือก</option><option value="พนักงาน">พนักงาน</option><option value="สหกิจ">สหกิจ</option></select>';
                cell3.innerHTML =
                    '<select name="pos_id[]" class="position"><option value="" disabled selected>เลือก</option><option value="1">Tester</option><option value="2">UX/UI</option><option value="3">Project Manager</option><option value="4">Designer</option><option value="5">Developer</option><option value="6">Business Analytics</option></select>';
                cell4.innerHTML =
                    '<div onclick="decreaseApplicants(this)">-</div><input type="number" min="0" name="pf_amount_of_position[]" value="0"><div onclick="increaseApplicants(this)">+</div>';
                cell5.innerHTML = '';

                // เพิ่มโค้ดสำหรับการส่งข้อมูลไปยัง Laravel Controller เพื่อบันทึกลงในฐานข้อมูล
                var jobTypeSelect = newRow.querySelector('.job-type');
                var positionSelect = newRow.querySelector('.position');
                jobTypeSelect.addEventListener('change', function() {
                    // อื่น ๆ ที่คุณต้องการทำเมื่อเลือกตำแหน่ง
                });
                positionSelect.addEventListener('change', function() {
                    // อื่น ๆ ที่คุณต้องการทำเมื่อเลือกตำแหน่ง
                });
            } else {
                alert('ไม่สามารถเพิ่มแถวได้เพิ่มแล้ว 10 แถว');
            }
        }
    </script>

    </script>
</body>

</html>
