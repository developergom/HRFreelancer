@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>Freelancer Management<small>Edit Freelancer</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('freelancer/'.$freelancer->freelancer_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="name" id="name" placeholder="Name" required="true" maxlength="100" value="{{ $freelancer->name }}">
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
	                        <input type="email" class="form-control input-sm" name="email" id="email" placeholder="Email" required="true" maxlength="100" value="{{ $freelancer->email }}">
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
	                        <input type="text" class="form-control input-sm input-mask" name="phone" id="phone" placeholder="Phone e.g 081123456789" required="true" maxlength="14" value="{{ $freelancer->phone }}" autocomplete="off" data-mask="000000000000">
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
	                        <input type="text" class="form-control input-sm input-mask" name="other_phone" id="other_phone" placeholder="Other Phone e.g 081123456789" maxlength="14" value="{{ $freelancer->phone_other }}" autocomplete="off" data-mask="000000000000">
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
	                        <input type="text" class="form-control input-sm" name="place_of_birth" id="place_of_birth" placeholder="Place of Birth" required="true" maxlength="14" value="{{ $freelancer->place_of_birth }}">
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
	                        <input type="text" class="form-control input-sm input-mask" name="date_of_birth" id="date_of_birth" placeholder="e.g 17/08/1945" required="true" maxlength="10" value="{{ Carbon\Carbon::createFromFormat('Y-m-d', $freelancer->date_of_birth)->format('d/m/Y') }}" autocomplete="off" data-mask="00/00/0000">
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
		                        	<input type="radio" name="gender" value="Male" {{ ($freelancer->gender=='Male') ? 'checked' : '' }}>
		                        	<i class="input-helper"></i>
		                        	Male
		                        </label>
	                    	</div>
	                    	<div class="radio m-b-15">
	                    		<label>
		                        	<input type="radio" name="gender" value="Female" {{ ($freelancer->gender=='Female') ? 'checked' : '' }}>
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
	                <label for="last_education" class="col-sm-2 control-label">Last Education</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="last_education" id="last_education" class="selectpicker" data-live-search="true" required="true">
	                        	<option value=""></option>
                                @foreach ($last_educations as $key => $value)
                                	{!! $selected = '' !!}
                                	@if($value==$freelancer->last_education)
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $value }}" {{ $selected }}>{{ $value }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('last_education'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('last_education') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="ktp_number" class="col-sm-2 control-label">KTP Number</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm input-mask" name="ktp_number" id="ktp_number" placeholder="KTP Number" required="true" maxlength="25" value="{{ $freelancer->ktp_number }}" autocomplete="off" data-mask="0000000000000000">
	                    </div>
	                    @if ($errors->has('ktp_number'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('ktp_number') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="npwp" class="col-sm-2 control-label">NPWP</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm input-mask" name="npwp" id="npwp" placeholder="NPWP" required="true" maxlength="25" value="{{ $freelancer->npwp }}" autocomplete="off" data-mask="00.000.000.0-000.000">
	                    </div>
	                    @if ($errors->has('npwp'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('npwp') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="ktp_address" class="col-sm-2 control-label">KTP Address</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="ktp_address" id="ktp_address" class="form-control input-sm" placeholder="KTP Address" required="true">{{ $freelancer->ktp_address }}</textarea>
	                    </div>
	                    @if ($errors->has('ktp_address'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('ktp_address') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="ktp_city" class="col-sm-2 control-label">KTP City</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="ktp_city" id="ktp_city" placeholder="KTP City" required="true" maxlength="50" value="{{ $freelancer->ktp_city }}">
	                    </div>
	                    @if ($errors->has('ktp_city'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('ktp_city') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="home_address" class="col-sm-2 control-label">Home Address</label>
	                <div class="col-sm-8">
	                    <div class="fg-line">
	                        <textarea name="home_address" id="home_address" class="form-control input-sm" placeholder="Home Address" required="true">{{ $freelancer->home_address }}</textarea>
	                    </div>
	                    @if ($errors->has('home_address'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('home_address') }}</strong>
			                </span>
			            @endif
	                </div>
	                <div class="col-sm-2">
	                	<a href="javascript:void(0)" id="btn-copy-address" class="btn btn-info btn-sm">Copy Address</a>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="home_city" class="col-sm-2 control-label">Home City</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="home_city" id="home_city" placeholder="Home City" required="true" maxlength="50" value="{{ $freelancer->home_city }}">
	                    </div>
	                    @if ($errors->has('home_city'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('home_city') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank" class="col-sm-2 control-label">Bank</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="bank" id="bank" placeholder="Bank" required="true" maxlength="100" value="{{ $freelancer->bank }}">
	                    </div>
	                    @if ($errors->has('bank'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('bank') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank_branch" class="col-sm-2 control-label">Bank Branch</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="bank_branch" id="bank_branch" placeholder="Bank Branch" maxlength="100" value="{{ $freelancer->bank_branch }}">
	                    </div>
	                    @if ($errors->has('bank_branch'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('bank_branch') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank_account_name" class="col-sm-2 control-label">Bank Account Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="bank_account_name" id="bank_account_name" placeholder="Bank Account Name" required="true" maxlength="100" value="{{ $freelancer->bank_account_name }}">
	                    </div>
	                    @if ($errors->has('bank_account_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('bank_account_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank_account_number" class="col-sm-2 control-label">Bank Account Number</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="bank_account_number" id="bank_account_number" placeholder="Bank Account Number" required="true" maxlength="100" value="{{ $freelancer->bank_account_number }}">
	                    </div>
	                    @if ($errors->has('bank_account_number'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('bank_account_number') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-12">
	                    <a href="javascript:void(0)" id="btn-modal-add-history" class="btn btn-info btn-sm">Add History</a>
	                </div>
	            </div>
	            <div class="form-group">
	            	<div class="col-sm-12">
	            		<div role="tabpanel">
				            <ul class="tab-nav" role="tablist">
				                <li class="active"><a href="#listhistory" aria-controls="listhistory" role="tab" data-toggle="tab">History</a></li>
				            </ul>
				            <div class="tab-content">
				                <div role="tabpanel" class="tab-pane active" id="listprint">
				                   <div class="table-responsive">
				                        <table id="grid-data-listhistory" class="table table-hover">
				                            <thead>
				                                <tr>
				                                    <th data-column-id="division_name" data-order="asc">Division</th>
				                                    <th data-column-id="department_name" data-order="asc">Department</th>
				                                    <th data-column-id="position_name" data-order="asc">Position</th>
				                                    <th data-column-id="start_date" data-order="asc">Start Date</th>
				                                    <th data-column-id="end_date" data-order="asc">End Date</th>
				                                    <th data-column-id="honor_type" data-order="asc">Honor Type</th>
				                                    <th data-column-id="honor" data-order="asc">Honor</th>
				                                    <th data-column-id="notes" data-order="asc">Notes</th>
				                                    <th data-column-id="link" data-formatter="link-rua" data-sortable="false">Action</th>
				                                </tr>
				                            </thead>
				                            <tbody>
				                            </tbody>
				                        </table>
				                    </div>                 
				                </div>
				            </div>
				        </div>
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

    @include('vendor.material.freelancer.modal')
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection

@section('customjs')
<script src="{{ url('js/app/freelancer-create.js') }}"></script>
@endsection