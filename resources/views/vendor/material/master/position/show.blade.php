@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Position Management<small>View Position</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
	            <div class="form-group">
	                <label for="position_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="position_name" id="position_name" placeholder="Position Name" required="true" maxlength="100" value="{{ $position->position_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="position_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="position_desc" id="position_desc" class="form-control input-sm" placeholder="Description" disabled="true">{{ $position->position_desc }}</textarea>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('master/position') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection