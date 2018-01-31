@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
      }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/lineicons/style.css') }}">

<?php $user = Session::get('user'); ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
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
                      <a class="active" href="/">
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
                          <li><a href="/patientList">Patient List</a></li>
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
                      <a href="/nso/patientSummary">
                          <i class="fa fa-dashboard"></i>
                          <span>Patient Summary</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                    <div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="panel-body">
                      <div class="border-head">
                          <h3>PATIENTS VISITS (<?php echo date('Y'); ?>)</h3>
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

 <h3>APPOINTMENT WITH PATIENT</h3>
            <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar --> 
                        </div>  
            </div>
          </section>
                      
      </section>

      <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>
      <script src="{{ URL::asset('theme/js/zabuto_calendar.js') }}"></script>
      <script type="text/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

       $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "/calender",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Your Appointment", badge: "00"},
                    {type: "block", label: "Other Appointment", }
                ]
            });
        
        function myDateFunction(id, fromModal) {
        $("#date-popover").hide();
        if (fromModal) {
            $("#" + id + "_modal").modal("hide");
        }
        var date = $("#" + id).data("date");
        var hasEvent = $("#" + id).data("hasEvent");
        if (hasEvent && !fromModal) {
            return false;
        }
        $("#date-popover-content").html('You clicked on date ' + date);
        $("#date-popover").show();
        
        return true;
    }
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
  });
    </script>

    @endsection