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
                    <a type="button"class="btn btn-primary btn-sm text-light" role="button" data-toggle="modal"
                        data-target="#create" aria-pressed="true" title="Add post">
                        <i class="ti-plus"></i>
                        Add
                        post</a>
                    <br><br>
                    @include('page.posts.create')
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post title</th>
                                    <th>Post description</th>
                                    <th>Post image</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post['id'] }}</td>
                                        <td>{{ $post['title'] }}</td>
                                        <td>{{ $post['description'] }}</td>
                                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#show_image{{ $post['id'] }}" title="عرض الصوره">عرض</button></td>
                                                    
                                        <td>
                                            <a href="{{ route('College-New.edit', $post['id']) }}"
                                                class="btn btn-info btn-sm" role="button" aria-pressed="true"
                                                title="تعديل"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_post{{ $post['id'] }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('page.post.destroy')
                                    @include('page.post.show_image')
                                @empty
                                    <tr>
                                        <td colspan="5">No data</td>
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
