@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Manage Whats New / Quick Link</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('admin.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Quick Links</span>
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                    <h4 class="fw-semibold fs-18 mb-0">Add Quick Links</h4>
                </div>
                <form action="{{ route('microquicklinks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group mb-4">
                                <label for="language" class="label">Page Language</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="radio" name="language" value="1"> English
                                    <input type="radio" name="language" value="2"> Hindi
                                </div>
                                @error('language')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group mb-4">
                                <label for="research_centre_id" class="label">Select Research Centre</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select name="research_centre_id" id="research_centre_id"
                                        class="form-control text-dark ps-5 h-58">
                                        <option value="">Select Research Centre</option>
                                        @foreach ($researchCentres as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('research_centre_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group mb-4">
                                <label for="category_type" class="label">Category Type</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select name="category_type" id="category_type"
                                        class="form-control text-dark ps-5 h-58">
                                        <option value="">Select Category</option>
                                        <option value="1">What's New</option>
                                        <option value="2">Quick Link</option>
                                    </select>
                                    @error('category_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="name" class="label">Name</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" name="name" id="name" class="form-control text-dark ps-5 h-58">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="menu_type" class="label">Menu Type</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select name="menu_type" id="menu_type" class="form-control text-dark ps-5 h-58">
                                        <option value="">Select</option>
                                        <option value="1">Content</option>
                                        <option value="2">PDF file Upload</option>
                                        <option value="3">Website URL</option>
                                    </select>
                                    @error('menu_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="meta-fields" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="meta_title" class="label">Meta Title</label>
                                        <span class="star">*</span>
                                        <div class="form-group position-relative">
                                            <input type="text" name="meta_title" id="meta_title"
                                                class="form-control text-dark ps-5 h-58">
                                            @error('meta_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="meta_keyword" class="label">Meta Keyword</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="meta_keyword" id="meta_keyword"
                                                class="form-control text-dark ps-5 h-58">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="meta_description" class="label">Meta Description</label>
                                        <div class="form-group position-relative">
                                            <textarea class="form-control" id="meta_description"
                                                placeholder="Enter the Meta Description" name="meta_description"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="description" class="label">Description</label>
                                        <span class="star">*</span>
                                        <div class="form-group position-relative">
                                            <textarea class="form-control" id="description"
                                                placeholder="Enter the Description" name="description"
                                                rows="5"></textarea>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="pdf-field" style="display: none;">
                            <div class="form-group mb-4">
                                <label for="pdf_file" class="label">Document Upload</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="file" name="pdf_file" id="pdf_file"
                                        class="form-control text-dark ps-5 h-58">
                                    @error('pdf_file')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="website-field" style="display: none;">
                            <div class="form-group">
                                <label for="website_url" class="label">Website URL</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="url" name="website_url" id="website_url"
                                        class="form-control text-dark ps-5 h-58">
                                    @error('website_url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="start_date" class="label">Start Date</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="date" name="start_date" id="start_date"
                                        class="form-control text-dark ps-5 h-58">
                                    @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="termination_date" class="label">Termination Date</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="date" name="termination_date" id="termination_date"
                                        class="form-control text-dark ps-5 h-58">
                                    @error('termination_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="start_date" class="label">Start Date</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" name="start_date" id="start_date"
                                        class="form-control text-dark ps-5 h-58">
                                    @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="termination_date" class="label">Termination Date</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" name="termination_date" id="termination_date"
                                        class="form-control text-dark ps-5 h-58">
                                    @error('termination_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="status" class="label">Page Status</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select name="status" id="status" class="form-control text-dark ps-5 h-58">
                                        <option value="" selected>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex ms-sm-3 ms-md-0 mt-4">
                            <button class="btn btn-success text-white fw-semibold" type="submit">Submit</button> &nbsp;
                            <a href="{{ route('microquicklinks.index') }}" class="btn btn-secondary text-white">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
document.getElementById('menu_type').addEventListener('change', function() {
    const value = this.value;
    document.getElementById('meta-fields').style.display = value === '1' ? 'block' : 'none';
    document.getElementById('pdf-field').style.display = value === '2' ? 'block' : 'none';
    document.getElementById('website-field').style.display = value === '3' ? 'block' : 'none';
});



document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#start_date", {
        dateFormat: "d-m-Y", // DD-MM-YYYY format
    });
    flatpickr("#termination_date", {
        dateFormat: "d-m-Y", // DD-MM-YYYY format
    });
});
</script>


@endsection