@extends('layout.admin-layout')

@section('title')
Hotel Data
@endsection

@section('dashboard')
Hotel Information
@endsection

@section('index-content')
<div class="container mt-0 card px-5 mb-3">
    <!-- <h2 class="">Hotel List</h2> -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive card-body">
    <a href="{{ route('layoutform.show') }}" class="btn btn-success my-4 float-right mx-0 ">Add New Hotel</a>
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

    
</div>
@endsection
