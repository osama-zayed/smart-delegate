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
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">
                    <i class="ti-plus"></i>
                    Add User</a><br><br>
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
                                <th>role</th>
                                <th>year</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)

                            @php
                            $userData = $user['data'];
                            @endphp
                            @if ($userData['role'] != 1)
                            <tr>
                                <td>{{ $userData['ID'] ?? 'N/A' }}</td>
                                <td>{{ $userData['first_name'] ?? 'N/A' }}</td>
                                <td>{{ $userData['last_name'] ?? 'N/A' }}</td>
                                <td>{{ $userData['Department'] ?? 'N/A' }}</td>
                                <td>{{ $userData['address'] ?? 'N/A' }}</td>
                                <td>{{ $userData['phone'] ?? 'N/A' }}</td>
                                @if ($userData['role'] == 3)
                                <td>student</td>
                                @elseif($userData['role'] == 2)
                                <td>professor</td>
                                @endif
                                <td>{{ $userData['year'] ?? 'N/A' }}</td>

                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete_user{{ $user['id'] }}" title="حذف"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                                @include('page.user.destroy')
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="8">No data</td>
                            </tr>

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