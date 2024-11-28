@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')

<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Manage Quick Links</h3>
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
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Quick Links</h4>
            <a href="{{ route('admin.quick_links.create') }}">
                <button class="border-0 btn btn-success py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Add Quick Link</span>
                    </span>
                </button>
            </a>
        </div>
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr class="text-center">
                            <th class="col">#</th>
                            <th class="col">Quick Link Text</th>
                            <th class="col">Type</th>
                            <th class="col">URL / Document</th>
                            <th class="col">Action</th>
                            <th class="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quickLinks as $quickLink)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Display Index -->
                            <td>{{ $quickLink->text }}</td>
                            <td>{{ $quickLink->url ? 'URL' : 'Document' }}</td>
                            <td>
                                @if ($quickLink->url)
                                <a href="{{ $quickLink->url }}" target="_blank">{{ $quickLink->url }}</a>
                                @elseif ($quickLink->file)
                                <a href="{{ asset('quick-links-files/' . $quickLink->file) }}" target="_blank">View
                                    Document</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.quick_links.edit', $quickLink->id) }}"
                                    class="btn bg-success text-white btn-sm">Edit</a>
                                <form action="{{ route('admin.quick_links.destroy', $quickLink->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-primary text-white"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input status-toggle" type="checkbox" role="switch"
                                        data-table="quick_links" data-column="status" data-id="{{$quickLink->id}}"
                                        {{$quickLink->status ? 'checked' : ''}}>
                                </div>
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