@extends('vendor.material.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Freelancers Management<small>List of all freelancers</small></h2>
        @can('Freelancers Management-Create')
        <a href="{{ url('freelancer/create') }}" title="Create New Freelancer"><button class="btn bgm-blue btn-float waves-effect"><i class="zmdi zmdi-plus"></i></button></a>
        @endcan
    </div>

    <div class="table-responsive">
        <table id="grid-data" class="table table-hover">
            <thead>
                <tr>
                    <th data-column-id="name" data-order="asc">Name</th>
                    <th data-column-id="email" data-order="asc">Email</th>
                    <th data-column-id="phone" data-order="asc">Phone</th>
                    <th data-column-id="last_education" data-order="asc">Last Education</th>
                    <th data-column-id="user_firstname" data-order="asc">Created By</th>
                    @can('Freelancers Management-Update')
                        @can('Freelancers Management-Delete')
                            <th data-column-id="link" data-formatter="link-rud" data-sortable="false">Action</th>
                        @else
                            <th data-column-id="link" data-formatter="link-ru" data-sortable="false">Action</th>
                        @endcan
                    @else
                        @can('Freelancers Management-Delete')
                            <th data-column-id="link" data-formatter="link-rd" data-sortable="false">Action</th>
                        @else
                            <th data-column-id="link" data-formatter="link-r" data-sortable="false">Action</th>
                        @endcan
                    @endcan
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>    
@endsection

@section('customjs')
<script src="{{ url('js/app/freelancer.js') }}"></script>
@endsection