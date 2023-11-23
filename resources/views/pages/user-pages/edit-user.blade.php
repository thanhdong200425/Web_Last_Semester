@extends('layouts.app')
@section('title', 'Edit User')
@section('main-content')
    <div class="container">
        <style>
            body {
                background-color: #f8f9fa;
            }

            .container {
                margin-top: 50px;
            }

            .user-info-form {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
            }

            .user-image {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
            }

            label {
                font-weight: bold;
            }

            #userImage {
                max-width: 100%;
                height: auto;
                margin-bottom: 20px;
            }
        </style>

        <h2 class="text-center mb-4">Edit User Information</h2>

        <div class="container">
            <div class="row">
                <!-- User Information Form -->
                <div class="col-md-6">
                    <div class="user-info-form">
                        <h4 class="mb-4">Information</h4>

                        {{-- Display errors if it exist --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
                            <!-- Username -->
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ $user->username }}">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $user->email }}">
                            </div>

                            <!-- Gender -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Male</option>
                                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Country -->
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="form-control" id="country"
                                    value="{{ $user->country }}">
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob"
                                    value="{{ $user->dob }}">
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control" id="phone"
                                    value="{{ $user->phone_number }}">
                            </div>

                            <!-- Save Changes Button -->
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>

                <!-- User Image Display and Upload -->
                <div class="col-md-6">
                    <div class="user-image">
                        <h4 class="mb-4">Image</h4>

                        <!-- Display User Image -->
                        <img id="userImage" src="{{ asset('uploads/' . $user->cover_photo) }}" alt="User Image">

                        <!-- Upload New Image Form -->
                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="newImage">Upload New Image</label>
                                <input type="file" class="form-control-file" id="newImage" name="cover_photo">
                            </div>
                            <button type="submit" class="btn btn-secondary btn-block">Upload Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
