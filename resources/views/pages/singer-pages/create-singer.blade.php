@extends('layouts.app')
@section('title', 'Add Singer')
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

        .form-group textarea {
            width: 100%;
            min-height: 100px;
            max-height: 143px;
            resize: vertical; /* Allow vertical resizing */
        }
    </style>
    <div class="container">
        <h2 class="text-center mb-4">Add a Singer</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form action="{{ route('singer.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- Left-column --}}
                    <div class="form-group">
                        <label for="singer_name">Singer Name:</label>
                        <input name="singer_name" type="text" class="form-control" id="singer_name" placeholder="Enter singer name" required>
                    </div>
                    <div class="form-group">
                        <label for="stage_name">Stage Name:</label>
                        <input name="stage_name" type="text" class="form-control" id="stage_name" placeholder="Enter stage name" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input name="country" type="text" class="form-control" id="country" placeholder="Enter country" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input name="dob" type="date" class="form-control" id="dob" required>
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- Right Column --}}
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" class="form-control" id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cover_photo">Cover Photo:</label>
                        <input name="cover_photo" type="file" class="form-control" id="cover_photo" required>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description:</label>
                        <textarea name="short_description" class="form-control" id="short_description" placeholder="Enter short description" rows="1"></textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <div class="col-2">
                    <button type="reset" class="btn btn-light btn-block">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
