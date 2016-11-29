@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>Report<small>Generate report</small></h2></div>
        <div class="card-body card-padding">
        	<div class="row">
        		<div class="col-md-3">
        			<div role="tabpanel">
			            <ul class="tab-nav" role="tablist">
			                <li class="active"><a href="#filtersection" aria-controls="filtersection" role="tab" data-toggle="tab">Filter</a></li>
			            </ul>
			            <div class="tab-content">
				            <div role="tabpanel" class="tab-pane active" id="filtersection">
				            	<form class="form" role="form">
				            		<div class="form-group">
						                <label for="department_id">Department</label>
						                <select name="department_id" id="department_id" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                @foreach ($departments as $key => $value)
											    <option value="{{ $value->department_id }}">{{ $value->department_name }}</option>
											@endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="position_id">Position</label>
						                <select name="position_id" id="position_id" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                @foreach ($positions as $key => $value)
											    <option value="{{ $value->position_id }}">{{ $value->position_name }}</option>
											@endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="gender">Gender</label>
						                <select name="gender" id="gender" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                @foreach ($genders as $key => $value)
											    <option value="{{ $value }}">{{ $value }}</option>
											@endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="education">Education</label>
						                <select name="education" id="education" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                @foreach ($educations as $key => $value)
											    <option value="{{ $value }}">{{ $value }}</option>
											@endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="honor_type">Honor Type</label>
						                <select name="honor_type" id="honor_type" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                @foreach ($honor_types as $key => $value)
											    <option value="{{ $value }}">{{ $value }}</option>
											@endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="year">Year</label>
						                <select name="year" id="year" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                <option value="2016">2016</option>
			                                <option value="2017">2017</option>
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="month">Month</label>
						                <select name="month" id="month" class="form-control input-sm selectpicker" data-live-search="true" multiple>
			                                <option value="01">January</option>
			                                <option value="02">February</option>
			                                <option value="03">March</option>
			                                <option value="04">April</option>
			                                <option value="05">May</option>
			                                <option value="06">June</option>
			                                <option value="07">July</option>
			                                <option value="08">August</option>
			                                <option value="09">September</option>
			                                <option value="10">October</option>
			                                <option value="11">November</option>
			                                <option value="12">December</option>
			                            </select>
						            </div>
				            	</form>
				            </div>
				        </div>
				    </div>
        		</div>
        		<div class="col-md-9">
        			<div role="tabpanel">
			            <ul class="tab-nav" role="tablist">
			                <li class="active"><a href="#resultsection" aria-controls="resultsection" role="tab" data-toggle="tab">Result</a></li>
			            </ul>
			            <div class="tab-content">
				            <div role="tabpanel" class="tab-pane active" id="resultsection">
				            </div>
				        </div>
				    </div>
        		</div>
        	</div>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection