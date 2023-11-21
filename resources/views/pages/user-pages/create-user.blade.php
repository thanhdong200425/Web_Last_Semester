@extends('layouts.app')
@section('title', 'Create User')
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
    </style>
    <div class="container">
        <h2 class="text-center mb-4 ">Create An User</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- Left-column --}}
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="cover_photo">Cover Photo:</label>
                            <input name="cover_photo" type="file" class="form-control" id="cover_photo">
                        </div>
                </div>
                <div class="col-md-6">
                    {{-- Right Column --}}
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input name="phone_number" type="tel" class="form-control" id="phone_number" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input name="dob" type="date" class="form-control" id="dob">
                        </div>
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <input name="country" type="text" class="form-control" id="country" placeholder="Enter country">
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
