@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/announcement-home.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if(count($announcements) > 0)
    <div id="announcement-container" class="alert alert-info" role="alert">
        <div id="text">
            <!-- 1 Lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            2 Lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            3 Lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp; -->
            @foreach($announcements as $announcement)
                {!! $announcement->announcement_detail . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp;' !!}
            @endforeach
        </div>
    </div>
    @endif
	<div class="block-header">
        <h2>Dashboard</h2>
        
        <ul class="actions">
            <li>
                <a href="#">
                    <i class="zmdi zmdi-trending-up"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-check-all"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="#">Refresh</a>
                    </li>
                    <li>
                        <a href="#">Manage Widgets</a>
                    </li>
                    <li>
                        <a href="#">Widgets Settings</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body card-padding">
            You are logged in!
        </div>
    </div> -->

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-cyan">
                <div class="clearfix">
                    <div class="chart stats-bar"><canvas style="display: inline-block; width: 83px; height: 45px; vertical-align: top;" width="83" height="45"></canvas></div>
                    <div class="count">
                        <small>Total Freelancers</small>
                        <h2>{{ $totalfreelancer }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-lightgreen">
                <div class="clearfix">
                    <div class="chart stats-bar-2"><canvas style="display: inline-block; width: 83px; height: 45px; vertical-align: top;" width="83" height="45"></canvas></div>
                    <div class="count">
                        <small>Active Freelancers</small>
                        <h2>{{ $activefreelancer }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-red">
                <div class="clearfix">
                    <div class="chart stats-bar"><canvas style="display: inline-block; width: 85px; height: 45px; vertical-align: top;" width="85" height="45"></canvas></div>
                    <div class="count">
                        <small>Inactive Freelancers</small>
                        <h2>{{ $inactivefreelancer }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-bluegray">
                <div class="clearfix">
                    <div class="chart stats-bar-2"><canvas style="display: inline-block; width: 85px; height: 45px; vertical-align: top;" width="85" height="45"></canvas></div>
                    <div class="count">
                        <small>Support Tickets</small>
                        <h2>23,856</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/jquery.marquee.min.js') }}"></script>
<script src="{{ url('js/jquery.sparkline.min.js') }}"></script>
@endsection

@section('customjs')
<script type="text/javascript">
$(document).ready(function(){
    $('#text').marquee({
        duration: 60000,
        startVisible: true,
        duplicated: true
      });
});
</script>
@endsection