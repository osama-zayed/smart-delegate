@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-10">Welcome</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100" style="background: #727f9f ;border-radius: 5px;overflow: hidden ">
                    <div class="card-body p-0 ">
                        <div class="clearfix ">
                            <div class="p-20 pb-30">
                                <h5 class="card-text text-light mb-10">Number of users </h5>
                                <h4 class="text-light">{{ $data['users_count'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100" style="background: #01b9ff ;border-radius: 5px;overflow: hidden ">
                    <div class="card-body p-0 ">
                        <div class="clearfix ">
                            <div class="p-20 pb-30">
                                <h5 class="card-text text-light mb-10">Number of rooms </h5>
                                <h4 class="text-light">{{ $data['number_of_rooms'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100" style="background: #354262 ;border-radius: 5px;overflow: hidden ">
                    <div class="card-body p-0 ">
                        <div class="clearfix ">
                            <div class="p-20 pb-30">
                                <h5 class="card-text text-light mb-10">Number of posts </h5>
                                <h4 class="text-light">{{ $data['number_of_posts'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100" style="background: #0361e7 ;border-radius: 5px;overflow: hidden ">
                    <div class="card-body p-0 ">
                        <div class="clearfix ">
                            <div class="p-20 pb-30">
                                <h5 class="card-text text-light mb-10">Number of proposals </h5>
                                <h4 class="text-light">{{ $data['number_of_proposals'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <livewire:notification-component />

    </div>
@endsection
