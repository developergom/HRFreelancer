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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Freelancer per Gender</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div id="pie-chart-gender" class="flot-chart-pie"></div>
                    <div class="flc-pie-gender hidden-xs"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Freelancer per Education</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div id="pie-chart-education" class="flot-chart-pie"></div>
                    <div class="flc-pie-education hidden-xs"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Freelancer whose contract will be expired</h2>
                </div>
                
                <div class="card-body card-padding-sm">
                    <div class="table-responsive">
                        <table id="grid-data" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="name" data-order="asc"><center>Name</center></th>
                                    <th data-column-id="division" data-order="asc"><center>Division</center></th>
                                    <th data-column-id="department" data-order="asc"><center>Department</center></th>
                                    <th data-column-id="position" data-order="asc"><center>Position</center></th>
                                    <th data-column-id="end_date" data-order="asc"><center>End Date Contract</center></th>
                                    <th data-column-id="link" data-formatter="link" data-sortable="false"><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($willexpirefreelancer as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->division_name }}</td>
                                    <td>{{ $row->department_name }}</td>
                                    <td>{{ $row->position_name }}</td>
                                    <td><center>{{ Carbon\Carbon::createFromFormat('Y-m-d', $row->end_date)->format('d/m/Y') }}</center></td>
                                    <td><center><a title="View Detail" href="/freelancer/{{ $row->freelancer_id }}"><span class="zmdi zmdi-more"></span></a></center></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
var barData = [];
var dataTotal = [];
var pieDataGender = [];
var pieDataEducation = [];
var monthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var color = [
                '#F44336', 
                '#03A9F4', 
                '#8BC34A', 
                '#FFEB3B', 
                '#009688', 
                '#f89E17', 
                '#fFDBD6', 
                '#584DC3', 
                '#FC7CB2', 
                '#ffff99',
                '#ff9966',
                '#ff6666',
                '#990033',
                '#99ccff',
                '#666699',
                '#0077b3'
            ];

function loadTotalFreelancersData() {
    $.ajax({
        url: base_url + 'api/getTotalPerMonth',
        type: 'GET',
        dataType: 'json',
        error: function(data) {
            console.log(data);
        },
        success: function(data) {
            $.each(data, function(key, value){
                var total = new Array();
                $.each(value.total, function(k, v){
                    x = new Array();
                    x.push(k);
                    x.push(v.total);

                    total.push(x);
                });

                barData.push({
                    data : total,
                    label: " " + value.department_name + " ",
                    bars : {
                            show : true,
                            barWidth : 0.05,
                            order : key,
                            lineWidth: 1,
                            fillColor: color[key],
                            position: 'center'
                    }
                });

            });
        }
    });
}

function loadFreelancersDataPerGender() {
    $.ajax({
        url: base_url + 'api/getTotalPerGender',
        type: 'GET',
        dataType: 'json',
        error: function(data) {
            console.log(data);
        },
        success: function(data) {
            $.each(data.result, function(key, value){
                x = {};
                x.data = value.total;
                x.color = color[key];
                x.label = value.gender;

                pieDataGender.push(x);
            });
        }
    });   
}

function loadFreelancersDataPerEducation() {
    $.ajax({
        url: base_url + 'api/getTotalPerEducation',
        type: 'GET',
        dataType: 'json',
        error: function(data) {
            console.log(data);
        },
        success: function(data) {
            $.each(data.result, function(key, value){
                x = {};
                x.data = value.total;
                x.color = color[key];
                x.label = value.education;

                pieDataEducation.push(x);
            });
        }
    });   
}

loadTotalFreelancersData();
loadFreelancersDataPerGender();
loadFreelancersDataPerEducation();

$(document).ready(function() {
    $('#text').marquee({
        duration: 60000,
        startVisible: true,
        duplicated: true
    });
});

$(document).ajaxSuccess(function(){
    console.log(barData);

    /* Let's create the bar chart */
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
                shadowSize: 0,
                axisLabel: 'Month'
            },
    
            legend:{
                container: '.flc-bar',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            },

            colors : [
                '#F44336', 
                '#03A9F4', 
                '#8BC34A', 
                '#FFEB3B', 
                '#009688', 
                '#f89E17', 
                '#fFDBD6', 
                '#584DC3', 
                '#FC7CB2', 
                '#ffff99',
                '#ff9966',
                '#ff6666',
                '#990033',
                '#99ccff',
                '#666699',
                '#0077b3'
            ]
        });
    }

    //Pie Chart Gender
    if($('#pie-chart-gender')[0]){
        $.plot('#pie-chart-gender', pieDataGender, {
            series: {
                pie: {
                    show: true,
                    stroke: { 
                        width: 2,
                    },
                },
            },
            legend: {
                container: '.flc-pie-gender',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false,
                cssClass: 'flot-tooltip'
            }
            
        });
    }

    //Pie Chart Education
    if($('#pie-chart-education')[0]){
        $.plot('#pie-chart-education', pieDataEducation, {
            series: {
                pie: {
                    show: true,
                    stroke: { 
                        width: 2,
                    },
                },
            },
            legend: {
                container: '.flc-pie-education',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false,
                cssClass: 'flot-tooltip'
            }
            
        });
    }
    
    /* Tooltips for Flot Charts */
    
    if ($(".flot-chart")[0]) {
        $(".flot-chart").bind("plothover", function (event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(0),
                    m = item.dataIndex;
                $(".flot-tooltip").html(item.series.label + " at " + monthName[m] + " : " + y + " person").css({top: item.pageY+5, left: item.pageX+5}).show();
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