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
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Patient</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/patientList">Patient List</a></li>
                          <li><a href="/register_patient">Add New Patient</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="active" href="/Appointment">
                          <i class="fa fa-dashboard"></i>
                          <span>Add Appointment</span>
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
                  <aside class="col-lg-3 mt">

                  	<div style="margin-bottom: 30px;">
                  	<label style="font-size: 13pt;font-weight: bold;">Select Patient Name</label>
                  		<select class="form-control" id="patientList" required>
                  			<option value="">Select Patient</option>
                  			@foreach($patient as $row)
                  				<option value="{{ $row->name }}">{{ $row->name }}</option>
                  			@endforeach
                  		</select>
                  		<br>
                  		<label style="font-size: 13pt;font-weight: bold;">Select Time</label>
                  		<br>
                  		<select class="form-control" id="timeHour" style="width: 85px;float: left;">
                  			<option value="">Jam</option>
                  			<option value="08">08</option>
                  			<option value="09">09</option>
                  			<option value="10">10</option>
                  			<option value="11">11</option>
                  		</select>
                  		<select class="form-control" id="timeMinutes" style="width: 85px;margin-left: 1px;float: left;">
                  			<option value="">Minit</option>
                  			<option value="00">00</option>
                  			<option value="15">15</option>
                  			<option value="30">30</option>
                  			<option value="45">45</option>
                  			<option value="50">50</option>
                  		</select>
                              <div class="col-sm-1" style="float: left;margin-left: -11px;margin-top: 3px;">
                                  <div id="switch" class="switch switch-square"
                                       data-on-label="AM"
                                       data-off-label="PM">
                                      <input type="checkbox"  checked="" />
                                  </div>
                              </div>
                  		<br>
                  		<button id="createPatient" class="btn btn-theme center-block" style="margin-top: 55px;"><i class="fa fa-check"></i> Create</button>
                  	</div>
                  	<hr>
                      <h4><i class="fa fa-angle-right"></i> Draggable Patient</h4>
                      <div id="external-events">

                          <p class="drop-after">
                              <input type="checkbox" id="drop-remove" style="opacity: 0;" checked readonly>
                          </p>
                      </div>
                  </aside>
                  <aside class="col-lg-9 mt">
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
                      <button id="btnSave" type="button" class="btn btn-danger" style="position: fixed;bottom: 50px;right: 30px;">Save Appointment</button>
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

<script type="text/javascript">
	var dataNew = [];
</script>

    <!--common script for all pages-->
    <script src="{{ URL::asset('theme/js/common-scripts.js') }}"></script>

    <!--script for this page-->
	<script src="{{ URL::asset('theme/js/calendar-conf-events.js') }}"></script>   

	<script src="{{ URL::asset('theme/js/bootstrap-switch.js') }}"></script> 

	<script type="text/javascript">

			$('#createPatient').click(function() {
				if($('#patientList').val() != "" && $('#timeHour').val() != "" && $('#timeMinutes').val() != "") {
					var patient = $('#patientList').val();
					var hour = $('#timeHour').val();
					var minutes = $('#timeMinutes').val();
					var a;

					if($('.switch-animate').hasClass('switch-on')) { 
						a = 'AM';
					} else if($('.switch-animate').hasClass('switch-off')) {
						a = 'PM';
					}

					var title = hour+':'+minutes+' '+a+': '+patient;

					var body = {"title":title, "color":"#5cb85c"};

					$('#external-events:first').prepend('<div class="draggable external-event label label-success ui-draggable" style="position: relative;background-color:#5cb85c;" data-event="'+body+'">'+hour+':'+minutes+' '+a+': '+patient+'</div>');

					$('#external-events div.external-event').each(function() {

				        var eventObject = {
				            title: $.trim($(this).text()) 
				        };
				        $(this).data('eventObject', eventObject);
				        $(this).draggable({
				            zIndex: 999,
				            revert: true,     
				            revertDuration: 0 
				        });

				    });
				    $('#patientList').val("");
				    $('#timeHour').val("");
				    $('#timeMinutes').val("");
				} else {
					alert('Sila pilih nama patient, jam, dan masa.');
				}
			});
			
			$('#btnSave').on('click', function(){
				var success;
				if (confirm("Are you sure about this change?")) {
					$.each(dataNew, function( key1, value1 ) {
		                        var datA = ''+value1['title']+'';
		                        var time = datA.substring(0, 8);
		                        var patientName = datA.substring(10);
		                        var dates1 = value1['start'];
		                        dates1 = ''+dates1+'';
		                        dates1 = dates1.substring(0,15);
		                        $.ajax({
								  type: "get",
								  url: "/addAppt",
								  encoding: "UTF-8",
								  dataType: "json",
								  data: { pname: patientName, date: dates1, times: time },
								  success:function(data) {}
								});
		            });
		        } 	
		        alert("Berjaya!");
			    location.reload();
			});

	</script>

@endsection
