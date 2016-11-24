@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Freelancer Management<small>View Freelancer</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Name" value="{{ $freelancer->name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="email" class="col-sm-2 control-label">Email</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Email" value="{{ $freelancer->email }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="phone" class="col-sm-2 control-label">Phone</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Phone" value="{{ $freelancer->phone }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="other_phone" class="col-sm-2 control-label">Other Phone</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Other Phone" value="{{ $freelancer->phone_other }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="place_of_birth" class="col-sm-2 control-label">Place of Birth</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Place of Birth" value="{{ $freelancer->place_of_birth }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="date_of_birth" class="col-sm-2 control-label">Date of Birth</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Date of Birth" value="{{ Carbon\Carbon::createFromFormat('Y-m-d', $freelancer->date_of_birth)->format('d/m/Y') }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="gender" class="col-sm-2 control-label">Gender</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	<input type="text" class="form-control input-sm" placeholder="Gender" value="{{ $freelancer->gender }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="last_education" class="col-sm-2 control-label">Last Education</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Last Education" value="{{ $freelancer->last_education }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="ktp_number" class="col-sm-2 control-label">KTP Number</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="KTP Number" value="{{ $freelancer->ktp_number }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="npwp" class="col-sm-2 control-label">NPWP</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="NPWP" value="{{ $freelancer->npwp }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="ktp_address" class="col-sm-2 control-label">KTP Address</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="ktp_address" id="ktp_address" class="form-control input-sm" placeholder="KTP Address" disabled="true">{{ $freelancer->ktp_address }}</textarea>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="ktp_city" class="col-sm-2 control-label">KTP City</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="KTP City" value="{{ $freelancer->ktp_city }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="home_address" class="col-sm-2 control-label">Home Address</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="home_address" id="home_address" class="form-control input-sm" placeholder="Home Address" disabled="true">{{ $freelancer->home_address }}</textarea>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="home_city" class="col-sm-2 control-label">Home City</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Home City" value="{{ $freelancer->home_city }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank" class="col-sm-2 control-label">Bank</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Bank" value="{{ $freelancer->bank }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank_branch" class="col-sm-2 control-label">Bank Branch</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Bank Branch" value="{{ $freelancer->bank_branch }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank_account_name" class="col-sm-2 control-label">Bank Account Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Bank Account Name" value="{{ $freelancer->bank_account_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="bank_account_number" class="col-sm-2 control-label">Bank Account Number</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Bank Account Number" value="{{ $freelancer->bank_account_number }}" disabled="true">
	                    </div>
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
				                                </tr>
				                            </thead>
				                            <tbody>
				                            @foreach($freelancer->historiesfreelancer as $history)
				                            	<tr>
				                            		<td>{{ $history->department->division->division_name }}</td>
				                            		<td>{{ $history->department->department_name }}</td>
				                            		<td>{{ $history->position->position_name }}</td>
				                            		<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $history->start_date)->format('d/m/Y') }}</td>
				                            		<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $history->end_date)->format('d/m/Y') }}</td>
				                            		<td>{{ $history->honor_type }}</td>
				                            		<td>{{ number_format($history->honor) }}</td>
				                            	</tr>
				                            @endforeach
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
	                    <a href="{{ url('freelancer') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection