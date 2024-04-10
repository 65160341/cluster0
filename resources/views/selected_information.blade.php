@extends('layouts.v_sidebar')
@section('content')
<body>
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="mb-3 d-flex align-items-center">
                <h4 class="me-3">สถานะการคัดเลือก : </h4>
                <div class="dropdown shadow-sm">
                    <select class="form-select" aria-label="Default select example" onchange="navigateToRoute(this.value)">
                        <option value="{{ route('selected') }}">ยังไม่ได้คัดเลือก</option>
                        <option value="{{ route('selected_information') }}" selected>คัดเลือกแล้ว</option>
                    </select>
                </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">
                                <div class="dropdown shadow-sm">
                                    <select class="form-select" aria-label="Default select example" id="typeFilter">
                                        <option value="" selected>ลักษณะงาน</option>
                                        <option value="internship">สหกิจศึกษา</option>
                                        <option value="job_application">สมัครงาน</option>
                                    </select>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="dropdown shadow-sm">
                                    <select class="form-select" aria-label="Default select example" id="positionFilter">
                                        <option value="">ตำแหน่งงาน</option>
                                        <option value="Developer">Developer</option>
                                        <option value="Programmer">Programmer</option>
                                    </select>
                                </div>
                            </th>
                            <th scope="col">วันที่ตอบรับ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">ฟอร์ม</th>
                        </tr>
                    </thead>
                    @foreach ($user as $item)
                        <tbody id="row_{{ $item->app_id }}" data-position="{{ $item->position->pos_name }}"
                            class="row-data">
                            @if ($item->app_selected == 1)
                                <tr>
                                    <td>{{ $item->app_firstname . ' ' . $item->app_lastname }}</td>
                                    <td></td>
                                    <td>{{ $item->position->pos_name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        </tbody>
                    @endforeach
                </table>
                <a class="btn btn-primary" href="{{ url('/selected') }}" role="button">กลับไปหน้าคัดเลือก</a>
            </div>
    </main>
</body>




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

    function navigateToRoute(route) {
        window.location.href = route;
    }
    document.getElementById('positionFilter').addEventListener('change', function() {
        var selectedOption = this.value;
        var rows = document.getElementsByClassName('row-data');

        for (var i = 0; i < rows.length; i++) {
            var position = rows[i].getAttribute('data-position');
            var displayStyle = (selectedOption === "" || position === selectedOption) ? 'block' : 'none';
            rows[i].style.display = displayStyle;
        }
    });
    document.getElementById('typeFilter').addEventListener('change', function() {
        var selectedOption = this.value;
        var rows = document.getElementsByClassName('row-data');
        for (var i = 0; i < rows.length; i++) {
            var type = rows[i].getAttribute('data-position');
            var displayStyle = (selectedOption === "" || type === selectedOption) ? 'table-row' : 'none';
            rows[i].style.display = displayStyle;
        }
    });
</script>
@endsection
