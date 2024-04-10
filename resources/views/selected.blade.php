@extends('layouts.v_sidebar')
@section('content')

<body>

            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3 d-flex align-items-center">
                        <h4 class="me-3">สถานะการคัดเลือก : </h4>
                        <div class="dropdown shadow-sm">
                            <select class="form-select" aria-label="Default select example"
                                onchange="navigateToRoute(this.value)">
                                <option value="{{ route('selected') }}" selected>ยังไม่ได้คัดเลือก</option>
                                <option value="{{ route('selected_information') }}">คัดเลือกแล้ว</option>
                            </select>
                        </div>
                        <div class="mb-3 d-flex align-items-center ms-auto"> <!-- เพิ่ม class ms-auto -->
                            <div class="dropdown shadow-sm">
                                <select class="form-select" aria-label="Default select example"
                                    onchange="navigateToRoute(this.value)">
                                    <option value="{{ route('selected') }}" selected>ข้อมูลทั้งหมด</option>
                                    <option value="{{ route('public_data') }}">ข้อมูลที่เปิดเผย</option>
                                    <option value="{{ route('hidden_data') }}">ข้อมูลที่ซ่อนไว้</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">
                                        <div class="dropdown shadow-sm">
                                            <select class="form-select" aria-label="Default select example"
                                                id="typeFilter">
                                                <option value="" selected>ลักษณะงาน</option>
                                                <option value="internship">สหกิจศึกษา</option>
                                                <option value="job_application">สมัครงาน</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="dropdown shadow-sm">
                                            <select class="form-select" aria-label="Default select example"
                                                id="positionFilter">
                                                <option value="">ตำแหน่งงาน</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Programmer">Programmer</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th scope="col">วันที่สมัคร</th>
                                    <th scope="col">ฟอร์ม</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($user as $item)
                                <tbody id="row_{{ $item->app_id }}" data-position="{{ $item->position->pos_name }}"
                                    class="row-data">
                                    @if ($item->app_selected == 0)
                                        <tr>
                                            <td>{{ $item->app_firstname . ' ' . $item->app_lastname }}</td>
                                            <td></td>
                                            <td>{{ $item->position->pos_name }}</td>
                                            <td></td>
                                            <td>
                                                <button data-id="{{ $item->app_id }}"
                                                    class="userinfo btn btn-primary">view</button>
                                            </td>
                                            <td style="display: flex ; height: 95px ">

                                                <button style="height: 38px ; margin-left: 10px"
                                                    class="btn btn-secondary hide-btn" data-id="{{ $item->app_id }}"
                                                    onclick="hideRow({{ $item->app_id }})"
                                                    {{ $item->app_status == 0 ? 'disabled' : 'enabled' }}>ซ่อน</button>
                                                <button style="height: 38px; margin-left: 10px"
                                                    class="btn btn-success" onclick="showModal({{ $item->app_id }})"
                                                    {{ $item->app_selected == 1 ? 'disabled' : 'enabled' }}>คัดเลือก
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            @endforeach
                        </table>
                        <a class="btn btn-primary" href="/information" role="button">กลับไปหน้าแรก</a>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.querySelector('.modal');
            const closeModalButtons = document.querySelectorAll('.btn-close, [data-bs-dismiss="modal"]');
            const confirmButton = document.getElementById('confirmButton');
            const selectButtons = document.querySelectorAll('.btn-success');

            selectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    modal.style.display = 'block';
                    document.querySelector('.modal-title').innerText = 'Modal title';

                    // Get the ID from the data-id attribute of the button's parent row
                    const userId = this.closest('tr').getAttribute('data-id');

                    // Set the form action URL dynamically based on the ID
                    const form = document.querySelector('form');
                    form.action = '/selected-information/' + userId;
                });
            });

            closeModalButtons.forEach(closeButton => {
                closeButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            });

            confirmButton.addEventListener('click', function() {
                alert('คัดเลือกเสร็จสิ้น');
                modal.style.display = 'none';
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    var selectedFilter = this.getAttribute('data-filter');
                    filterData(selectedFilter);
                });
            });
        });

        function filterData(selectedFilter) {

            console.log('Filtering data based on:', selectedFilter);

        }

        function showModal(id) {
            swal({
                    title: "ยืนยันการคัดเลือก",
                    icon: "success",
                    buttons: {
                        cancle: "NO",
                        confirm: {
                            text: "Yes",
                            value: true,
                            visible: true,
                            className: "btn-success",
                        },
                    },
                })
                .then((value) => {
                    if (value) {
                        sendUserId(id);

                    }
                });
        }

        function sendUserId(id) {
            console.log("Sending user ID:", id);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/update-selected/' + id,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                },
                success: function(data) {
                    console.log('success');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function hideRow(id) {
            var row = document.getElementById("row_" + id);
            if (row) {
                row.style.display = "none";
                sendIdToController(id);
            } else {
                console.error("Row with id " + id + " not found.");
            }
        }

        function sendIdToController(id) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/update/' + id,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    id: id
                },
                success: function(response) {
                    console.log('ID sent successfully');
                },
                error: function(xhr, status, error) {
                    console.error('Error sending ID: ', error);
                }
            });
        }

        function showData() {
            var rows = document.querySelectorAll("[id^='row']");
            rows.forEach(function(row) {
                var computedStyle = window.getComputedStyle(row);
                if (computedStyle.display === "none") {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }

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
</body>

</html>
@endsection
