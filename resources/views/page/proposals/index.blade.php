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
                    <a type="button"class="btn btn-primary btn-sm text-light" role="button" data-toggle="modal"
                        data-target="#create" aria-pressed="true" title="Add proposal">
                        <i class="ti-plus"></i>
                        Add
                        proposal</a>
                    <br><br>
                    @include('page.proposals.create')

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>creatorId</th>
                                    <th>year</th>
                                    <th>department</th>
                                    <th>voteCount</th>
                                    <th>votedStudents</th>
                                    <th>content</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($proposals as $proposal)
                                    <tr>
                                        <td>{{ $proposal['id'] }}</td>
                                        <td>{{ $proposal['name'] }}</td>
                                        <td>{{ $proposal->college['name'] }}</td>
                                        <td>{{ $proposal['Number_of_years_of_study'] }}</td>
                                        <td>{{ $proposal['educational_qualification'] }}</td>
                                        <td>{{ $proposal['lowest_acceptance_rate'] }}%</td>
                                        <td>{{ $proposal['Price'] }}$</td>
                                        <td>
                                            <a href="{{ route('Course.index', ['proposal_id' => $proposal['id']]) }}"
                                                class="btn btn-primary btn-sm" 
                                                role="button" 
                                                aria-pressed="true"
                                                title="عرض الخطة الدراسية">
                                                عرض الخطة الدراسية
                                             </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('proposal.edit', $proposal['id']) }}"
                                                class="btn btn-info btn-sm" role="button" aria-pressed="true"
                                                title="تعديل"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_proposal{{ $proposal['id'] }}"
                                                title="حذف"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('page.proposal.destroy')
                                @empty
                                    <tr>
                                        <td colspan="9">لا توجد بيانات</td>
                                    </tr>
                                @endforelse --}}
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
