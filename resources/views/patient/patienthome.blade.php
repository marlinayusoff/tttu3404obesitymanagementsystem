@extends('main')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/lineicons/style.css') }}">

    <style type="text/css">
      .site-footer {
        position: unset;
      }
      div.zabuto_calendar .badge-event, div.zabuto_calendar div.legend span.badge-event {
          background-color: #ffb33b;
          color: #000;
      }
      div.zabuto_calendar .orange-event {
          background-color: #ffb33b;
      }
    </style>

<?php $user = Session::get('user'); ?>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <p class="centered"><img src="{{ URL::asset('theme/img/patient.png') }}" class="img-circle" width="100"></p>
                  <h5 class="centered" style="padding-top: 20px;">{{ Session::get('user')->name }}</h5>
                  <h5 class="centered">(PATIENT)</h5>
                    
                  <li class="mt">
                      <a class="active" href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li>
                      <a href="/patient/info">
                          <i class="fa fa-dashboard"></i>
                          <span>User Information</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Daily Diet</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/nso/adddailydiet">Add Daily Diet</a></li>
                          <li><a href="/DailyDiet_Details">View Daily Diet</a></li>
                      </ul>
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
            <h3>APPOINTMENT DATES</h3>
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
                    url: "/calenderPatient",
                    modal: true
                },
                legend: [
                    {type: "text", label: "New Appointment", badge: "&nbsp;"},
                    {type: "block", label: "Old Appointment", }
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