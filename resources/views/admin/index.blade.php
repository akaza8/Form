@extends('layout.admin-layout')

@section('title')
Hotel Form
@endsection

@section('dashboard')
Hotels
@endsection

@section('index-content')
<div class="container mt-2">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ isset($hotel) ? route('hotel.update', $hotel->id) : route('layoutform.data') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="hotel-id" class="form-label">Hotel ID</label>
            <input type="text" name="id" id="hotel-id" class="form-control" placeholder="Hotel ID" value="{{ old('id', $hotel->id ?? '') }}">
            @error('id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="hotel-title">Title</label>
            <input type="text" name="title" id="hotel-title" class="form-control" placeholder="Enter Hotel Title" value="{{ old('title', $hotel->title ?? '') }}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="food-type">Type</label>
            <select name="type" id="food-type" class="form-control">
                <option value="veg" {{ (old('type', $hotel->type ?? '') == 'veg') ? 'selected' : '' }}>Veg</option>
                <option value="non-veg" {{ (old('type', $hotel->type ?? '') == 'non-veg') ? 'selected' : '' }}>Non-Veg</option>
            </select>
            @error('type')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="tel" name="contact" id="contact" class="form-control" placeholder="Enter Contact Number" value="{{ old('contact', $hotel->contact ?? '') }}">
            @error('contact')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">Select Rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ (old('rating', $hotel->rating ?? '') == $i) ? 'selected' : '' }}>{{ $i }} Star(s)</option>
                @endfor
            </select>
            @error('rating')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">{{ isset($hotel) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
@endsection
