@extends('layout.admin-layout')

@section('title')
Hotel Data
@endsection

@section('dashboard')
Hotel Information
@endsection

@section('index-content')
<div class="container mt-5">
    <h2 class="mb-4">Hotel List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hotel ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Contact Number</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->title }}</td>
                    <td>{{ ucfirst($hotel->type) }}</td>
                    <td>{{ $hotel->contact }}</td>
                    <td>{{ $hotel->rating }} Star(s)</td>
                    <td>
                        <a href="{{ route('layoutform.show', ['id' => $hotel->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('layoutform.show') }}" class="btn btn-success mt-4">Add New Hotel</a>
</div>
@endsection
