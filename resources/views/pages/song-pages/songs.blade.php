@extends('layouts.app')
@section('title', 'Songs')
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

        h2 {
            color: #007bff;
        }

        .actions {
            position: relative;
            cursor: pointer;
        }

        .actions-dropdown {
            display: none;
            position: absolute;
            top: 70%;
            left: -20%;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 5px;
            z-index: 1000;
        }

        .actions-dropdown a {
            display: block;
            padding: 5px;
            color: #212529;
            text-decoration: none;
        }

        .actions-dropdown a:hover {
            background-color: #f8f9fa;
            color: blue;
        }
    </style>

    <div class="container">
        <h2 class="text-center mb-4">Song Information</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Song Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Cover Photo</th>
                    <th scope="col">Singer Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?? 1;
                    $itemPerPage = 5;
                    $id = ($currentPage - 1) * $itemPerPage + 1;
                @endphp
                @foreach ($songs as $song)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td>{{ $song->song_name }}</td>
                        <td class="small-text">{{ $song->created_at }}</td>
                        <td class="small-text">{{ $song->updated_at }}</td>
                        <td>
                            @php
                                $nameFile = file_exists(public_path('uploads/' . $song->cover_photo)) ? 'public/uploads/' . $song->cover_photo : $song->cover_photo;
                                dd($nameFile);
                            @endphp
                            <img src="{{ $nameFile }}" alt="Cover Photo" style="max-width: 50px;">
                        </td>
                        <td>Singer A</td>
                        <td class="actions" onclick="toggleDropdown(this)">
                            ...
                            <div class="actions-dropdown">
                                <a href="#">
                                    <span class="micon bi bi-eye"></span>
                                    <span class="mtext">View</span>
                                </a>
                                <a href="{{ route('song.edit', ['song_id' => $song->song_id]) }}">
                                    <span class="micon bi bi-pencil"></span>
                                    <span class="mtext">Edit</span>
                                </a>
                                <form id="song_{{ $song->song_id }}" action="{{ route('song.destroy', $song->song_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a onclick="document.getElementById('song_{{ $song->song_id }}').submit();">
                                        <span class="micon bi bi-trash3"></span>
                                        <span class="mtext">Delete</span>
                                    </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-12 col-xl-12 d-flex justify-content-center">
                {{ $songs->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
    <script>
        function toggleDropdown(element) {
            var dropdown = element.querySelector('.actions-dropdown');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
    </script>
@endsection
