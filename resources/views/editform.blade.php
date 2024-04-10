@extends('layouts.v_sidebar')

{{-- @section('content')
    <div class="container">
        <h1>Edit Form Position</h1>
        <form method="POST" action="{{ route('formpositions.update', $formposition->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="fp_position_type" class="form-label">Position Type</label>
                <select class="form-control" id="fp_position_type" name="fp_position_type">
                    <option value="0" {{ $formposition->fp_position_type == 0 ? 'selected' : '' }}>พนักงาน</option>
                    <option value="1" {{ $formposition->fp_position_type == 1 ? 'selected' : '' }}>สหกิจ</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pos_id" class="form-label">Position</label>
                <select class="form-control" id="pos_id" name="pos_id">
                    <!-- Populate options dynamically based on your data -->
                    <option value="1" {{ $formposition->pos_id == 1 ? 'selected' : '' }}>Frontend Developer</option>
                    <option value="1" {{ $formposition->pos_id == 2 ? 'selected' : '' }}>Unity Developer</option>
                    <option value="1" {{ $formposition->pos_id == 3 ? 'selected' : '' }}>Tester</option>
                    <option value="1" {{ $formposition->pos_id == 4 ? 'selected' : '' }}>Graphic Design</option>
                    <option value="1" {{ $formposition->pos_id == 5 ? 'selected' : '' }}>Backend Developer</option>
                    <option value="1" {{ $formposition->pos_id == 6 ? 'selected' : '' }}>Ui Design</option>
                    <option value="1" {{ $formposition->pos_id == 7 ? 'selected' : '' }}>3D Model</option>
                    <option value="1" {{ $formposition->pos_id == 8 ? 'selected' : '' }}>BA/Project Co.</option>
                    <option value="1" {{ $formposition->pos_id == 9 ? 'selected' : '' }}>Digital Marketing</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fp_amount_of_postion" class="form-label">Number of Positions</label>
                <input type="number" class="form-control" id="fp_amount_of_postion" name="fp_amount_of_postion" value="{{ $formposition->fp_amount_of_postion }}">
            </div>

            <div class="mb-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                <a class="btn btn-primary" href="{{ url('/forms') }}" role="button">กลับ</a>
            </div>
        </form>
    </div>
@endsection --}}

@extends('layouts.v_sidebar')

@section('content')
    <div class="container">
        <h1>แก้ไขรายละเอียดการรับสมัคร</h1>
        <form method="POST" action="{{ route('formpositions.update', $formposition->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="fp_position_type" class="form-label">ลักษณะงาน</label>
                <select class="form-control" id="fp_position_type" name="fp_position_type">
                    <option value="0" {{ $formposition->fp_position_type == 0 ? 'selected' : '' }}>พนักงาน</option>
                    <option value="1" {{ $formposition->fp_position_type == 1 ? 'selected' : '' }}>สหกิจ</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pos_id" class="form-label">ตำแหน่งงาน</label>
                <select class="form-control" id="pos_id" name="pos_id">
                    <!-- Populate options dynamically based on your data -->
                    <option value="1" {{ $formposition->pos_id == 1 ? 'selected' : '' }}>Frontend Developer</option>
                    <option value="2" {{ $formposition->pos_id == 2 ? 'selected' : '' }}>Unity Developer</option>
                    <option value="3" {{ $formposition->pos_id == 3 ? 'selected' : '' }}>Tester</option>
                    <option value="4" {{ $formposition->pos_id == 4 ? 'selected' : '' }}>Graphic Design</option>
                    <option value="5" {{ $formposition->pos_id == 5 ? 'selected' : '' }}>Backend Developer</option>
                    <option value="6" {{ $formposition->pos_id == 6 ? 'selected' : '' }}>Ui Design</option>
                    <option value="7" {{ $formposition->pos_id == 7 ? 'selected' : '' }}>3D Model</option>
                    <option value="8" {{ $formposition->pos_id == 8 ? 'selected' : '' }}>BA/Project Co.</option>
                    <option value="9" {{ $formposition->pos_id == 9 ? 'selected' : '' }}>Digital Marketing</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fp_amount_of_postion" class="form-label">จำนวนการรับสมัคร</label>
                <input type="number" class="form-control" id="fp_amount_of_postion" name="fp_amount_of_postion" value="{{ $formposition->fp_amount_of_postion }}">
            </div>

            <div class="mb-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                <a class="btn btn-primary" href="{{ route('formdetail.show', $formposition->form_id) }}" role="button">กลับ</a>
            </div>
        </form>
    </div>
@endsection

