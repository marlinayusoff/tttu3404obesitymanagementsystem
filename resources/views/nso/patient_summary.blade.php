@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
      }

      #parallelogram {
          width: initial;
            -ms-transform: skew(-10deg); /* IE 9 */
            -webkit-transform: skew(-10deg); /* Chrome, Safari, Opera */
            transform: skew(-10deg);
            background: #87CEFA;
            font-color:white;
            margin:20px;
        }

        .genderText1 {
          font-family: Times New Roman;
          font-weight: bold;
          margin-top: 15px;
          font-size: 30px;
        }

        .genderText2 {
          font-family: Times New Roman;
          font-weight: bold;
          margin-top: 15px;
          font-size: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        /* Specific mapael css class are below
         * 'mapael' class is added by plugin
        */

        .mapael .map {
            position: relative;
        }

        .mapael .mapTooltip {
            position: absolute;
            background-color: #fff;
            moz-opacity: 0.70;
            opacity: 0.70;
            filter: alpha(opacity=70);
            border-radius: 10px;
            padding: 10px;
            z-index: 1000;
            max-width: 200px;
            display: none;
            color: #343434;
        }


    </style>

<section id="container" >
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <?php if(Session::get('user')->gender == "Perempuan") { ?> 
                  <p class="centered"><img src="{{ URL::asset('theme/img/doctor-female.png') }}" class="img-circle" width="100"></p>
                  <?php } elseif(Session::get('user')->gender == "Lelaki") { ?> 
                  <p class="centered"><img src="{{ URL::asset('theme/img/doctor-male.png') }}" class="img-circle" width="100"></p>
                  <?php } ?>
                  <h5 class="centered" style="padding-top: 20px;">{{ Session::get('user')->name }}</h5>
                  <h5 class="centered">(NSO)</h5>
                    
                  <li class="mt">
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Patient</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a href="/patientList">Patient List</a></li>
                          <li><a href="/nso/register_patient">Add New Patient</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="/Appointment">
                          <i class="fa fa-dashboard"></i>
                          <span>Add Appointment</span>
                      </a>
                  </li>
                  <li>
                      <a class="active" href="/nso/patientSummary">
                          <i class="fa fa-dashboard"></i>
                          <span>Patient Summary</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

        <section id="main-content">
          <section class="wrapper">
            <div class="row mt">
              <div class="col-lg-12">
              	<div class="content-panel">
        			     <!-- Form Name -->
        			     <h2>&nbsp;&nbsp;&nbsp;View Patient Summary</h2>
                   <button class="btn pull-right btn-info" style="margin:10px 30px 10px 0px;" > <i class="fa fa-print"></i> Print PDF</button>
          				  <div>
          					<!-- start tabs -->
              					<div style="padding: 30px 10px 40px;">
                        <!-- Patient Gender-->
              					<h3><div id="parallelogram">Total Patient</div></h3>

                        <div class="centered d-inline" style="font:bold; padding-top:20px;">
                          <div class="row">
                            <!--Patient: Male-->
                            <div class="col-md-6">
                              <div style="font-size:30px;">Male</div>
                              <img src="{{ URL::asset('theme/img/male.png') }}" class="img-square" width="100">
                              <!-- total male -->
                              <div class="genderText1">{{ $male }} people ( {{ number_format((($male/$total) * 100), 2) }}% ) </div>
                              
                            </div>
                            <!--Patient: Female-->
                            <div class="col-md-6">
                              <div style="font-size:30px;">Female</div>
                              <img src="{{ URL::asset('theme/img/female.png') }}" class="img-circle" width="100">
                              <!--total Female-->
                              <div class="genderText1">{{ $female }} people ( {{ number_format((($female/$total) * 100), 2) }}% ) </div>
                          </div>
                          </div>
                        </div>

                        <h3><div id="parallelogram">Patient Visit (<?php echo date('Y'); ?>)</div></h3>

                            <div class="row mt">
                              <!--CUSTOM CHART START -->
                              <div class="panel-body">
                                <div class="border-head">
                                    <h3>By Months:</h3>
                                </div>
                                <div class="custom-bar-chart">
                                  <ul class="y-axis">
                                      <li><span>50</span></li>
                                      <li><span>40</span></li>
                                      <li><span>30</span></li>
                                      <li><span>20</span></li>
                                      <li><span>10</span></li>
                                      <li><span>0</span></li>
                                  </ul>
                                  <?php $row = array("JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"); 
                                    $i = 0;
                                  ?>
                                  @foreach($visit as $d)
                                  <div class="bar">
                                      <div class="title">{{ $row[$i++] }}</div>
                                      <div class="value tooltips" data-original-title="{{ $d }}" data-toggle="tooltip" data-placement="top" style="min-height: {{$d*2}}%;">{{ $d }}</div>
                                  </div>
                                  
                                  @endforeach
                                </div>
                              </div>
                              <!--custom chart end-->
                           </div><!-- /row --> 


                           <div class="border-head">
                              <h3>By Gender:</h3>
                          </div>
                           <div class="centered d-inline" style="font:bold; padding-top:20px;">
                              <div class="row">
                                <!--Patient: Male-->
                                <div class="col-md-6">
                                  <div style="font-size:30px;">Male</div>
                                  <img src="{{ URL::asset('theme/img/male.png') }}" class="img-square" width="100">
                                  <!-- this month appointment male -->
                                  <div class="genderText2"><i class="fa fa-calendar" aria-hidden="true"></i> Current Month: {{$maleThisMonth}} people</div>
                                  <!-- this week appointment male -->
                                  <div class="genderText2"> <i class="fa fa-calendar" aria-hidden="true"></i>  Current Week: {{$maleThisWeek}} people</div>
                                  
                                </div>
                                <!--Patient: Female-->
                                <div class="col-md-6">
                                  <div style="font-size:30px;">Female</div>
                                  <img src="{{ URL::asset('theme/img/female.png') }}" class="img-circle" width="100">
                                  <!-- this month appointment female -->
                                   <div class="genderText2"><i class="fa fa-calendar" aria-hidden="true"></i> Current Month: {{$femaleThisMonth}} people </div>
                                   <!-- this week appointment female -->
                                   <div class="genderText2"> <i class="fa fa-calendar" aria-hidden="true"></i> Current Week: {{$femaleThisWeek}} people</div>
                              </div>
                              </div>
                            </div>


                            <h3><div id="parallelogram">Patient Population</div></h3>

                                <div class="container">

                                    <div class="mapcontainer">
                                        <div class="map">
                                            <span>Alternative content for the map</span>
                                        </div>
                                        <div class="areaLegend">
                                            <span>Alternative content for the legend</span>
                                        </div>
                                    </div>


                                </div>

                                <h3><div id="parallelogram">Health Issue</div></h3>

                                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

            					  </div>
          					</div>
				        </div>
			         </div>
        			<!-- /.container -->
            </div><!-- /.container -->
		      </section>
        </section>
      </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"
            charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" charset="utf-8"></script>
    <script src="{{ URL::asset('theme/js/jquery.mapael.js') }}"></script>
    <script src="{{ URL::asset('theme/js/malaysia.js') }}"></script>
    
    <script type="text/javascript">
        
            $(".mapcontainer").mapael({
                map: {
                    name: "malaysia",
                    defaultArea: {
                        attrs: {
                            stroke: "#fff",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            "stroke-width": 2
                        }
                    }
                },
                legend: {
                    area: {
                        title: "Number of Patient Registered based on state",
                        slices: [
                            {
                                max: 1,
                                attrs: {
                                    fill: "#97e766"
                                },
                                label: "Less than 2 people"
                            },
                            {
                                min: 2,
                                max: 3,
                                attrs: {
                                    fill: "#7fd34d"
                                },
                                label: "Between 2 to 3 people"
                            },
                            {
                                min: 4,
                                max: 5,
                                attrs: {
                                    fill: "#5faa32"
                                },
                                label: "Between 4 to 5 people"
                            },
                            {
                                min: 6,
                                attrs: {
                                    fill: "#3f7d1a"
                                },
                                label: "More than 6 people"
                            }
                        ]
                    }
                },
                areas: {
                    "Brunei": {
                        value: "{{$brunei}}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Brunei</span><br />Population : {{$brunei}}"}
                    },
                    "Johor": {
                        value: "{{ $johor }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Johor</span><br />Population : {{ $johor }}"}
                    },
                    "Kedah": {
                        value: "{{ $kedah }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Kedah</span><br />Population : {{ $kedah }}"}
                    },
                    "Kelantan": {
                        value: "{{  $kelantan }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Kelantan</span><br />Population : {{  $kelantan }}"}
                    },
                    "Melaka": {
                        value: "{{ $melaka }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Melaka</span><br />Population : {{ $melaka }}"}
                    },
                    "Negeri-Sembilan": {
                        value: "{{ $negeri9 }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Negeri Sembilan</span><br />Population : {{ $negeri9 }}"}
                    },
                    "Pahang": {
                        value: "{{ $pahang }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Pahang</span><br />Population : {{ $pahang }}"}
                    },
                    "Pulau-Pinang": {
                        value: "{{ $ppinang }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Pulau Pinang</span><br />Population : {{ $ppinang }}"}
                    },
                    "Perak": {
                        value: "{{ $perak  }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Perak</span><br />Population : {{ $perak  }}"}
                    },
                    "Perlis": {
                        value: "{{ $perlis }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Perlis</span><br />Population : {{ $perlis }}"}
                    },
                    "Selangor": {
                        value: "{{  $selangor }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\"Selangor</span><br />Population : {{  $selangor }}"}
                    },
                    "Terengganu": {
                        value: "{{ $terengganu}}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Terengganu</span><br />Population : {{ $terengganu}}"}
                    },
                    "Sabah": {
                        value: "{{ $sabah }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Sabah</span><br />Population : {{ $sabah }}"}
                    },
                    "Sarawak": {
                        value: "{{ $sarawak }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Sarawak</span><br />Population : {{ $sarawak }}"}
                    },
                    "Labuan": {
                        value: "{{ $labuan }}",
                        href: "#",
                        tooltip: {content: "<span style=\"font-weight:bold;\">Labuan</span><br />Population : {{ $labuan }}"}
                    
                    }
                }
            });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
    

       var data = new google.visualization.arrayToDataTable([
            ['Health Issue','Percentage'],
            <?php $row = array("Heart Attack","Diabetes","Fatty Liver","Osteoarthritis","High Blood Pressure","Others"); 
                            $i = 0;
                          ?>
            @foreach ($healthIssueNumber as $d)
            ['{{ $row[$i++] }}',{{ $d }}],
            @endforeach

        ]);
      
        var options = {
          title: 'Health Issue from Patient',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
        $("button").click(function () {
          print()
      });
  </script>
      
@endsection