@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Organisers</h4>
            
            <a href="{{ route('organisers.create') }}">
                <button class="border-0 btn btn-success py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Add Organiser</span>
                    </span>
                </button>
            </a>
        </div>
        <div class="default-table-area members-list">
    <div class="table-responsive">
        <table class="table align-middle" id="myTable">
            <thead>
                <tr class="text-center">
                    <th class="col">ID</th> <!-- Updated to reflect the index -->
                    <th class="col">Section Name</th>
                    <th class="col">Language</th>
                    <th class="col">Status</th>
                    <th class="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organisers as $organiser)
                        <tr>
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ $organiser->organiser_name }}</td>
                            <td>{{ ucfirst($organiser->language) }}</td>
                            <td>
                                @if ($organiser->status == 1)
                                    Active
                                @elseif ($organiser->status == 2)
                                    Inactive
                                @else
                                    Unknown
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('organisers.edit', $organiser->id) }}" class="btn bg-success text-white btn-sm">Edit</a>
                                <form action="{{ route('organisers.destroy', $organiser->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
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
