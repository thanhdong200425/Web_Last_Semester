@extends('layouts.app')
@section('title', 'Users Management')
@section('main-content')
    <div class="card-box pb-10">
        <div class="h2 pd-20 mb-0">User List</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="table-plus">Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th class="datatable-nosort">Actions</th>
                </tr>
            </thead>
            <tbody id="user-list">
                @php
                    // Null coalescing operator (??) has been added in PHP 7.0 as an alternative to the ternary operator.
                    $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?? 1;
                    $itemsPerPage = 10;
                    $id = ($currentPage - 1) * $itemsPerPage + 1;
                @endphp
                @foreach ($userList as $user)
                    <tr id="{{ 'item-' . $user->id }}">
                        <td>{{ $id++ }}</td>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                {{-- Avatar --}}
                                <div class="avatar mr-2 flex-shrink-0">
                                    @php
                                        $filePath = public_path('uploads/' . $user->cover_photo);
                                    @endphp
                                    @if (file_exists($filePath))
                                        <img src="{{ asset('uploads/' . $user->cover_photo) }}"
                                            class="border-radius-100 shadow" width="40" height="40" alt="" />
                                    @elseif(file_exists(public_path('uploads/Picture/User/' . $user->cover_photo)))
                                        <img src="{{ asset('uploads/Picture/User/' . $user->cover_photo) }}"
                                            class="border-radius-100 shadow" width="40" height="40" alt="" />
                                    @else
                                        <img src="{{ $user->cover_photo }}" class="border-radius-100 shadow" width="40"
                                            height="40" alt="" />
                                    @endif
                                </div>
                                <div class="txt">
                                    <div class="weight-600">{{ $user->username }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->gender == 0)
                                {{ 'Male' }}
                            @else
                                {{ 'Female' }}
                            @endif
                        </td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" data-color="#265ed7"><i
                                        class="icon-copy dw dw-edit2"></i> </a>
                                <a data-color="#e95959" style="cursor: pointer;" class="ml-2 delete-button"
                                    data-id="{{ $user->id }}">
                                    <i class="icon-copy dw dw-delete-3"></i>
                                </a>
                                {{-- <form id="user_{{ $user->id }}"
                                    action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a data-color="#e95959"
                                        onclick="document.getElementById('user_{{ $user->id }}').submit()"
                                        style="cursor: pointer;" class="ml-2">
                                        <i class="icon-copy dw dw-delete-3"></i>
                                    </a>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-12 col-xl-12 d-flex justify-content-center">
                {{ $userList->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
    <script>
        $('.delete-button').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/admin/users/delete/' + id,
                type: 'DELETE',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#item-' + id).remove();
                },
                error: function(response) {
                    alert(response.message);
                }
            });
        });
    </script>
@endsection
