@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-0">Edit Exam</h4>
            </div>

                <form action="{{ route('exam.update', $exams->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="exm_code">Exam Code :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="exm_code" id="exm_code" value="{{ $exams->exam_code }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="exm_desc">Exam Description :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="exm_desc" id="exm_desc" value="{{ $exams->exam_description }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="exm_user_id">User ID :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="exm_user_id" id="exm_user_id" value="{{ $exams->user_id }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="exm_date">Transaction Date :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="exm_date" id="exm_date" value="{{ $exams->transaction_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="preliminary_flag" class="label">Preliminary Flag</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                        <input class="form-check-input" type="radio" name="preliminary_flag" id="preliminary_flag" value="1" {{ $exams->preliminary_flag == 1 ? 'checked' : '' }}> Yes
                                        <input class="form-check-input" type="radio" name="preliminary_flag" id="preliminary_flag" value="0" {{ $exams->preliminary_flag == 0 ? 'checked' : '' }}> No
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="main_flag" class="label">Main Flag</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                        <input class="form-check-input" type="radio" name="preliminary_flag" id="preliminary_flag" value="1" {{ $exams->main_flag == 1 ? 'checked' : '' }}> Yes
                                        <input class="form-check-input" type="radio" name="preliminary_flag" id="preliminary_flag" value="0" {{ $exams->main_flag == 0 ? 'checked' : '' }}> No
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="status">Status :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select class="form-select form-control ps-5 h-58" name="status" id="status" required>
                                        <option value="1" class="text-dark" {{ $exams->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" class="text-dark" {{ $exams->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex ms-sm-3 ms-md-0">
                            <button class="btn btn-success text-white fw-semibold" type="submit">Update</button> &nbsp;
                            <a href="{{ route('exam.index') }}" class="btn btn-secondary text-white">Back</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection