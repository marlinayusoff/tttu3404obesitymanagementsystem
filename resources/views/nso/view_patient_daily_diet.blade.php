@extends('main')
@section('content')

						<style type="text/css">
							html{
								overflow-y: scroll;
							}
						</style>

<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>Obesity System Management</b></a>
            <!--logo end-->

            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new remark</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>

            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/logout">Log Keluar</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <!--<p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>-->
                  <h5 class="centered">NSO</h5>
                    
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
                          <li><a href="/patient_list">Patient List</a></li>
                          <li><a href="/register_patient">Add New Patient</a></li>
                          <li><a href="/viewpatientdailydiet">View Patient Information</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

<section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
<div class="col-md-10 col-md-offset-1">
			<!-- Form Name -->
			<h2>View Patient Daily Diet</h2>
				<div class="row" style="border:1px;">
					<!-- start tabs -->
					<div class="panel panel-default" style="padding: 10px;">
					    <div id="Tabs" class=".testTabs" role="tabpanel">

	
			<!-- Form Name -->
			
					
					
						<!-- <form class="well form-horizontal" action=" " method="post"  id="contact_form"> -->
							<fieldset>
							<div class="col-md-12">
								<div class="panel-body">
						            <div class="table-responsive">
						            <table class="table" align="center">
						              <thead>
						              	
						              </thead>
						              <tr>
						              	<td bgcolor="#dff0d8""><font size="4" >Tarikh</font></td>
						              	<td bgcolor="#dff0d8""></td>
						              </tr>
						              
						              <tbody>
						              	@foreach($dailydiet_details as $d)
						                <tr class="success">
						                  <td>
						                  	<input  id="date" type="text-center" style="text-align: center;" value="{{$d->date}}" disabled/>
						                  </td>
						                  <td align="right"><button id="view" onclick="changeData({{$d->dailyDietId}});" style="margin-bottom: 2px; display: block; width: 100px;" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"> View </button></td>
						                </tr>
						                @endforeach
						                <!--<tr class="success">
						                  <td>05/05/2016</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>15/02/2017</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>14/03/2017</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>15/09/2017</td>
						                  <td align="right">view</td>
						                </tr>-->
						              </tbody>
						            </table>
						            </div>
						            <!--pagination-->
						            <div class="text-center">
						            <ul class="pagination">
									  <li class="disabled"><a href="#">1</a></li>
									  <li><a href="#">2</a></li>
									  <li><a href="#">3</a></li>
									  <li><a href="#">4</a></li>
									  <li><a href="#">5</a></li>
									</ul>
									</div>
							</fieldset>
						<!-- </form> -->
						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Daily Diet</h4>
						      </div>
						      <div class="modal-body" id="displayDailyDiet">
						      </div>
						      <div class="modal-footer">
						      </div>
						    </div>
						  </div>
						</div> 
						
						</section>
						</section>
								  <script src="{{URL::asset('theme/js/jquery.js')}}"></script>
								  <script src="{{URL::asset('theme/js/jquery-1.8.3.min.js')}}"></script>

								  <script>
								  	function changeData(data){
								  		$.ajax({
								  			url: "/getDailyDietDetails", 
								  			data: {dailyDietId : data },
								  			success: function(result){
									        $("#displayDailyDiet").html(result);
									    }});
								  	}
								  </script>

						@endsection