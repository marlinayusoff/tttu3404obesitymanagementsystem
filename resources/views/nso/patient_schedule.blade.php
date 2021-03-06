@extends('main')
@section('content')

<link href="{{ URL::asset('theme/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ URL::asset('theme/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('theme/js/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('theme/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('theme/css/style-responsive.css') }}" rel="stylesheet">

<style type="text/css">
      .site-footer {
        position: unset;
      }

     .has-switch span.switch-left {color: #171313;background-color: #f3c03a;}
     .has-switch span.switch-right {background-color: #3e596b;}
     .has-switch > div.switch-on label {background-color: #f1da46;border-color: #f1d942;}

     .fc-event-skin {
	    border-color: #55ab55;
	    background-color: #5cb85c;
	    color: #fff;
	 }

    </style>

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
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
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
          	<h3><i class="fa fa-angle-right"></i> Calendar</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-9 col-lg-offset-1 mt">
                    <div style="margin-bottom: 70px;">
                      <div style="float: left;">
                        <span style="background-color: #f0ad4e;width: 10px;padding: 2px 9px;margin-right: 9px;"></span> Your Patient
                      </div>
                      <div style="float: left;margin-left: 45px;">
                        <span style="background-color: #5bc0de;width: 10px;padding: 2px 9px;margin-right: 9px;"></span> Others Patient
                      </div>
                      <div style="float: left;margin-left: 45px;">
                        <span style="background-color: #777;width: 10px;padding: 2px 9px;margin-right: 9px;"></span> Old Appointment
                      </div>
                      <div style="float: left;margin-left: 45px;">
                        <span style="background-color: #5cb85c;width: 10px;padding: 2px 9px;margin-right: 9px;"></span> New Appointment
                      </div>
                    </div>
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
		</section>
      </section><!-- /MAIN CONTENT -->
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
	<script src="{{ URL::asset('theme/js/fullcalendar/fullcalendar.min.js') }}"></script>    
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ URL::asset('theme/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ URL::asset('theme/js/common-scripts.js') }}"></script>
    <!--script for this page-->
	<script src="{{ URL::asset('theme/js/calendar-conf-events-schedulePatient.js') }}"></script>   

@endsection
