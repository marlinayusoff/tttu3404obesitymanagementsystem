@extends('main')
@section('content')

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
                          <li class="active"><a href="/admin/food">Foods</a></li>
                          <li><a href="/admin/drink">Drinks</a></li>
                          <li><a href="/admin/activity">Activities</a></li>
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
			<h2>Add Daily Diet Library - Foods</h2>
				<div class="row" style="border:1px;"></div>
				<div class="row" style="border:1px;"></div>
					<div class="panel panel-default" style="padding: 10px 10px 40px;">
							<form action="/admin/food/add" method="get">
							<table id="table1" class="table table-hover table-bordered text-center">
								 <thead class="thead-inverse">
									<tr>
										<th> # </th>
										<th>Food</th>
										<th>Calories</th>
									</tr>
								  </thead>
								  <?php $i = 1; ?>
								  <!--<tbody>
									
									<tr>
										
										<td>{{ $i++ }}</td>
										<td><div class="form-group">
											<div class="col-md-12 inputGroupContainer">
												  	<div class="input-group">
												  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													  	<input  name="foodName" class="form-control" type="text-center" style="text-align: center;">
												    </div>
												 </div>
											</div>
										</td>
										<td><div class="form-group">
											<div class="col-md-12 inputGroupContainer">
												  	<div class="input-group">
													  	<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													  	<input  name="foodCalories" class="form-control" type="text-center" style="text-align: center;">
												    </div>
												 </div>
											</div>
										</td>
									</tr>
								</tbody>-->
								<tfoot>
									<tr>
										<td colspan="3" style="text-align:center">
											<a id="add1" type="submit" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>

											<button id="save1" style="display:none;" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
											
											<a id="reset1" style="display:none;" class="btn btn-warning">Reset <i class="fa fa-times"></i></a>
											<a id="cancel1" class="btn btn-danger" href="/admin/food">Cancel <i class="fa fa-times"></i></a>
										</td>
									</tr>
								</tfoot>
							</table>
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
  var tr1 = $('#table1 tbody tr').length;
  	$('#add1').on('click',function() {
  		var newRow = "<td><div class='form-group'><div class='col-md-12 inputGroupContainer'><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span><input name='foodName[]' class='form-control' type='text-center' style='text-align: center;'></div></div></div></td><td><div class='form-group'><div class='col-md-12 inputGroupContainer'><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span><input  name='foodCalories[]' class='form-control' type='text-center' style='text-align: center;''></div></div></div></td>";
  	var tableRow1 = $('#table1 tbody tr').length;
  		tableRow1++;
  		$('#table1').append("<tr><th scope='row'>"+tableRow1+"</th>"+newRow);
      $('#save1').css('display','inline-block');
      $('#reset1').css('display','inline-block');
  		$('#cancel1').css('display','inline-block');
  	});

  	var trD1 = tr1 + 1;
  	$('#reset1').on('click', function() {
  		
    	var rowCount = $('#table1 tbody tr').length;
    	for(rowCount; rowCount > trD1; rowCount--) {
    		$('#table1 tbody tr:last').remove();
    	}
  	});

  	$('#cancel1').on('click', function() {
    	var rowCount = $('#table1 tbody tr').length;
    	for(rowCount; rowCount > tr1; rowCount--) {
    		$('#table1 tbody tr:last').remove();
    	}
  		$('#save1').css('display','none');
  		$('#reset1').css('display','none');
  	});

</script>
@endsection