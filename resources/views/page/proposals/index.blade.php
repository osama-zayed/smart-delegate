@extends('layouts.master')
@section('title')
     Proposals list
@endsection
@section('page-header')
    proposals
@endsection
@section('sub-page-header')
     Proposals list
@endsection
@section('PageTitle')
     Proposals list
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
                                    <th>content</th>
                                    <th>department</th>
                                    <th>voteCount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($proposals as $proposal)
                                    <tr>
                                        <td>{{  $loop->iteration }}</td>
                                        <td>{{ $proposal['content'] }}</td>
                                        <td>{{ $proposal['department'] }}</td>
                                        <td>{{ $proposal['voteCount'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">no date</td>
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

