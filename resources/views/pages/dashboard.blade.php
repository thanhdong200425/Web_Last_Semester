@extends('layouts.app')
@section('title', 'Dashboard')
@section('main-content')
    {{-- Overview --}}
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Dashboard Overview</h2>
        </div>
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
        {{-- End of Col --}}
        {{-- End of Row --}}

        {{-- Start of Row --}}
        <div class="card-box pb-10">
            <div class="h4 pd-20 mb-0">Top Singers</div>
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
                                    <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End of Row --}}
    </div>
    {{-- End of Overview --}}


@endsection
