<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset\dist\css\style.css') }}">
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
                    <a href="/main" class="sidebar-link">
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
                        <h4 class="me-3">ปีที่รับสมัคร</h4>
                        <div class="dropdown shadow-sm">
                            <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                เลือกปีที่รับสมัคร
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">2/2570</a></li>
                                <li><a class="dropdown-item" href="#">1/2570</a></li>
                                <li><a class="dropdown-item" href="#">2/2568</a></li>
                                <li><a class="dropdown-item" href="#">1/2568</a></li>
                                <li><a class="dropdown-item" href="#">2/2565</a></li>
                                <li><a class="dropdown-item" href="#">1/2565</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 table-responsive">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input class="form-control" id="myInput" type="text" placeholder="ค้นหา..">
                            </div>
                            <button type="button" id="searchButton" class="btn btn-primary" data-mdb-ripple-init
                                style="height: 40% ">
                                <i class='bx bx-search-alt-2'></i>
                            </button>
                        </div>
                        <br>
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">รอบการรับสมัคร</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">สถานะการรับสมัคร
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-white dropdown-toggle" type="button"
                                                id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                สถานะการรับสมัคร
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                                <li><a class="dropdown-item" href="#">ปิดรับสมัคร</a></li>
                                                <li><a class="dropdown-item" href="#">เปิดรับสมัคร</a></li>
                                            </ul>
                                        </div> --}}
                                    </th>
                                    <th scope="col">สถานะการคัดเลือก
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-white dropdown-toggle" type="button"
                                                id="selectionStatusDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                สถานะการคัดเลือก
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="selectionStatusDropdown">
                                                <li><a class="dropdown-item" href="#">อยู่ระหว่างดำเนินการ</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">คัดเลือกเสร็จสิ้น</a></li>
                                            </ul>
                                        </div> --}}
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody id="myTable">
                                @foreach ($Testforms as $item)
                                    <tr>
                                        <td>{{ $item->Testforms_roundcount }}</td>
                                        <td>{{ $item->Testforms_detail }}</td>
                                        <td>{{ $item->Testforms_status }} </td>
                                        <td>{{ $item->Testforms_status_se }}</td>
                                        <td>
                                            <a href="{{ $item->Testforms_id }}" class="btn btn-primary"
                                                style="margin-left: 10%">ตรวจสอบ</a>
                                            <a href="" class="btn btn-success">เสร็จสิ้น</a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->app_firstname }}</td>
                                        <td>{{ $item->app_age }}</td>
                                        <td>{{ $item->app_education }} </td>
                                        <td>{{ $item->app_faculty }}</td>
                                        <td>
                                            <a href="{{ $item->app_id }}" class="btn btn-primary"
                                                style="margin-left: 10%">ตรวจสอบ</a>
                                            <a href="" class="btn btn-success">เสร็จสิ้น</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                {{-- <tr>
                                    <td>dddddd</td>
                                    <td>dddddd</td>
                                    <td>dddddd</td>
                                    <td>dddddd</td>
                                    <td><a href="" class="btn btn-success">เสร็จสิ้น</a></td>
                                </tr>
                                <tr>
                                    <td>dddddd</td>
                                    <td>dddddd</td>
                                    <td>dddddd</td>
                                    <td>dddddd</td>
                                    <td><a href="" class="btn btn-success">เสร็จสิ้น</a></td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous" id="previousPage">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#" id="page1"
                                style="color: rgb(0, 0, 0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" id="page2"
                                style="color: rgb(0, 0, 0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" id="page3"
                                style="color: rgb(0, 0, 0); ">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" id="page4"
                                style="color: rgb(0, 0, 0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="#" id="page5"
                                style="color: rgb(0, 0, 0); ">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next" id="nextPage">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

        //ค้นหา//

        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").each(function() {
                    // ดักคำว่า "ปิดรับสมัคร" และซ่อนแถวที่มีคำนี้อยู่
                    if ($(this).text().toLowerCase().indexOf(value) > -1 || value ===
                        "ปิดรับสมัคร") {
                        $(this).show(); // แสดงแถว
                    } else {
                        $(this).hide(); // ซ่อนแถว
                    }
                });
            });
        });

        $(document).ready(function() {
            // กำหนดจำนวนข้อมูลต่อหน้า
            var recordsPerPage = 5;
            // กำหนดหน้าเริ่มต้น
            var currentPage = 1;

            // ซ่อนทั้งหมดของรายการในตาราง
            $('#myTable tr').hide();

            // แสดงข้อมูลในหน้าที่ 1
            $('#myTable tr').slice(0, recordsPerPage).show();

            // คลิกปุ่มหน้าก่อนหน้า
            $('#previousPage').click(function() {
                if (currentPage > 1) {
                    currentPage--;
                    $('#myTable tr').hide();
                    var grandTotal = recordsPerPage * currentPage;
                    for (var i = grandTotal - recordsPerPage; i < grandTotal; i++) {
                        $('#myTable tr:eq(' + i + ')').show();
                    }
                }
            });

            // คลิกปุ่มหน้าถัดไป
            $('#nextPage').click(function() {
                if (currentPage < ($('#myTable tr').length / recordsPerPage)) {
                    currentPage++;
                    $('#myTable tr').hide();
                    var grandTotal = recordsPerPage * currentPage;
                    for (var i = grandTotal - recordsPerPage; i < grandTotal; i++) {
                        $('#myTable tr:eq(' + i + ')').show();
                    }
                }
            });

            // คลิกที่หมายเลขหน้า
            $('.pagination a').click(function() {
                $('.pagination li').removeClass('active');
                $(this).parent().addClass('active');
                currentPage = parseInt($(this).text());
                $('#myTable tr').hide();
                var grandTotal = recordsPerPage * currentPage;
                for (var i = grandTotal - recordsPerPage; i < grandTotal; i++) {
                    $('#myTable tr:eq(' + i + ')').show();
                }
            });
        });

        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


            // เพิ่มการจัดการเหตุการณ์เมื่อเลือกปีที่รับสมัคร
            $(".dropdown-menu a").click(function() {
                var selectedYear = $(this).text(); // ปีที่รับสมัครที่ถูกเลือก
                $("#myTable tr").hide(); // ซ่อนทั้งหมดก่อน
                $("#myTable tr").each(function() {
                    // ตรวจสอบว่าปีที่รับสมัครของแถวนี้ตรงกับปีที่ถูกเลือกหรือไม่
                    if ($(this).find("td:eq(0)").text().trim() === selectedYear) {
                        $(this).show(); // แสดงแถวนี้
                    }
                });
            });
        });

        $('a.btn-success').click(function(e) {
            e.preventDefault(); // ป้องกันการโหลดหน้าใหม่
            var url = $(this).attr('information'); // URL ที่เรียก
            var status = "คัดเลือกเสร็จสิ้น"; // ค่าใหม่ที่ต้องการให้เปลี่ยนเป็น
            var btn = $(this); // เก็บองค์ประกอบไว้ในตัวแปร
            // ทำการเปลี่ยนค่าโดยใช้ Ajax เพื่อส่งค่าไปยังเซิร์ฟเวอร์โดยไม่ต้องโหลดหน้าใหม่
            $.ajax({
                url: url,
                type: 'GET', // หรือสามารถเป็น 'POST' ได้ตามที่คุณกำหนด
                data: {
                    status: status
                }, // ส่งข้อมูลสถานะใหม่ไปยังเซิร์ฟเวอร์
                success: function(response) {
                    // หากสำเร็จ ทำการอัพเดทค่าใน DOM
                    btn.closest('tr').find('td:eq(3)').text(status);
                    // เปลี่ยนสีของปุ่มเป็นสีเขียว
                    btn.removeClass('btn-success').addClass('btn-secondary').text('เสร็จสิ้น').attr(
                        'disabled', true);
                    // คืนค่ากลับมาแสดงค่าของตัวมันเอง
                    var originalStatus = btn.closest('tr').find('td:eq(3)').text();
                    btn.closest('tr').find('td:eq(3)').text(originalStatus);
                },
                error: function(xhr, status, error) {
                    console.error(error); // แสดงข้อผิดพลาดที่เกิดขึ้นในกรณีที่เกิดข้อผิดพลาด
                }
            });
        });
    </script>
</body>

</html>
