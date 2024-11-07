@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage organisation chart</h4>
        </div>
        <div class="default-table-area members-list">
    <div class="table-responsive">
        <table class="table align-middle" id="myTable">
            <thead>
                <tr class="text-center">
                    <th class="col">ID</th>
            <th class="col">Employee Name</th>
            <th class="col">Sub org.</th>
            <th class="col">Description</th>
            <th class="col">Status</th>
            <th class="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->employee_name }}</td>
                            <td><a href="{{ route('organisation_chart.sub_org', ['parent_id' => $record->id]) }}" class="btn btn-secondary">click here</a></td>
                            <td>{{ $record->description }}</td>
                            <td>{{ $record->status == 1 ? 'Draft' : ($record->status == 2 ? 'Approval' : 'Publish') }}</td>
                            <td>
                                <a href="{{ route('organisation_chart.edit', $record->id) }}" class="btn bg-success text-white btn-sm">Edit</a>
                                <form action="{{ route('organisation_chart.destroy', $record->id) }}" method="POST" style="display:inline;">
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
