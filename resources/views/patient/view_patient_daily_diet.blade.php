@extends('main')
@section('content')

<section id="container" >
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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Daily Diet</span>
                      </a>
                      <ul class="sub">                          <li><a href="/nso/adddailydiet">Add Daily Diet</a></li>                          <li class="active"><a href="/DailyDiet_Details">View Daily Diet</a></li>                      </ul>
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
						            <!--<ul class="pagination">
									  <li class="disabled"><a href="#">1</a></li>
									  <li><a href="#">2</a></li>
									  <li><a href="#">3</a></li>
									  <li><a href="#">4</a></li>
									  <li><a href="#">5</a></li>
									</ul>-->
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