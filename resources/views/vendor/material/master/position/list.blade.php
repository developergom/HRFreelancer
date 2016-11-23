@extends('vendor.material.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Positions Management<small>List of all positions</small></h2>
        @can('Positions Management-Create')
        <a href="{{ url('master/position/create') }}" title="Create New Position"><button class="btn bgm-blue btn-float waves-effect"><i class="zmdi zmdi-plus"></i></button></a>
        @endcan
    </div>

    <div class="table-responsive">
        <table id="grid-data" class="table table-hover">
            <thead>
                <tr>
                    <th data-column-id="position_name" data-order="asc">Name</th>
                    <th data-column-id="position_desc" data-order="asc">Description</th>
                    @can('Positions Management-Update')
                        @can('Positions Management-Delete')
                            <th data-column-id="link" data-formatter="link-rud" data-sortable="false">Action</th>
                        @else
                            <th data-column-id="link" data-formatter="link-ru" data-sortable="false">Action</th>
                        @endcan
                    @else
                        @can('Positions Management-Delete')
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
<script src="{{ url('js/master/position.js') }}"></script>
@endsection