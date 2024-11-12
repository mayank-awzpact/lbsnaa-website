@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">News and Updates</h4>

            <a href="{{ route('admin.news.create') }}">
                <button class="border-0 btn btn-success py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Add News</span>
                    </span>
                </button>
            </a>
        </div>
        <div class="default-table-area members-list recent-orders">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr class="text-center">
                            <th class="col">Title</th>
                            <th class="col">Start Date</th>
                            <th class="col">Language</th>
                            <th class="col">Status</th>
                            <th class="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                        <tr>
                           <td>{{ $item->title }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->language == 1 ? 'English' : 'Hindi' }}</td>
                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->id) }}"
                                    class="btn btn-success text-white">Edit</a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-primary text-white" onclick="return confirm('Are you sure you want to delete this faculty member?')">Delete</button>
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
