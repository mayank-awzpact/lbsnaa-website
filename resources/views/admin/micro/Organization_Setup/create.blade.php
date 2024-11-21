@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Add Organization Setup</h2>
    
    <form action="{{ route('organization_setups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="research_centre_id">Select Research Centre *</label>
            <select name="research_centre" id="research_centre_id" class="form-control" required>
                <option value="">Select Research Centre</option>
                @foreach ($researchCentres as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Page Language *</label><br>
            <input type="radio" name="language" value="1" required> English
            <input type="radio" name="language" value="2"> Hindi
        </div>

        <div class="form-group">
            <label>Employee Name *</label>
            <input type="text" name="employee_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Designation *</label>
            <input type="text" name="designation" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Program Description *</label>
            <textarea name="program_description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Upload Main Image *</label>
            <input type="file" name="main_image" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Page Status *</label>
            <select name="page_status" class="form-control" required>
                <option value="">Select</option>
                <option value="1">Draft</option>
                <option value="2">Approval</option>
                <option value="3">Publish</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a href="{{ route('organization_setups.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4 p-4">
            <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-sm-0">Add Organization Setup</h4>
            </div>

            <form action="{{ route('organization_setups.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="research_centre" class="label">research_centre</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="research_centre" class="form-control text-dark ps-5 h-58"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="language" class="label">language</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="radio" name="language" value="1"> English
                                <input type="radio" name="language" value="2"> Hindi
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="employee_name" class="label">employee_name</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="employee_name" class="form-control text-dark ps-5 h-58"
                                    id="employee_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="designation" class="label">designation</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="designation" class="form-control text-dark ps-5 h-58"
                                    id="designation" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="email" class="label">email</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="email" name="email" class="form-control text-dark ps-5 h-58" id="email"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="program_description" class="label">program_description</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <textarea name="program_description" class="form-control text-dark ps-5 h-58"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="main_image" class="label">main_image</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="file" name="main_image" class="form-control text-dark ps-5 h-58"
                                    id="main_image" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="page_status" class="label">page_status</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <select name="page_status" class="form-control text-dark ps-5 h-58" id="page_status">
                                    <option value="" class="col">Select</option>
                                    <option value="1" class="col">Draft</option>
                                    <option value="2" class="col">Approval</option>
                                    <option value="3" class="col">Publish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex ms-sm-3 ms-md-0">
                        <button class="btn btn-success text-white fw-semibold" type="submit">Submit</button>
                        &nbsp;
                        <a href="{{ route('organization_setups.index') }}"
                            class="btn btn-secondary text-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('admin_assets/js/ckeditor.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#program_description' ) )
    .catch( error => {
    console.error( error );
    });
</script>
@endsection