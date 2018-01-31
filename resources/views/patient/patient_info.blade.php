@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
      }
      .icon-success {
			    color: #5CB85C;
			}

			.icon-remove {
			    color: #b85c5c;
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
                          <li><a href="/register_patient">Add New Patient</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <section id="main-content">
          <section class="wrapper">
			<div class="row mt">
              <div class="col-lg-12">
              	<div class="content-panel">
              		<div style="position: fixed;right: 0;margin: 35px;bottom: 0;z-index: 99;">
				<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal">Set Appointment</button>
			</div>
			<!-- Form Name -->
			<h2>&nbsp;&nbsp;&nbsp;View Patient List</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			<!-- Form Name -->
			<h2>View Patient Information</h2>
				<div class="row" style="border:1px;">
					<!-- start tabs -->
					<div class="panel panel-default" style="padding: 10px;">
					<h3>Patient Information</h3>
						<div class="well">
							<form class="form-horizontal" action="/info/update" method="post"  id="contact_form">
							<h3>Basic Information</h3>
								<fieldset>
									<div class="form-group">
										<label class="col-md-4 control-label">Name: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="name" value="{{ $data->name }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Gender: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="gender" value="{{ $data->gender }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Date Of Birth: </label>  
										<div class="col-md-6 inputGroupContainer">
											<?php 
											  	$date = $data->dateOfBirth;
												$newDate = date("d M Y", strtotime($date));
											  	 ?>
										  	<input id="info" class="form-control" name="dateOfBirth" value="{{ $newDate }}" disabled>
											 
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">No KP: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="icNo" value="{{ $data->icNo }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Address: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="icNo" value="{{ $data->address }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Appointment Detail: </label>  
										<div class="col-md-6 inputGroupContainer">
    <a href="/schedule/{{ $data->patientId }}" class="btn btn-info btn-xs" style="width: 45px;padding: 12px;"><i class="fa fa-calendar "></i></a>
										 </div>
									</div>
									
								</fieldset>
							</form>

							<br/>
							<hr>
							<br/>
							<form action="" method="post">
								<h3>Health Information</h3>
								<br/>
								<h4>Sejarah Perubatan</h4>
								<div class="col-md-6">
									<table id="table1" class="table table-hover table-bordered">
									  <thead class="thead-inverse">
										<tr>
											<th colspan="3">Masalah Kesihatan</th>
										</tr>
										<tr>
											<td>#</td>
											<td>Jenis Penyakit</td>
											<td>Tempoh</td>
										</tr>
									  </thead>
									  <tbody>
									  	<?php $i = 1; ?>
									  	@foreach($health as $row)
										<tr>
											<th scope="row">{{ $i++ }}</th>
											<td>{{ $row->healthIssue }}</td>
											<td>{{ $row->duration }}</td>
										</tr>
										@endforeach
										
										<tfoot>
										<tr>
											<td colspan="3" style="text-align:center">
												<a id="add1" type="submit" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
												<button id="save1" style="display:none;" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
												<a id="reset1" style="display:none;" class="btn btn-warning">Reset <i class="fa fa-times"></i></a>
												<a id="cancel1" style="display:none;" class="btn btn-danger">Cancel <i class="fa fa-times"></i></a>
											</td>
										</tr>
									  </tfoot>
									  </tbody>
									</table>

								</div>
								<div class="col-md-6">
									<table id="table2" class="table table-hover table-bordered">
									  <thead class="thead-inverse">
										<tr>
											<th colspan="2">Ubat</th>
										</tr>
										<tr>
											<td>#</td>
											<td>Jenis Ubat</td>
										</tr>
									  </thead>
									  <tbody>
										<?php $i = 1; ?>
									  	@foreach($medicine as $row)
										<tr>
											<th scope="row">{{ $i++ }}</th>
											<td>{{ $row->medicineName }}</td>
										</tr>
										@endforeach
									
										<tfoot>
										<tr>
											<td colspan="2" style="text-align:center">
												<a id="add2" type="submit" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
												<button id="save2" style="display:none;" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
												<a id="reset2" style="display:none;" class="btn btn-warning">Reset <i class="fa fa-times"></i></a>
												<a id="cancel2" style="display:none;" class="btn btn-danger">Cancel <i class="fa fa-times"></i></a>
											</td>
										</tr>
									  </tfoot>
									  </tbody>
									</table>
								</div>
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th colspan="4">Sejarah Perubatan Keluarga</th>
									</tr>
									<tr>
										<td>Hipertensi</td>
										<td>Penyakit Kardiovaskular</td>
										<td>Diabetes</td>
										<td>Asma</td>
									</tr>
								  </thead>
								  <tbody>
								  	<tr id="spk">
									  	<td><span class="glyphicon glyphicon-ok icon-success" aria-hidden="true"></span></td>
										<td><span class="glyphicon glyphicon-remove icon-remove" aria-hidden="true"></span></td>
										<td><span class="glyphicon glyphicon-remove icon-remove" aria-hidden="true"></span></td>
										<td><span class="glyphicon glyphicon-ok icon-success" aria-hidden="true"></span></td>
									</tr>
									<tr id="spkInput" style="display:none;">
										<td>
											<select class="form-control">
												<option selected>Ya</option>
												<option>Tidak</option>
											</select>
										</td>
										<td>
											<select class="form-control">
												<option>Ya</option>
												<option selected>Tidak</option>
											</select>
										</td>
										<td>
											<select class="form-control">
												<option>Ya</option>
												<option selected>Tidak</option>
											</select>
										</td>
										<td>
											<select class="form-control">
												<option>Ya</option>
												<option>Tidak</option>
											</select>
										</td>
									</tr>
								  </tbody>
								</table>
								<div class="form-group" style="margin-right: -100px;">
									  <label class="col-md-4 control-label"></label>
									  <div class="col-md-6">
									    <a id="edit_spk" type="submit" class="btn btn-warning pull-right">   Edit <span class="glyphicon glyphicon-pencil"></span>   </a> 
									    <a id="cancel_spk" type="submit" class="btn btn-danger pull-right" style="margin-right: 10px;display: none;">   Cancel <i class="fa fa-times"></i></a> 
									    <button id="update_spk" type="submit" class="btn btn-success pull-right" style="margin-right: 10px;display: none;">   Update <span class="glyphicon glyphicon-pencil"></span></button>
									  </div>
									</div>

								<br/>
								<br/>

								<h4>Data Antropometri</h4>
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th rowspan="2" style="vertical-align: middle;">Tarikh</th>
										<th colspan="6">Maklumat</th>
									</tr>
									<tr>
										<td>Berat badan (kg)</td>
										<td>Tinggi (cm)</td>
										<td>BMI (kg/m2)</td>
										<td>Ukur Lilit Pinggang (cm)</td>
										<td>% Lemak Tubuh</td>
										<td>Berat Lemak Badan</td>
									</tr>
								  </thead>
								  <tbody>
									<tr>
										<th scope="row">26/5/2017</th>
										<td>XX</td>
										<td>XXX</td>
										<td>XXX</td>
										<td>XXX</td>
										<td>XX</td>
										<td>XX</td>
									</tr>
									<tr>
										<th scope="row">2/6/2017</th>
										<td>XX</td>
										<td>XXX</td>
										<td>XXX</td>
										<td>XXX</td>
										<td>XX</td>
										<td>XX</td>
									</tr>
									<tr>
										<th scope="row">11/6/2017</th>
										<td>XX</td>
										<td>XXX</td>
										<td>XXX</td>
										<td>XXX</td>
										<td>XX</td>
										<td>XX</td>
									</tr>
									<tr>
										<th scope="row"><input type="date" class="form-control" name="tarikh" style="width: 149px;padding-right: 0px;"></th>
										<td><input type="number" class="form-control" name="beratbadan"></td>
										<td><input type="number" class="form-control" name="tinggi"></td>
										<td><input type="number" class="form-control" name="bmi"></td>
										<td><input type="number" class="form-control" name="pinggang"></td>
										<td><input type="number" class="form-control" name="lemaktubuh"></td>
										<td><input type="number" class="form-control" name="beratlemak"></td>
									</tr>
									<tr>
										<td colspan="7" style="text-align:center">
											<a type="submit" class="btn btn-danger">Add <span class="glyphicon glyphicon-plus"></span>   </a>
										</td>
									</tr>
								  </tbody>
								</table>
								<br/>
								<button type="submit" class="btn btn-warning pull-right" disabled>   Edit <span class="glyphicon glyphicon-pencil"></span>   </button> 
									    <button type="submit" class="btn btn-success pull-right" style="margin-right: 10px;">   Update <span class="glyphicon glyphicon-pencil"></span>   </button>
								<br/>
							</form>
						</div>
					</div>

					<div class="panel panel-default" style="padding: 10px 10px 40px;">
					<h3>Treatment Record</h3>
						<form class="well form-horizontal" action=" " method="post"  id="contact_form">
							<fieldset>
								<div class="panel-body">
						            <div class="table-responsive">
						            <table class="table">
						              <thead>
						                <tr>
						                  <th>Date</th>
						                  <th style="width:80%;">Remarks</th>
						                </tr>
						              </thead>
						              <tbody>
						                <tr class="success">
						                  <td>30/5/2017</td>
						                  <td>Perlu menjalani rawatan susulan pada tiga minggu akan datang</td>
						                </tr>
						                <tr class="success">
						                  <td>5/5/2017</td>
						                  <td>sasaran turun berat badan : -3kg</td>
						                </tr>
						                <tr class="success">
						                  <td>15/2/2017</td>
						                  <td>BMI semasa : 23.1 
						                  perlu menjalani aktiviti fizikal berkala selama 2 bulan</td>
						                </tr>
						                <tr class="success">
						                  <td>14/12/2016</td>
						                  <td>BMI semasa : 23.5
						                  perlu menjalani aktiviti fizikal berkala selama 2 bulan dan kawalan pemakanan bergula</td>
						                </tr>
						                <tr class="success">
						                  <td>15/9/2016</td>
						                  <td>BMI semasa : 24.0<br>
						                  telah menjalani ujian saringan : lulus </td>
						                </tr>
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
						</form>
						<div class="pull-right">
							<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#myModal">Add Record</button>
						</div>
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog modal-lg">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Add Treatment Record</h4>
						        </div>
						        <div class="modal-body">
							        <form class="form-horizontal" role="form">
							          <!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Date:</label>  
										    <div class="col-md-6">
										 		<input name="date" class="form-control"  type="date">
										  	</div>
										</div>
							        	<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Remarks</label>  
										    <div class="col-md-6">
										 		<textarea name="text" class="form-control"></textarea>
										  	</div>
										</div>
									</form>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						    </div>
						  </div>
						  <!-- close modal -->
					</div>
					<div class="panel panel-default" style="padding: 10px 10px 40px;">
					<h3>InBody Result</h3>
						<form class="well form-horizontal" action=" " method="post"  id="contact_form">
							<fieldset>
								<div class="panel-body">
						            <div class="table-responsive">
						            <table class="table">
						              <thead>
						                <tr>
						                  <th>Date</th>
						                  <th>Time</th>
						                  <th>Fitness Score</th>
						                  <th></th>
						                </tr>
						              </thead>
						              <tbody>
						                <tr class="success">
						                  <td>5/5/2017</td>
						                  <td>09:45:23</td>
						                  <td>70-79: Good</td>
						                  <td><a href="view_inbody.html" class="btn btn-warning btn-xs">Details</a></td>
						                </tr>
						                <tr class="success">
						                  <td>15/2/2017</td>
						                  <td>10:14:00</td>
						                  <td>60-69: Average</td>
						                  <td><a href="view_inbody.html" class="btn btn-warning btn-xs">Details</a></td>
						                </tr>
						                <tr class="success">
						                  <td>14/12/2016</td>
						                  <td>15:22:00</td>
						                  <td>50-59: Weak</td>
						                  <td><a href="view_inbody.html" class="btn btn-warning btn-xs">Details</a></td>
						                </tr>
						                <tr class="success">
						                  <td>15/9/2016</td>
						                  <td>08:20:00</td>
						                  <td>Below 50: Very Weak</td>
						                  <td><a href="view_inbody.html" class="btn btn-warning btn-xs">Details</a></td>
						                </tr>
						              </tbody>
						            </table>
						            </div>
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
						</form>
						<div class="pull-right">
							<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#inbody">Add Record</button>
						</div>
						<!-- Modal -->
						  <div class="modal fade" id="inbody" role="dialog">
						    <div class="modal-dialog modal-lg">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Add InBody Result</h4>
						        </div>
						        <div class="modal-body">
							        <form class="form-horizontal" role="form">
							          <!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Date:</label>  
										    <div class="col-md-6">
										 		<input name="date" class="form-control"  type="date">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">Time:</label>  
										    <div class="col-md-6">
										 		<input name="time" class="form-control"  type="time">
										  	</div>
										</div>
										<h3 style="margin-left: 67px;">Body Composition</h3>
										<div class="form-group">
										  <label class="col-md-4 control-label">Weight:</label>  
										    <div class="col-md-6">
										 		<input name="weight" class="form-control"  type="number">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">Muscle Mass:</label>  
										    <div class="col-md-6">
										 		<input name="mm" class="form-control"  type="number">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">Body Fat Mass:</label>  
										    <div class="col-md-6">
										 		<input name="bfm" class="form-control"  type="number">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">TBW:</label>  
										    <div class="col-md-6">
										 		<input name="tbw" class="form-control"  type="number">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">Protein:</label>  
										    <div class="col-md-6">
										 		<input name="protein" class="form-control"  type="number">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">FFM:</label>  
										    <div class="col-md-6">
										 		<input name="ffm" class="form-control"  type="number">
										  	</div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label">Mineral:</label>  
										    <div class="col-md-6">
										 		<input name="mineral" class="form-control"  type="number">
										  	</div>
										</div>
									</form>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						    </div>
						  </div>
					</div>

				</div>
			</div>
				</div>
			  </div>
			</div>
		 </section>
      </section>
</section>


<script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>

<script type="text/javascript">
	$('#edit').click(function(){
		$('#edit').css('display','none');
		$('#cancel').css('display','block');
		$('#update').css('display','block');
		$('[id^=info]').prop('disabled', false);
	});

	$('#cancel').click(function(){
		$('#edit').css('display','block');
		$('#cancel').css('display','none');
		$('#update').css('display','none');
		$('[id^=info]').prop('disabled', true);
	});

	$('#edit_spk').click(function(){
		$('#edit_spk').css('display','none');
		$('#cancel_spk').css('display','block');
		$('#update_spk').css('display','block');
		$('#spkInput').css('display','table-row');
		$('#spk').css('display','none');
	});

	$('#cancel_spk').click(function(){
		$('#edit_spk').css('display','block');
		$('#cancel_spk').css('display','none');
		$('#update_spk').css('display','none');
		$('#spkInput').css('display','none');
		$('#spk').css('display','table-row');
	});


	var tr1 = $('#table1 tbody tr').length;
  	$('#add1').on('click',function() {
  		var newRow = "<td><input class='form-control' name='jenispenyakit[]' placeholder='Jenis Penyakit'></td><td><input class='form-control' name='tempoh[]' placeholder='Tempoh Penyakit'></td></tr>";
  		var tableRow1 = $('#table1 tbody tr').length;
  		tableRow1++;
  		$('#table1').append("<tr><th scope='row'>"+tableRow1+"</th>"+newRow);
  		$('#save1').css('display','inline-block');
  		$('#reset1').css('display','inline-block');
  		$('#cancel1').css('display','inline-block');
  	});

  	var tr2 = $('#table2 tbody tr').length;
  	$('#add2').on('click',function() {
  		var tableRow2 = $('#table2 tbody tr').length;
  		tableRow2++;
  		var newRow = "<td id='"+tableRow2+"'><input class='form-control' name='jenisubat[]' placeholder='Jenis Ubat'></td></tr>";
  		$('#table2').append("<tr><th scope='row'>"+tableRow2+"</th>"+newRow);
  		$('#save2').css('display','inline-block');
  		$('#reset2').css('display','inline-block');
  		$('#cancel2').css('display','inline-block');
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
  		$('#cancel1').css('display','none');
  	});
	
	var trD2 = tr2 + 1;
  	$('#reset2').on('click', function() {
  		
    	var rowCount = $('#table2 tbody tr').length;
    	for(rowCount; rowCount > trD2; rowCount--) {
    		$('#table2 tbody tr:last').remove();
    	}
  	});

  	$('#cancel2').on('click', function() {
    	var rowCount = $('#table2 tbody tr').length;
    	for(rowCount; rowCount > tr2; rowCount--) {
    		$('#table2 tbody tr:last').remove();
    	}
    	$('#save2').css('display','none');
  		$('#reset2').css('display','none');
  		$('#cancel2').css('display','none');
  	});

</script>

@endsection