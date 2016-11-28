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
        <div class="col-sm-8 col-md-4">
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
        
        <div class="col-sm-8 col-md-4">
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
        
        <div class="col-sm-8 col-md-4">
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
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Total Freelancers per Month in {{ $year }}</h2>
                    
                    <!-- <ul class="actions">
                        <li class="dropdown action-show">
                            <a href="#" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
            
                            <div class="dropdown-menu pull-right">
                                <p class="p-20">
                                    You can put anything here
                                </p>
                            </div>
                        </li>
                    </ul> -->
                </div>
                
                <div class="card-body card-padding-sm">
                    <div id="bar-chart" class="flot-chart"></div>
                    <div class="chart flc-bar"></div>
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
var dataTotal = [];
var monthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function loadTotalFreelancersData() {
    $.ajax({
        url: base_url + 'api/getTotalPerMonth',
        type: 'GET',
        dataType: 'json',
        error: function(data) {
            console.log(data);
        },
        success: function(data) {
            //console.log(data);
            $.each(data.activefreelancerpermonth, function(key, value){
                x = new Array();
                x.push(key);
                x.push(value.total);

                dataTotal.push(x);
            });
        }
    });
}

loadTotalFreelancersData();

$(document).ready(function(){
    //console.log(barData);

    $('#text').marquee({
        duration: 60000,
        startVisible: true,
        duplicated: true
      });

    var barData = new Array();
    barData.push({
        data : dataTotal,
        label: 'Total Freelancer',
        bars : {
                show : true,
                barWidth : 0.5,
                order : 1,
                lineWidth: 0,
                fillColor: '#8BC34A'
        }
    });

    /* Let's create the chart */
    if ($('#bar-chart')[0]) {
        $.plot($("#bar-chart"), barData, {
            grid : {
                    borderWidth: 1,
                    borderColor: '#eee',
                    show : true,
                    hoverable : true,
                    clickable : true
            },
            
            yaxis: {
                tickColor: '#eee',
                tickDecimals: 0,
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f",
                },
                shadowSize: 0
            },
            
            xaxis: {
                tickColor: '#fff',
                tickDecimals: 0,
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f"
                },
                shadowSize: 3,
            },
    
            legend:{
                container: '.flc-bar',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            }
        });
    }
    
    /* Tooltips for Flot Charts */
    
    if ($(".flot-chart")[0]) {
        $(".flot-chart").bind("plothover", function (event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(0);
                $(".flot-tooltip").html(item.series.label + " at " + monthName[x - 1] + " is " + y + " person").css({top: item.pageY+5, left: item.pageX+5}).show();
            }
            else {
                $(".flot-tooltip").hide();
            }
        });
        
        $("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body");
    }    
});
</script>
@endsection