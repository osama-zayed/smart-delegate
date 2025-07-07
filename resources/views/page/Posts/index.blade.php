@extends('layouts.master')
@section('title')
post
@endsection
@section('page-header')
post
@endsection
@section('sub-page-header')
post list
@endsection
@section('PageTitle')
post
@endsection
<!-- breadcrumb -->
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a type="button" class="btn btn-primary btn-sm text-light" role="button" data-toggle="modal"
                    data-target="#create" aria-pressed="true" title="Add post">
                    <i class="ti-plus"></i>
                    Add
                    post</a>
                <br><br>
                @include('page.posts.create')
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Content</th>
                                <th>Media Type</th>
                                <th>Deadline</th>
                                <th>Is Assignment</th>
                                <th>Room ID</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post['content'] }}</td>
                                <td>{{ ucfirst($post['mediaType']) }}</td>
                                <td>{{ $post['deadline'] ?? 'No Deadline' }}</td>
                                <td>{{ $post['isAssignment'] ? 'Yes' : 'No' }}</td>
                                <td>{{ $post['roomId'] }}</td>
                                <td>
                                    <!-- تعديل المنشور -->
                                    <!-- <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل">
                                        <i class="fa fa-edit"></i>
                                    </a> -->
                                    <!-- حذف المنشور -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_post{{ $post['id'] }}" title="حذف">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                
                            </tr>

                            @include('page.Posts.destroy') 

                            @empty
                            <tr>
                                <td colspan="9">No data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- row closed -->
@endsection
