@extends('layouts.app')
@section('title', 'Singers')
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
            resize: vertical;
            /* Allow vertical resizing */
        }

        .button-container a {
            display: inline-block;
        }
    </style>
    <div class="container">
        <h2 class="text-center mb-4">Singers</h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover Photo</th>
                    <th>Singer Name</th>
                    <th>Stage Name</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentPage = Illuminate\Pagination\Paginator::resolveCurrentPage() ?? 1;
                    $itemPerPage = 5;
                    $id = ($currentPage - 1) * $itemPerPage + 1;
                @endphp
                @foreach ($singers as $singer)
                    <tr id="item-{{$singer->singer_id}}">
                        <td>{{ $id++ }}</td>
                        <td>
                            @php
                                $nameFile = file_exists(public_path('uploads/' . $singer->cover_photo)) ? asset('uploads/' . $singer->cover_photo) : $singer->cover_photo;
                            @endphp
                            <img src="{{ $nameFile }}" alt="Cover Photo" style="max-width: 50px;">
                        </td>
                        <td>{{ $singer->singer_name }}</td>
                        <td>{{ $singer->stage_name }}</td>
                        <td>{{ $singer->country }}</td>
                        <td>{{ $singer->gender }}</td>
                        <td>{{ $singer->dob }}</td>
                        <td>{{ $singer->created_at }}</td>
                        <td class="button-container">
                            {{-- Customize the interface --}}
                            <a href="{{ route('singer.edit', ['singer_id' => $singer->singer_id]) }}"
                                class="btn btn-outline-primary btn-sm ">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a class="btn btn-outline-danger btn-sm delete-button" data-id="{{$singer->singer_id}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            {{-- <form id="singer_{{ $singer->singer_id }}"
                                action="{{ route('singer.delete', ['singer_id' => $singer->singer_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-outline-danger btn-sm"
                                    onclick="document.getElementById('singer_{{ $singer->singer_id }}').submit();">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $singers->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <script>
        $('.delete-button').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/admin/singers/delete/' + id,
                method: 'DELETE',
                data: {
                    "_token": "{{csrf_token()}}"
                },
                success: function(response) {
                    $('#item-'+id).remove();
                }
            });
        });
    </script>

@endsection
