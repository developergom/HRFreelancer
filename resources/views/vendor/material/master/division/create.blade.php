@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Division Management<small>Create New Division</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/division') }}">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="division_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="division_name" id="division_name" placeholder="Division Name" required="true" maxlength="50" value="{{ old('division_name') }}">
	                    </div>
	                    @if ($errors->has('division_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('division_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="division_desc" id="division_desc" class="form-control input-sm" placeholder="Description">{{ old('division_desc') }}</textarea>
	                    </div>
	                    @if ($errors->has('division_desc'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('division_desc') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/division') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection