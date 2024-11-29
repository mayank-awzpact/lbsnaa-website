@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Manage Training Program</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('Managenews.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Training Program - Micro</span>
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4 p-4">
            <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-sm-0">Add Training Program</h4>
            </div>
            <form action="{{ route('training-programs.store') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="language" class="label">Page Language</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="radio" name="language" value="1"> English
                                <input type="radio" name="language" value="2"> Hindi
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="research_centre_id" class="label">Select Research Centre</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <select name="research_centre" id="research_centre_id"
                                    class="form-control text-dark ps-5 h-58" required>
                                    <option value="">Select Research Centre</option>
                                    @foreach ($researchCentres as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="program_name" class="label">program_name</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="program_name" class="form-control text-dark ps-5 h-58"
                                    required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="venue" class="label">venue</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="venue" class="form-control text-dark ps-5 h-58" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="program_coordinator" class="label">program_coordinator</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="program_coordinator" class="form-control text-dark ps-5 h-58"
                                    required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="program_description" class="label">program_description</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="program_description" class="form-control text-dark ps-5 h-58"
                                    required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="start_date" class="label">start_date</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="date" name="start_date" class="form-control text-dark ps-5 h-58" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="end_date" class="label">end_date</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="date" name="end_date" class="form-control text-dark ps-5 h-58" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="important_links" class="label">important_links</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="important_links" class="form-control text-dark ps-5 h-58"
                                    required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="registration_status" class="label">registration_status</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <select name="registration_status" id="registration_status"
                                    class="form-control text-dark ps-5 h-58">
                                    <option value="" selected>Select</option>
                                    <option value="1" class="text-dark">On</option>
                                    <option value="2" class="text-dark">Off</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="page_status" class="label">page_status</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <select name="page_status" class="form-control" required>
                                    <option value="" class="text-dark" selected>Select</option>
                                    <option value="1" class="text-dark">Active</option>
                                    <option value="0" class="text-dark">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex ms-sm-3 ms-md-0">
                        <button class="btn btn-success text-white fw-semibold" type="submit">Update</button>
                        &nbsp;
                        <a href="{{ route('training-programs.index') }}" class="btn btn-secondary text-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function() {
    let today = new Date().toISOString().split('T')[0];

    const startDateInput = document.querySelector('input[name="start_date"]');
    const endDateInput = document.querySelector('input[name="end_date"]');

    // Set min date for both start and end date on page load
    startDateInput.setAttribute('min', today);
    endDateInput.setAttribute('min', today);

    // Update end date min whenever start date is changed
    startDateInput.addEventListener('change', function() {
        endDateInput.setAttribute('min', this.value);
    });
});
</script>