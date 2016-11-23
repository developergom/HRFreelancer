@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>Department Management<small>Create New Department</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/department') }}">
        		{{ csrf_field() }}
        		<div class="form-group">
	                <label for="division_id" class="col-sm-2 control-label">Division</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="division_id" id="division_id" class="selectpicker" data-live-search="true" required="true">
	                        	<option value=""></option>
                                @foreach ($divisions as $row)
                                	{!! $selected = '' !!}
                                	@if($row->division_id==old('division_id'))
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $row->division_id }}" {{ $selected }}>{{ $row->division_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('division_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('division_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="department_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="department_name" id="department_name" placeholder="Department Name" required="true" maxlength="50" value="{{ old('department_name') }}">
	                    </div>
	                    @if ($errors->has('department_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('department_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="department_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="department_desc" id="department_desc" class="form-control input-sm" placeholder="Description">{{ old('department_desc') }}</textarea>
	                    </div>
	                    @if ($errors->has('department_desc'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('department_desc') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/department') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
@endsection