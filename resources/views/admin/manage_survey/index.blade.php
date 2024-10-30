@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Survey</h4>
            
            <a href="{{ route('survey.create') }}">
                <button class="border-0 btn btn-success py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Add Survey</span>
                    </span>
                </button>
            </a>
        </div>
        <div class="default-table-area members-list">
    <div class="table-responsive">
        <table class="table align-middle" id="myTable">
            <thead>
                <tr class="text-center">
                    <th class="col">ID</th>
                    <th class="col">Survey Title</th>
                    <th class="col">Start Date </th>
                    <th class="col">Expire Date </th>
                    <th class="col">Status</th>
                    <th class="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($survey as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->survey_title }}</td>
                            <td>{{ $record->start_date }}</td>
                            <td>{{ $record->end_date }}</td>
                            <td>{{ $record->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('survey.edit', $record->id) }}" class="btn bg-success text-white btn-sm">Edit</a>
                                <form action="{{ route('survey.destroy', $record->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>

@endsection 