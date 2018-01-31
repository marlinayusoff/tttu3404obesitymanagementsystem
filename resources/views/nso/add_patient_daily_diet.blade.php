@extends('main')
@section('content')

						<style type="text/css">
							html{
								overflow-y: scroll;
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
                      <a href="/">
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
                          <span>Add Daily Diet</span>
                      </a>
                      <ul class="sub">                          <li class="active"><a href="/nso/adddailydiet">Add Daily Diet</a></li>                          <li><a href="/DailyDiet_Details">View Daily Diet</a></li>                      </ul>
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
                  <div class="col-lg-12 main-chart">
                    <div class="col-md-10 col-md-offset-1">
            			<!-- Form Name -->
            			<h2>Add Daily Diet</h2>
            				<div class="row" style="border:1px;"></div>
            				<div class="row" style="border:1px;"></div>
            					<div class="panel panel-default" style="padding: 10px 10px 40px;">
            					<!-- <form action="/nso/addDaily4" method="get"> -->
            					<form action="/nso/addDaily" method="get">
            							<table id="table1" class="table table-hover table-bordered text-center">
            								 <thead class="thead-inverse">
            									<tr>
            										<th>Food</th>
            									</tr>
        								    </thead>
        							        <tbody>
                								<tr><td style="background-color: #fff;"><select class='form-control selectpicker' name="list" required>
                    									<option value="">Please select food</option>
                    									@foreach($dailydiet_details as $d)
                										<option value="{{$d->foodId}}">{{$d->foodName}} - {{$d->calories}} Kcal</option>@endforeach
                										</select></td>
										        </tr>
    								        </tbody>
						                </table>
					            <!-- </form> -->
					            <div class="row" style="border:1px;"></div>
				                <div class="row" style="border:1px;"></div>
							        <table id="table1" class="table table-hover table-bordered text-center">
								        <thead class="thead-inverse">
									        <tr>
										        <th>Drink</th>
										    </tr>
								        </thead>
    							        <tbody>
        								    <tr><td style="background-color: #fff;"><select class='form-control selectpicker' name="list2" required>
            									<option value="">Please select drink</option>
            									@foreach($dailydiet_details2 as $a)
        										<option value="{{$a->drinkId}}">{{$a->drinkName}} - {{$a->calories}} Kcal</option>@endforeach
        										</select></td>
        									</tr>
        								 </tbody>
						            </table>
					                <!-- </form> -->
					            <div class="row" style="border:1px;"></div>
				                <div class="row" style="border:1px;"></div>
							<table id="table1" class="table table-hover table-bordered text-center">
								 <thead class="thead-inverse">
									<tr>
										<th>Activity</th>	
									</tr>
								  </thead>
							    <tbody>
    								<tr><td style="background-color: #fff;"><select class='form-control selectpicker' name="list3" required>
        									<option value="">Please select activity</option>
        									@foreach($dailydiet_details3 as $c)
    										<option value="{{$c->activityId}}">{{$c->activityName}} - {{$c->calories}} Kcal</option>@endforeach
    										</select></td>
									</tr>
								 </tbody>
							</table>
							<div class="pull-right">
    						    <button id="save4" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
						    </div>
					    </form>
				    </div>
				</div>
			</div>
		</div>
	</section>
</section>
@endsection
