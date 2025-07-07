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
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <!-- ID -->
                            <div class="form-row">
                                <div class="col">
                                    <label for="id">ID <span class="text-danger">*</span></label>
                                    <input type="text" name="id" class="form-control" value="{{ old('id') }}" required>
                                    @error('id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <!-- First Name and Last Name -->
                            <div class="form-row">
                                <div class="col">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <!-- Phone and Address -->
                            <div class="form-row">
                                <div class="col">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <!-- Role -->
                            <div class="form-row">
                                <div class="col">
                                    <label for="role">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="custom-select" required>
                                        <option value="3">Student</option>
                                        <option value="2">Professor</option>
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                     

                            <!-- Year and Department -->
                            <div class="form-row">
                                <div class="col">
                                    <label for="year">Year <span class="text-danger">*</span></label>
                                    <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
                                    @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="department">Department <span class="text-danger">*</span></label>
                                    <input type="text" name="department" class="form-control" value="{{ old('department') }}" required>
                                    @error('department')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <!-- Submit Button -->
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    @endsection