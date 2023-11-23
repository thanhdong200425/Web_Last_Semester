@extends('layouts.app')
@section('title', 'Edit Song')
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

        <h2 class="text-center mb-4">Edit Song Information</h2>

        <div class="container">
            <form action="{{ route('song.update', ['song_id' => $song->song_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                            <!-- Name of the song -->
                            <div class="form-group">
                                <label for="song_name">Name of the song</label>
                                <input type="text" name="song_name" class="form-control" id="username"
                                    value="{{ $song->song_name }}">
                            </div>

                            {{-- Lyric --}}
                            <div class="form-group">
                                <label for="lyric">Lyric</label>
                                <textarea name="lyric" id="lyric" cols="30" rows="10" class="form-control">
                                {{ $song->lyric }}
                            </textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Song Image Display and Upload -->
                    <div class="col-md-6">
                        <div class="user-image">
                            <h4 class="mb-4">Image</h4>

                            <!-- Display User Image -->
                            @if (file_exists(public_path('uploads/' . $song->cover_photo)))
                                <img style="max-height: 250px" id="songImage"
                                    src="{{ asset('uploads/' . $song->cover_photo) }}" alt="Song Image">
                            @else
                                <img style="max-height: 250px" id="songImage" src="{{ $song->cover_photo }}"
                                    alt="Song Image">
                            @endif

                            <!-- Upload New Image Form -->
                            <div class="form-group">
                                <label for="newImage">Upload New Image</label>
                                <input type="file" class="form-control-file" id="newImage" name="cover_photo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-2">
                        <!-- Save Changes Button -->
                        <button type="submit" class="btn btn-primary btn-block btn-md">Save Changes</button>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary btn-block btn-md"
                            onclick="window.history.back();">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
