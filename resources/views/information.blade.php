@extends('layouts.v_sidebar')

@section('content')
    {{-- data table --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <!-- หน้าจอ -->
    <div class="container-fluid content px-3 py-4">
        <div class="mb-3">
            <div class="mb-3 d-flex align-items-center">
                <h4 class="me-3">ปีที่รับสมัคร</h4>
                <div class="dropdown shadow-sm">
                    <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        เลือกปีที่รับสมัคร
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">1/2023</a></li>
                        <li><a class="dropdown-item" href="#">1/2570</a></li>
                        <li><a class="dropdown-item" href="#">2/2568</a></li>
                        <li><a class="dropdown-item" href="#">1/2568</a></li>
                        <li><a class="dropdown-item" href="#">2/2565</a></li>
                        <li><a class="dropdown-item" href="#">1/2565</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 columnset">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="200px">รอบการรับสมัคร</th>
                            <th width="200px">รายละเอียด</th>
                            <th width="200px" data-orderable="false">
                                <select class="table-filter">
                                    <option selected value="all">สถานะการรับสมัคร</option>
                                    <option value="ปิดรับสมัคร">ปิดรับสมัคร</option>
                                    <option value="เปิดรับสมัคร">เปิดรับสมัคร</option>
                                </select>
                            </th>
                            <th width="200px" data-orderable="false">
                                <select class="table-filter">
                                    <option selected value="all">สถานะการคัดเลือก</option>
                                    <option value="คัดเลือกเสร็จสิ้น">คัดเลือกเสร็จสิ้น</option>
                                    <option value="อยู่ระหว่างการดำเนินการ">อยู่ระหว่างการดำเนินการ</option>
                                </select>
                            </th>
                            <th width="200px" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pos_forms as $item)
                            <tr>
                                <td>{{ $item->form->form_round_count . '/' . $item->form->form_round_year }}
                                </td>
                                <td>{{ $item->fp_detail }}</td>
                                <td>{{ $item->fp_status }} </td>
                                <td>{{ $item->form->form_round_year }}</td>
                                <td>
                                    <a href="{{ $item->Testforms_id }}" class="btn btn-primary"
                                        style="margin-left: 10%">ตรวจสอบ</a>
                                    <a href="" class="btn btn-success">เสร็จสิ้น</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

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
            $(".dropdown-menu a").click(function() {
                var selectedYear = $(this).text(); // ปีที่รับสมัครที่ถูกเลือก
                table.columns(0).search(selectedYear).draw();
            });
        });
    </script>

    <script>
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
                    // เปลี่ยนสีข้อความในตารางเป็นสีเขียว
                    btn.closest('tr').find('td:eq(3)').css('color', '#00B187');
                },
                error: function(xhr, status, error) {
                    console.error(error); // แสดงข้อผิดพลาดที่เกิดขึ้นในกรณีที่เกิดข้อผิดพลาด
                }
            });
        });
    </script>
@endsection
