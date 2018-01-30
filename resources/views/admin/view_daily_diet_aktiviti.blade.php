@extends('main')
@section('content')
<section id="container" >

        <style type="text/css">
			.set-appointment {
				    position: fixed;
				    right: 0;
				    margin: 35px;
				    bottom: 0;
			}
			hr {
				border-top: 2px solid #95b8dc;
			}
			table {
				background-color: #fff;
			}

			.thead-inverse th {
				text-align: center;
			    color: #fff;
			    background-color: #292b2c;
			}
			.thead-inverse td {
			    color: #1f1d1d;
			    background-color: #798286;
			}

			.icon-success {
			    color: #5CB85C;
			}

			.icon-remove {
			    color: #b85c5c;
			}
		</style>
      <!--header end-->

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
                  <h5 class="centered">(ADMIN)</h5>
                    
                  <li class="mt">
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Nutritional Science Officer</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin/nso_list">NSO List</a></li>
                          <li><a href="/admin/register_nso">Add New NSO</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Daily Diet Library</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin/food">Foods</a></li>
                          <li><a href="/admin/drink">Drinks</a></li>
                          <li class="active"><a href="/admin/activity">Activities</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
	<section id="main-content">
          <section class="wrapper">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

			<!-- Form Name -->


			<h2>Daily Diet Library - Activities</h2>
				<div class="row" style="border:1px;"></div>
				<div class="row" style="border:1px;"></div>
					<div class="panel panel-default" style="padding: 10px 10px 40px;">
					<form action="" method="post">
							<table class="table table-hover table-bordered text-center">
								 <thead class="thead-inverse">
									<tr>
										<?php $i = 1; ?>
										<th> # </th>
										<th>Activities</th>
										<th>Calories</th>
										<th></th>
									</tr>
								  </thead>
								  <tbody>

									<tr>
									@foreach($data as $key => $p)
										<td scope="row">{{ $i++ }}</td>
										<td>
											<div class="form-group">
												<div class="col-md-12 inputGroupContainer">
												  	<div class="input-group">
													  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													  <input  name="activityName" class="form-control" type="text-center" style="text-align: center;" value="{{$p->activityName}}" readonly />
												    </div>
												</div>
											</div>
										</td>

										<td>
											<div class="form-group">
												<div class="col-md-12 inputGroupContainer">
												  	<div class="input-group">
													  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													  <input  name="activityCalories" class="form-control" type="text-center" style="text-align: center;" value="{{$p->activityCalories}}" readonly/>
												    </div>
												</div>
											</div>
										</td>
					                    <td>
					                       <div class="pull-right hidden-phone">
                                      		
											<form method="post" class="testbuang" action="{{ '/admin/activity/'.$p->activityId}}">
											    {{ csrf_field() }}
                            					{{ method_field('DELETE') }}
											    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?');">Delete <i class="fa fa-trash-o "></i></button>
											</form>
                                            </div>
					                    </td>
									</div>
								</div>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
						<a role="button" type="submit" style="margin-left: 5px;" class="btn btn-success pull-right" href="/admin/activity/new">Add Activity <span class="glyphicon glyphicon-plus"></span> </a>
		                      <button id="edit-button" class="btn btn-primary pull-right" role="button">Edit <i class="fa fa-pencil "></i></button>
		                      
		                      <button  id="save-button" class="btn btn-danger pull-right" role="button">Save <i class="fa fa-pencil"></i></button>
		          		</form>
					</form>
					</div>
				</div>
			</div>
		</section>
	</section>
</section>
<script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
<script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript">
  $("#save-button").on('click', function(){
  	$(".form-control").css('readonly',true);
  	//$('#btnSubmit').attr("disabled", false);
  });
  $("#edit-button").on('click', function() {
  	$(".form-control").css('readonly',false);
   //$("#save-button").css('display', 'block');
   //$("#edit-button").css('display', 'none');
  });

</script>
@endsection
 