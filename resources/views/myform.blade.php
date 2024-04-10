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
                    <select class="form-select shadow sm-1 mb-1 bg-body rounded" aria-label="Default select example">
                        <option selected>ปีที่รับสมัคร</option>
                        <option value="1">2024</option>
                        <option value="2">2023</option>
                        <option value="3">2022</option>
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
                                <select class="table-filter">
                                    <option selected value="all">สถานะ</option>
                                    <option value="เปิดรับสมัคร">เปิดรับสมัคร</option>
                                    <option value="ปิดรับสมัคร">ปิดรับสมัคร</option>
                                </select>
                            </th>
                            <th width="200px" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forms_Pos as $item)
                            <tr>
                                {{-- <td>{{ $item->form->form_round_count.'/'.$item->form->form_round_year}}</td>
                                <td>{{ $item->fp_detail }}</td>
                                <td>{{ $item->form->form_date_start }}</td>
                                <td>{{ $item->form->form_date_end }}</td>
                                <td>{{ $item->fp_status }}</td> --}}
                                <td>{{ $item->Testforms_id}}</td>
                                <td>{{ $item->Testforms_roundcount	 }}</td>
                                <td>{{ $item->Testforms_detail }}</td>
                                <td>{{ $item->Testforms_status }}</td>
                                <td>{{ $item->Testforms_status_se }}</td>
                                <td>
                                    <form method="POST" action="{{ route('forms.delete', ['id' => $item])}}"></form>
                                    <button class="btn btn-primary">ตรวจสอบ</button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">ลบ</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
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
@endsection
