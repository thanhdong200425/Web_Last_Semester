@extends('layouts.app')
@section('title', 'Add Song')
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
        <h2 class="text-center mb-4">Add a Song</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="song_name">Song Name:</label>
                        <input name="song_name" type="text" class="form-control" id="song_name" placeholder="Enter song name" required>
                    </div>
                    <div class="form-group">
                        <label for="singer_name">Singer Name:</label>
                        <input name="singer_name" type="text" class="form-control" id="song_name" placeholder="Enter singer name" required>
                    </div>
                    <div class="form-group">
                        <label for="cover_photo">Cover Photo:</label>
                        <input name="cover_photo" type="file" class="form-control" id="cover_photo" required>
                    </div>
                    <div class="form-group">
                        <label for="lyric">Lyric:</label>
                        <textarea name="lyric" class="form-control" id="lyric" placeholder="Enter lyric"></textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                </div>
                <div class="col-2">
                    <button type="reset" class="btn btn-light btn-block btn-sm">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
