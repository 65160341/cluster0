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
    <link
        rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
    {{-- date range picker --}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{-- data table --}}
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
                {{-- <li class="sidebar-item">
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
                </li> --}}
                <li class="sidebar-item">
                    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-bs-target
                      </button>
                      <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                          Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                      </div> --}}
                    <a href="#" class="sidebar-link" data-bs-toggle="collapse" data-bs-target="#auth"
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
                <!-- Modal แสดง QR Code สำหรับ QR Code ไม่ระบุตำแหน่งงาน -->
                <div class="modal fade" id="qrCodeModalNoPosition" tabindex="-1"
                    aria-labelledby="qrCodeModalNoPositionLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="qrCodeModalNoPositionLabel">QR Code สำหรับสมัครงานทั่วไป
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                <div id="qrCodeContainerNoPosition"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal แสดง QR Code -->
                <div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="qrCodeModalLabel">QR Code สำหรับสหกิจศึกษา</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                <div id="qrCodeContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- หน้าจอ -->
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="row align-items-center mb-3">
                            <div class="col-auto">
                                <span>รอบการสมัคร</span>
                            </div>
                            <div class="col-auto box rounded-3 shadow p-1 mb-1 bg-body rounded">
                                รอ import จาก dtb
                            </div>
                            <div class="col-auto">
                                <span>ระยะเวลารับสมัคร</span>
                            </div>
                            <div class="col-auto shadow p-0 mb-1 bg-body rounded">
                                <input class="btn btn-light" type="text" name="daterange"
                                    value="04/07/2024 - 04/07/2024" />
                            </div>
                            <div class="col-auto">
                                <span>รายละเอียดเพิ่มเติม</span>
                            </div>
                            <div class="col-auto shadow p-0 mb-1 bg-body rounded">
                                <input type="text" class="form-control" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-auto">
                                <span>QR Code ไม่ระบุตำแหน่งงาน</span>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-qr-code-no-position" style="font-size: 25px">
                                    <i class='bx bx-qr-scan'></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 columnset">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="150px">ลำดับ</th>
                                        <th width="200px" data-orderable="false">
                                            <select class="table-filter">
                                                <option selected value="all">ลักษณะงาน</option>
                                                <option value="สหกิจศึกษา">สหกิจศึกษา</option>
                                                <option value="สมัครงาน">สมัครงาน</option>

                                            </select>
                                        </th>
                                        <th width="200px" data-orderable="false">
                                            <select class="table-filter">
                                                <option selected value="all">ตำแหน่งงาน</option>
                                                <option value="DEV">DEV</option>
                                                <option value="Soft En">Soft En</option>
                                                <option value="Web Design">Web Design</option>
                                                <option value="Back End Dev">Back End Dev</option>
                                                <option value="Full Stack">Full Stack</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </th>
                                        <th width="200px">จำนวนการรับสมัคร</th>
                                        <th width="200px" data-orderable="false">QR Code</th>
                                        <th width="200px" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">สหกิจศึกษา</td>
                                        <td class="align-middle">DEV</td>
                                        <td class="align-middle">10</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                                <i class='bx bx-qr-scan'></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                            <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">สมัครงาน</td>
                                        <td class="align-middle">Soft En</td>
                                        <td class="align-middle">30</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                                <i class='bx bx-qr-scan'></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                            <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">3</td>
                                        <td class="align-middle">สหกิจศึกษา</td>
                                        <td class="align-middle">Web Design</td>
                                        <td class="align-middle">17</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                                <i class='bx bx-qr-scan'></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                            <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">4</td>
                                        <td class="align-middle">สหกิจศึกษา</td>
                                        <td class="align-middle">Back End Dev</td>
                                        <td class="align-middle">10</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                                <i class='bx bx-qr-scan'></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                            <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">สมัครงาน</td>
                                        <td class="align-middle">Full Stack</td>
                                        <td class="align-middle">90</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                                <i class='bx bx-qr-scan'></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                            <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">6</td>
                                        <td class="align-middle">สหกิจศึกษา</td>
                                        <td class="align-middle">Admin</td>
                                        <td class="align-middle">13</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                                <i class='bx bx-qr-scan'></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                            <button class="btn btn-link" style="color: #E8042C">ลบ</button>
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
    <script>
        var $j = jQuery.noConflict(true);
    </script>
    <script>
        $(document).ready(function() {
            console.log($().jquery); // This prints v1.9.1
            console.log($j().jquery); // This prints v1.9.1
        });
    </script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
    <script>
        $j(function() {
            $j('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

    <!-- DATA TABLE -->
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                columnDefs: [{
                    className: 'text-center',
                    targets: [0, 1, 2, 3, 4]
                }, ],
                stateSave: true
            });

            // Filter the table based on the dropdown values
            $('.table-filter').on('change', function() {
                var filterValue = $(this).val();
                var columnIndex = $(this).closest('th').index();
                if (filterValue === 'all') {
                    table.column(columnIndex).search('').draw();
                } else {
                    table.column(columnIndex).search('^' + filterValue + '$', true, false).draw();
                }
            });
        });
    </script>


    <!-- MODAL -->
    <script>
        // Assume you have a function to generate QR code
        function generateQRCode(data) {
            // Your QR code generation logic here
            return 'data:image/png;base64,...'; // Replace with your actual QR code image data
        }

        // Add click event listener to the QR code button
        $('#example tbody').on('click', 'button.btn-qr-code', function() {
            var data = 'Some data to be encoded in the QR code';
            var qrCodeImageSrc = generateQRCode(data);
            $('#qrCodeContainer').html('<img src="' + qrCodeImageSrc + '" alt="ตำแหน่ง Dev">');
            $('#qrCodeModal').modal('show');
        });
    </script>
    <script>
        // Assume you have a function to generate QR code without position
        function generateQRCodeNoPosition(data) {
            // Your QR code generation logic here
            return 'data:image/png;base64,...'; // Replace with your actual QR code image data
        }

        // Add click event listener to the QR code button without position
        $('button.btn-qr-code-no-position').on('click', function() {
            var data = 'Some data to be encoded in the QR code';
            var qrCodeImageSrc = generateQRCodeNoPosition(data);
            $('#qrCodeContainerNoPosition').html('<img src="' + qrCodeImageSrc + '" alt="ตำแหน่งงานทั่วไป">');
            $('#qrCodeModalNoPosition').modal('show');
        });
    </script>

</body>

</html>
