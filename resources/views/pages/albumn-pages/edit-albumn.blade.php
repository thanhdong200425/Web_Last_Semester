@extends('layouts.app')
@section('title', 'Edit Album')
@section('main-content')
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    h2 {
        color: #007bff;
    }

    button {
        background-color: #007bff;
        color: #fff;
    }

    /* Add this style for equal and responsive textarea */
    textarea {
        width: 100%;
        min-height: 100px; /* Adjust the height as needed */
        resize: vertical; /* Allow vertical resizing */
    }
</style>
<div class="container">
    <h2 class="text-center mb-4">Edit Album Information</h2>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @endif
    <form action="{{ route('albumn.update', ['albumn_id' => $albumn->albumn_id]) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                {{-- Left-column --}}
                <div class="form-group">
                    <label for="name">Albumn Name:</label>
                    <input name="albumn_name" type="text" class="form-control" id="name" value="{{ $albumn->albumn_name }}"
                           required>
                </div>
                <div class="form-group">
                    <label for="number_of_songs">Number of Songs:</label>
                    <input name="number_songs" type="number" class="form-control" id="number_of_songs"
                           value="{{ $albumn->number_songs }}">
                </div>
            </div>
            <div class="col-md-6">
                {{-- Right Column --}}
                <div class="form-group">
                    <label for="cover_photo">Cover Photo:</label>
                    <input name="cover_photo" type="file" class="form-control" id="cover_photo">
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description:</label>
                    <textarea name="short_description" class="form-control" id="short_description">{{ $albumn->short_description }}</textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
            <div class="col-2">
                <button type="reset" class="btn btn-light btn-block">Reset</button>
            </div>
        </div>
    </form>
</div>
@endsection
