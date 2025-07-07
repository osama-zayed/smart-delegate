@extends('layouts.master')

@section('title', 'Rooms')

@section('page-header', 'Rooms')

@section('sub-page-header', 'Rooms list')

@section('PageTitle', 'Rooms')

@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Room Name</th>
                                    <th>Description</th>
                                    <th>Creator</th>
                                    <th>Department</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rooms as $room)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $room['data']['roomName'] }}</td>
                                        <td>{{ $room['data']['roomDescription'] }}</td>
                                        <td>{{ $room['data']['creator']['name'] }}</td>
                                        <td>{{ $room['data']['creator']['department'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_room{{ $room['id'] }}" title="Delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                     @include('page.rooms.destroy', ['roomId' => $room['id']])
                                @empty
                                    <tr>
                                        <td colspan="6">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


