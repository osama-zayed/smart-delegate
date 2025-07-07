@extends('layouts.master')
@section('css')
    <div style="display: none">@toastr_css</div>
@endsection
@section('title')
Rooms
@endsection
@section('page-header')
    Rooms
@endsection
@section('sub-page-header')
 Rooms list
@endsection
@section('PageTitle')
Rooms
@endsection
<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Room name</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($rooms as $room)
                                    <tr>
                                        <td>{{ $room['id'] }}</td>
                                        <td>{{ $room['name'] }}</td>
                                        <td>
                                            <a href="{{ route('room.edit', $room['id']) }}" class="btn btn-info btn-sm"
                                                role="button" aria-pressed="true" title="edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_room{{ $room['id'] }}" title="delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('page.rooms.destroy')
                                @empty
                                    <tr>
                                        <td colspan="3">No data</td>
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
