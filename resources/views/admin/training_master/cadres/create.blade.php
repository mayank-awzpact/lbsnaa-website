@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-0">Add Cadre</h4>
            </div>

                <form action="{{ route('cadres.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="language">Page Language :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input class="form-check-input" type="radio" name="language" value="english">
                                    <label class="form-check-label" for="english">
                                        English
                                    </label>
                                    <input class="form-check-input" type="radio" name="language" value="hindi">
                                    <label class="form-check-label" for="hindi">
                                        Hindi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="cadres_code">Cadres Code :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="cadres_code"
                                        id="cadres_code">
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="cadres_desc">Cadres Desc :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="cadres_desc"
                                        id="cadres_desc">
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="texttype">Status :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select class="form-select form-control ps-5 h-58" name="status" id="status" required>
                                        <option value="1" class="text-dark">Active</option>
                                        <option value="0" class="text-dark">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex ms-sm-3 ms-md-0">
                            <button class="btn btn-success text-white fw-semibold" type="submit">Submit</button> &nbsp;
                            <button class="btn btn-warning text-white fw-semibold" type="reset">Reset</button> &nbsp;
                            <a href="{{ route('cadres.index') }}" class="btn btn-secondary text-white">Cancel</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


<!-- Include Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script>
    // Initialize the Quill editor
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: '#toolbar-container'
        },
        theme: 'snow'
    });

    // Transfer the editor content to the hidden input on form submission
    document.getElementById('cadreForm').onsubmit = function() {
        document.getElementById('cadres_desc').value = quill.root.innerHTML;
    };
</script>
@endsection
