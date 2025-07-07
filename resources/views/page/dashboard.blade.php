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
        <div class="row">
            <div class="col-md-6 mb-30">
                <div class="card card-statistics ">
                    <div class="card-body">
                        <form method="post" action="" autocomplete="off">
                            @csrf
                            <h3 style="font-family: 'Cairo', sans-serif;">Notification</h3><br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-10">
                                    <label for="student_id">Student
                                        <span class="text-danger">*
                                            @error('student_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <select class="form-control h-65" name="Student_id" searchable
                                        aria-placeholder="Select a student from the list." required>
                                        <option value="" disabled selected>Select a student from the list.</option>
                                        <option value="osama">osama</option>
                                        <option value="Ali">Ali</option>
                                        <option value="Ahmed">Ahmed</option>
                                        {{-- @forelse (\App\Models\Student::get() as $data)
                                            <option value="{{ $data['id'] }}"
                                                @if ($data->id == old('Student_id')) selected @endif>
                                                {{ $data['full_name'] }}</option>
                                        @empty
                                            <option value="">لا يوجد طلاب</option>
                                        @endforelse --}}
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-10">
                                    <label for="NoticeContent">Notification content
                                        <span class="text-danger">*

                                        </span>
                                    </label>
                                    <textarea class="form-control" name="NoticeContent" id="NoticeContent" cols="10" rows="3" required>

                                   </textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
           <div class="col-md-6 mb-30">
            <div class="card custom-notification-card">
                <div class="card-body custom-notifications-scroll">
                    <!-- Notification Item 1 -->
                    <div class="custom-notification-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex  align-items-center">
                                    <h6 class="mb-0">osama </h6>  
                                    <small class="custom-notification-time ml-2"> 3 hours ago</small>
                                </div>
                                <p class="custom-notification-content mb-0">
                                    A new document has been added to the system. Please review and approve it.
                                </p>
                            </div>
                            <div class="custom-notification-icon ms-3">
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Item 2 -->
                    <div class="custom-notification-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex  align-items-center">
                                    <h6 class="mb-0">osama </h6>  
                                    <small class="custom-notification-time ml-2"> 5 hours ago</small>
                                </div>
                                <p class="custom-notification-content mb-0">
                                    Your order status has been updated to "Completed"
                                </p>
                            </div>
                            <div class="custom-notification-icon ms-3">
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Item 3 -->
                    <div class="custom-notification-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex  align-items-center">
                                    <h6 class="mb-0">osama</h6>  
                                    <small class="custom-notification-time ml-2"> 8 hours ago</small>
                                </div>
                                <p class="custom-notification-content mb-0">
                                    You have a new message from administration
                                </p>
                            </div>
                            <div class="custom-notification-icon ms-3">
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Item 4 -->
                    <div class="custom-notification-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex  align-items-center">
                                    <h6 class="mb-0">osama </h6>  
                                    <small class="custom-notification-time ml-2"> 9 hours ago</small>
                                </div>
                                <p class="custom-notification-content mb-0">
                                    New system update is available. Please check the details.
                                </p>
                            </div>
                            <div class="custom-notification-icon ms-3">
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
