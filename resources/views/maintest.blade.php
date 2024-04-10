@extends('layouts.v_sidebar')

@section('content')
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



<body>

            <main class="content px-3 py-4">
                {{-- <label for="applicationRound">รอบการรับสมัคร:</label>
                        <input type="text" id="form_roundcount" value="" name="form_roundcount" placeholder="ระบุรอบ/ปี เช่น รอบที่ 1/2566">


                        <label for="applicationPeriod">ระยะเวลาการรับสมัคร:</label>
                        <input type="date" id="form_date_end" value="" name="form_date_end" class="form-control" placeholder="เลือกวันที่">


                        <label for="additionalInfo">รายละเอียดเพิ่มเติม:</label>
                        <input type="text" id="pf_info" value="" name="pf_info" placeholder="กรอกรายละเอียดเพิ่มเติม"> --}}
                {{-- <form action="{{ Route('stored_data') }}" method="POST"> --}}
                <form action="{{ route('test.store') }}" method="POST">
                    <div style="display: flex; flex-direction: column;">
                        @php
                            // เรียกข้อมูลรอบการรับสมัครล่าสุด
                            $latestFormRound = \App\Models\Formtest::orderBy('form_round_year', 'desc')->value(
                                'form_round_year',
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
                        <div onclick="addRow()" class="btn btn-success">เพิ่มข้อมูล</div>
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
                                            <option value="0">พนักงาน</option>
                                            <option value="1">สหกิจ</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="pos_id[]" id="pos_id">
                                            <option value="" disabled selected>เลือก</option>
                                            <option value="1">Frontend Developer</option>
                                            <option value="2">Unity Developer</option>
                                            <option value="3">Tester</option>
                                            <option value="4">Graphic Design</option>
                                            <option value="5">Backend Developer</option>
                                            <option value="6">Ui Design</option>
                                            <option value="7">3D Model</option>
                                            <option value="8">BA/Project Co.</option>
                                            <option value="9">Digital Marketing</option>
                                        </select>
                                    </td>
                                    <td>
                                        {{-- <div onclick="decreaseApplicants(this)">-</div> --}}
                                        <input type="number" id="pf_amount_of_positions"
                                            name="pf_amount_of_position[]" min="0" value="0">
                                        {{-- <div onclick="increaseApplicants(this)">+</div> --}}
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
                    '<select name="pf_type_jobs[]" id="pf_type_jobs"><option value="" disabled selected>เลือก</option><option value="0">พนักงาน</option><option value="1">สหกิจ</option></select>';
                cell3.innerHTML =
                    '<select name="pos_id[]" id="pos_id"><option value="" disabled selected>เลือก</option><option value="1">Frontend Developer</option><option value="2">Unity Developer</option><option value="3">Tester</option><option value="4">Graphic Design</option><option value="5">Backend Developer</option><option value="6">Ui Design</option><option value="7">3D Model</option><option value="8">BA/Project Co.</option><option value="9">Digital Marketing</option></select>';
                cell4.innerHTML =
                    '<input type="number" id="pf_amount_of_positions" name="pf_amount_of_position[]" min="0" value="0">';
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

@endsection
