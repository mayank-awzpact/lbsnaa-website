@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Add Coordinator</h2>
    <form action="{{ route('coordinators.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="page_language">Page Language:</label>
            <div>
                <label><input type="radio" name="page_language" value="English" required> English</label>
                <label><input type="radio" name="page_language" value="Hindi" required> Hindi</label>
                <!-- Add more languages as needed -->
            </div>
        </div>
        <div class="mb-3">
            <label for="coordinator_name">Co-ordinators Name:</label>
            <input type="text" name="coordinator_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a href="{{ route('coordinators.index') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>
@endsection
