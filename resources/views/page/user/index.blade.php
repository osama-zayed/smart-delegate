@extends('layouts.master')
@section('css')
    <div style="display: none">@toastr_css</div>
@endsection

@section('title')
    User
@endsection
@section('page-header')
    User
@endsection
@section('sub-page-header')
    User List
@endsection
@section('PageTitle')
    User
@endsection
<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {{-- <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">
                        <i class="ti-plus"></i>
                        اضافة
                        مستخدم
                        جديد</a><br><br> --}}
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>Department</th>
                                    <th>address</th>
                                    <th>phone</th>
                                    <th>year</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user['ID'] }}</td>
                                        <td>{{ $user['first_name'] }}</td>
                                        <td>{{ $user['last_name'] }}</td>
                                        <td>{{ $user['Department'] }}</td>
                                        <td>{{ $user['address'] }}</td>
                                        <td>{{ $user['phone'] }}</td>
                                        <td>{{ $user['year'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_user{{ $user['id'] }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('page.user.destroy')
                                @empty
                                    <tr>
                                        <td>2022553255</td>
                                        <td>osama</td>
                                        <td>zayed</td>
                                        <td>it</td>
                                        <td>222</td>
                                        <td>775561590</td>
                                        <td>4</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_user1" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="8">No data</td>
                                    </tr> --}}
                                @endforelse

                        </table>
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
