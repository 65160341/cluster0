
@extends('layouts.v_sidebar')

@section('content')
    {{-- date range picker --}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <!-- Modal แสดง QR Code สำหรับ QR Code ไม่ระบุตำแหน่งงาน -->
    <div class="modal fade" id="qrCodeModalNoPosition" tabindex="-1" aria-labelledby="qrCodeModalNoPositionLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrCodeModalNoPositionLabel">QR Code สำหรับสมัครงานทั่วไป
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div id="qrCodeContainerNoPosition"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal แสดง QR Code -->
    <div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrCodeModalLabel">QR Code สำหรับสหกิจศึกษา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div id="qrCodeContainer"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- หน้าจอ -->
    <div class="container-fluid content px-3 py-4">
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
                    <input class="btn btn-light" type="text" name="daterange" value="04/07/2024 - 04/07/2024" />
                </div>
                <div class="col-auto">
                    <span>รายละเอียดเพิ่มเติม</span>
                </div>
                <div class="col-auto shadow p-0 mb-1 bg-body rounded">
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
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
                                    <option value="Frontend Developer">Frontend Developer</option>
                                    <option value="Unity Developer">Unity Developer</option>
                                    <option value="Tester">Tester</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Backend Developer">Backend Developer</option>
                                    <option value="Ui Design">Ui Design</option>
                                    <option value="3D Model">3D Model</option>
                                    <option value="BA/Project Co.">BA/Project Co.</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                </select>
                            </th>
                            <th width="200px">จำนวนการรับสมัคร</th>
                            <th width="200px" data-orderable="false">QR Code</th>
                            <th width="200px" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($forms_Pos as $item)
                            <tr>
                                <td>1</td>
                                <td>
                                    @if ($item->fp_position_type == '0')
                                    <font>พนักงาน</font>
                                    @elseif ($item->fp_position_type == '1')
                                    <font>สหกิจ</font>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->fp_position_type == '1')
                                    <font>Frontend Developer</font>
                                    @elseif ($item->fp_position_type == '2')
                                    <font>Unity Developer</font>
                                    @elseif ($item->fp_position_type == '3')
                                    <font>Tester</font>
                                    @elseif ($item->fp_position_type == '4')
                                    <font>Graphic Design</font>
                                    @elseif ($item->fp_position_type == '5')
                                    <font>Backend Developer</font>
                                    @elseif ($item->fp_position_type == '6')
                                    <font>Ui Design</font>
                                    @elseif ($item->fp_position_type == '7')
                                    <font>3D Model</font>
                                    @elseif ($item->fp_position_type == '8')
                                    <font>BA/Project Co.</font>
                                    @elseif ($item->fp_position_type == '9')
                                    <font>Digital Marketing</font>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->fp_amount_of_postion }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                        <i class='bx bx-qr-scan'></i>
                                    </button>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                    <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                </td>
                            </tr>
                        @endforeach --}}
                        @foreach ($forms_Pos as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if ($item->fp_position_type == '0')
                                    <font>พนักงาน</font>
                                    @elseif ($item->fp_position_type == '1')
                                    <font>สหกิจ</font>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->fp_position_type == '1')
                                        <font>Frontend Developer</font>
                                    @elseif ($item->fp_position_type == '2')
                                        <font>Unity Developer</font>
                                    @elseif ($item->fp_position_type == '3')
                                        <font>Tester</font>
                                    @elseif ($item->fp_position_type == '4')
                                        <font>Graphic Design</font>
                                    @elseif ($item->fp_position_type == '5')
                                        <font>Backend Developer</font>
                                    @elseif ($item->fp_position_type == '6')
                                        <font>Ui Design</font>
                                    @elseif ($item->fp_position_type == '7')
                                        <font>3D Model</font>
                                    @elseif ($item->fp_position_type == '8')
                                        <font>BA/Project Co.</font>
                                    @elseif ($item->fp_position_type == '9')
                                        <font>Digital Marketing</font>
                                    @endif
                                </td>
                                <td>{{ $item->fp_amount_of_postion }}</td>
                                <td>
                                    <button type="button" class="btn btn-qr-code" style="font-size: 25px">
                                    <i class='bx bx-qr-scan'></i>
                                    </button>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link" style="color: #00B187">แก้ไข</button>
                                    <button class="btn btn-link" style="color: #E8042C">ลบ</button>
                                </td>
                                <!-- Add a hidden span to hold the form_id -->
                                <span class="form-id" style="display: none;">{{ $item->form_id }}</span>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
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
                stateSave: false
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
    // Assume you have a function to generate QR code
    function generateQRCode(data) {
        // Your QR code generation logic here
        return 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/QR_icon.svg/1024px-QR_icon.svg.png'; // Replace with the actual URL of your QR code image
    }

    // Add click event listener to the QR code button
    $('.btn-qr-code').click(function() {
        var data = 'Some data to be encoded in the QR code';
        var qrCodeImageSrc = generateQRCode(data);
        $('#qrCodeContainer').html('<img src="' + qrCodeImageSrc + '" alt="QR Code">');
    });
</script>
@endsection
