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
                <h4 class="fw-semibold fs-18 mb-sm-0">Edit Training Program</h4>
            </div>
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('training-programs.update', $trainingProgram->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="label">Page Language</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="radio" name="language" value="1"
                                    {{ $trainingProgram->language == '1' ? 'checked' : '' }} required> English
                                <input type="radio" name="language" value="2"
                                    {{ $trainingProgram->language == '2' ? 'checked' : '' }}> Hindi
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="label" for="research_centre">Select Research Centre:</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <select class="form-select form-control ps-5 h-58" name="research_centre"
                                    id="research_centre" required>
                                    <option value="" disabled
                                        {{ is_null($trainingProgram->research_centre) ? 'selected' : '' }}>
                                        Select Research Centre
                                    </option>
                                    dd($researchCentres);
                                    @foreach($researchCentres as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ (string)$trainingProgram->research_centre === (string)$id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="label">Program Name</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="program_name" class="form-control text-dark ps-5 h-58"
                                    value="{{ $trainingProgram->program_name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="label">Venue</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="venue" class="form-control text-dark ps-5 h-58"
                                    value="{{ $trainingProgram->venue }}" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="label">Program Co-ordinator</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <input type="text" name="program_coordinator" class="form-control text-dark ps-5 h-58"
                                    value="{{ $trainingProgram->program_coordinator }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="label">Program Description</label>
                            <span class="star">*</span>
                            <div class="form-group position-relative">
                                <textarea name="program_description" class="form-control text-dark ps-5 h-58"
                                    required>{{ $trainingProgram->program_description }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-4">
                    <label class="label">Start Date</label>
                    <span class="star">*</span>
                    <input type="date" name="start_date" class="form-control" value="{{ $trainingProgram->start_date }}"
                        required>
                </div>
                    </div>

                </div>

               

                <div class="form-group">
                    <label>End Date *</label>
                    <input type="date" name="end_date" class="form-control" value="{{ $trainingProgram->end_date }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Important Links</label>
                    <textarea name="important_links"
                        class="form-control">{{ $trainingProgram->important_links }}</textarea>
                </div>

                <div class="form-group">
                    <label>Registration Status *</label><br>
                    <input type="radio" name="registration_status" value="1"
                        {{ $trainingProgram->registration_status == '1' ? 'checked' : '' }} required> ON
                    <input type="radio" name="registration_status" value="2"
                        {{ $trainingProgram->registration_status == '2' ? 'checked' : '' }}> OFF
                </div>

                <div class="form-group">
                    <label>Page Status *</label>
                    <select name="page_status" class="form-control" required>
                        <option value="1" {{ $trainingProgram->page_status == '1' ? 'selected' : '' }}>Active
                        </option>
                        <option value="0" {{ $trainingProgram->page_status == '0' ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('training-programs.index') }}" class="btn btn-secondary">Cancel</a>
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