@extends('layouts.master')
@section('css')
    <div style="display: none">@toastr_css</div>
@endsection
@section('title')
    اضافة مستخدم جديد
@endsection
@section('page-header')
    المستخدمين
@endsection
@section('sub-page-header')
    اضافة مستخدم جديد
@endsection
@section('PageTitle')
    اضافة مستخدم جديد
@endsection
<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">اسم المستخدم
                                            <span class="text-danger">*
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" required="الحقل مطلوب">
                                    </div>
                                    <div class="col">
                                        <label for="title">الاسم الفريد
                                            <span class="text-danger">*
                                                @error('username')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ old('username') }}" required="الحقل مطلوب">
                                    </div>
                                </div><br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">كلمة السر
                                            <span class="text-danger">*
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <input type="password" name="password" class="form-control mr-sm-2"
                                            value="{{ old('password') }}" required="الحقل مطلوب">
                                    </div>
                                    <div class="col">
                                        <label for="title"> تاكيد كلمة السر
                                            <span class="text-danger">*
                                                @error('password_confirmation')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <input type="password" name="password_confirmation" class="form-control mr-sm-2"
                                            autocomplete="" value="{{ old('password_confirmation') }}"
                                            required="الحقل مطلوب">
                                    </div>
                                </div><br>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">حالة المستخدم : <span class="text-danger">*
                                                    @error('user_status')
                                                        {{ $message }}
                                                    @enderror
                                                </span></label>
                                            <select id="user_status" class="custom-select mr-sm-2" name="user_status">
                                                <option value="1" selected>مفعل</option>
                                                <option value="0">مجمد</option>
                                            </select>
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="Classroom_id">الصلاحية : <span class="text-danger">*</span></label>
                                        <select id="user_type" class="custom-select mr-sm-2" name="user_type" multiple required>
                                            <option value="student_affairs" >شوؤن طلاب</option>
                                            <option value="control" >الكنترول</option>
                                            <option value="registration" >الاستقبال</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" type="submit">حفظ
                                    البيانات</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    @endsection
    @section('js')
        @toastr_js
        @toastr_render
    @endsection
