@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Freelancer Management<small>Create New Freelancer</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('freelancer') }}">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="name" id="name" placeholder="Name" required="true" maxlength="100" value="{{ old('name') }}">
	                    </div>
	                    @if ($errors->has('name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="email" class="col-sm-2 control-label">Email</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="email" class="form-control input-sm" name="email" id="email" placeholder="Email" required="true" maxlength="100" value="{{ old('email') }}">
	                    </div>
	                    @if ($errors->has('email'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('email') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="phone" class="col-sm-2 control-label">Phone</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm input-mask" name="phone" id="phone" placeholder="Phone e.g 081123456789" required="true" maxlength="14" value="{{ old('phone') }}" autocomplete="off" data-mask="000000000000">
	                    </div>
	                    @if ($errors->has('phone'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('phone') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="other_phone" class="col-sm-2 control-label">Other Phone</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm input-mask" name="other_phone" id="other_phone" placeholder="Other Phone e.g 081123456789" maxlength="14" value="{{ old('other_phone') }}" autocomplete="off" data-mask="000000000000">
	                    </div>
	                    @if ($errors->has('other_phone'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('other_phone') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="place_of_birth" class="col-sm-2 control-label">Place of Birth</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="place_of_birth" id="place_of_birth" placeholder="Place of Birth" required="true" maxlength="14" value="{{ old('place_of_birth') }}">
	                    </div>
	                    @if ($errors->has('place_of_birth'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('place_of_birth') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="date_of_birth" class="col-sm-2 control-label">Date of Birth</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm input-mask" name="date_of_birth" id="date_of_birth" placeholder="e.g 17/08/1945" required="true" maxlength="10" value="{{ old('date_of_birth') }}" autocomplete="off" data-mask="00/00/0000">
	                    </div>
	                    @if ($errors->has('date_of_birth'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('date_of_birth') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="gender" class="col-sm-2 control-label">Gender</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	<div class="radio m-b-15">
	                    		<label>
		                        	<input type="radio" name="gender" value="Male" {{ (old('gender')=='Male') ? 'checked' : '' }}>
		                        	<i class="input-helper"></i>
		                        	Male
		                        </label>
	                    	</div>
	                    	<div class="radio m-b-15">
	                    		<label>
		                        	<input type="radio" name="gender" value="Female" {{ (old('gender')=='Female') ? 'checked' : '' }}>
		                        	<i class="input-helper"></i>
		                        	Female
		                        </label>
	                    	</div>
	                    </div>
	                    @if ($errors->has('gender'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('gender') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('freelancer') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection