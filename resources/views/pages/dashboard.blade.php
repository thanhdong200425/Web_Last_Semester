@php
    $user = session('admin');
    $username = strtoupper($user['username']);
@endphp
@extends('layouts.app')
@section('User name', $username)
@section('title', 'Dashboard')
@section('main-content')
    {{-- Overview --}}
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Dashboard Overview</h2>
        </div>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- Start of Row --}}
        {{-- Start of Col --}}
        <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $albumnQuantity }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Albumns
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#00eccf">
                                <i class="fa-solid fa-radio"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $singerQuantity }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Singers
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ff5b5b">
                                <i class='fa-solid fa-podcast'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $songQuantity }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Songs
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon">
                                <i class="fa-regular fa-file-audio"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $userQuantity }}</div>
                            <div class="font-14 text-secondary weight-500">Users</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#09cc06">
                                <i class="fa-regular fa-circle-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            
        </div>
        {{-- End of Col --}}
        {{-- End of Row --}}

        {{-- Start of Row --}}
        <div class="card-box pb-10">
            <div class="h4 pd-20 mb-0">Singer List</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Stage Name</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Date of Birth</th>
                        <th>Short Descrition</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($singersList as $singer)
                        <tr>
                            <td class="table-plus">
                                <div class="name-avatar d-flex align-items-center">
                                    {{-- Avatar --}}
                                    {{-- <div class="avatar mr-2 flex-shrink-0">
                                    <img
                                        src="/back/vendors/images/photo4.jpg"
                                        class="border-radius-100 shadow"
                                        width="40"
                                        height="40"
                                        alt=""
                                    />
                                </div> --}}
                                    <div class="txt">
                                        <div class="weight-600">{{ $singer->singer_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $singer->stage_name }}</td>
                            <td>{{ $singer->gender }}</td>
                            <td>{{ $singer->country }}</td>
                            <td>{{ $singer->dob }}</td>
                            <td>
                                <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Verified</span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                    <form id="deleteSinger{{ $singer->singer_id }}"
                                        action="{{ route('dashboard.delete-singer', ['singer_id' => $singer->singer_id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="ml-2" style="cursor: pointer" data-color="#e95959"
                                            onclick="event.preventDefault(); document.getElementById('deleteSinger{{ $singer->singer_id }}').submit();">
                                            <i class="icon-copy dw dw-delete-3"></i>
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
                    {{ $singersList->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
        {{-- End of Row --}}

        {{-- Start of Row --}}
        <div class="row pb-10">
            <div class="col-md-8 mb-20">
                <div class="card-box height-100-p pd-20">
                    <div
                        class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3"
                    >
                        <div class="h5 mb-md-0">Hospital Activities</div>
                        <div class="form-group mb-md-0">
                            <select class="form-control form-control-sm selectpicker">
                                <option value="">Last Week</option>
                                <option value="">Last Month</option>
                                <option value="">Last 6 Month</option>
                                <option value="">Last 1 year</option>
                            </select>
                        </div>
                    </div>
                    <div id="activities-chart"></div>
                </div>
            </div>
            <div class="col-md-4 mb-20">
                <div
                    class="card-box min-height-200px pd-20 mb-20"
                    data-bgcolor="#455a64"
                >
                    <div class="d-flex justify-content-between pb-20 text-white">
                        <div class="icon h1 text-white">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                        </div>
                        <div class="font-14 text-right">
                            <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                            <div class="font-12">Since last month</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="text-white">
                            <div class="font-14">Appointment</div>
                            <div class="font-24 weight-500">1865</div>
                        </div>
                        <div class="max-width-150">
                            <div id="appointment-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                    <div class="d-flex justify-content-between pb-20 text-white">
                        <div class="icon h1 text-white">
                            <i class="fa fa-stethoscope" aria-hidden="true"></i>
                        </div>
                        <div class="font-14 text-right">
                            <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                            <div class="font-12">Since last month</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="text-white">
                            <div class="font-14">Surgery</div>
                            <div class="font-24 weight-500">250</div>
                        </div>
                        <div class="max-width-150">
                            <div id="surgery-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of Row --}}
    </div>
    {{-- End of Overview --}}


@endsection




