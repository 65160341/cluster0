@extends('layouts.v_sidebar')

@section('content')
    {{-- data table --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <div class="container-fluid content px-3 py-4">
        <div class="mb-3">
            <div class="row align-items-center mb-3">
                <div class="col-auto">
                    <span>ปีที่เปิดรับสมัคร</span>
                </div>
                <div class="col-auto">
                    <select class="form-select shadow sm-1 mb-1 bg-body rounded" aria-label="Default select example"
                        id="yearFilter">
                        <option selected value="all">ปีที่รับสมัคร</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
            </div>
            <div class="col-12 columnset">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="150px">รอบการรับสมัคร</th>
                            <th width="200px">รายละเอียด</th>
                            <th width="200px">วันที่เปิดรับ</th>
                            <th width="200px">วันที่สิ้นสุด</th>
                            <th width="200px" data-orderable="false">
                                <select class="table-filter" id="statusFilter">
                                    <option selected value="all">สถานะ</option>
                                    <option value="เปิดรับสมัคร">เปิดรับสมัคร</option>
                                    <option value="ปิดรับสมัคร">ปิดรับสมัคร</option>
                                </select>
                            </th>
                            <th width="200px" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forms as $item)
                            <tr>
                                <td>{{ $item->form_round_count.'/'.$item->form_round_year }}</td>
                                <td>{{ $item->form_detail }}</td>
                                <td>{{ $item->form_date_start }}</td>
                                <td>{{ $item->form_date_end }}</td>
                                <td>
                                    @if ($item->form_status == 0)
                                    <font style="color:#E8042C">ปิดรับสมัคร</font>
                                    @elseif ($item->form_status == 1)
                                    <font style="color:#00B187">เปิดรับสมัคร</font>
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('forms.destroy', $item->form_id) }}">                                        <a href="/formdetail" class="btn btn-primary">ตรวจสอบ</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                columnDefs: [{
                    className: 'text-center',
                    targets: [0, 1, 2, 3, 4]
                }],
                stateSave: false
            });
            // Filter the table based on the dropdown values
            $('#yearFilter').on('change', function() {
                var selectedYear = $(this).val(); // ปีที่รับสมัครที่ถูกเลือก
                if (selectedYear === "all") {
                    table
                        .column(0)
                        .search("")
                        .order("asc")
                        .draw();
                } else {
                    table
                        .column(0)
                        .search(selectedYear, true, false) // ค้นหาด้วยเฉพาะปี
                        .order("asc")
                        .draw();
                }
            });

            // Filter the table based on the status dropdown
            $('#statusFilter').on('change', function() {
                var statusFilter = $(this).val();
                table.column(4).search(statusFilter === 'all' ? '' : statusFilter, true, false).draw();
            });
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
@endsection
