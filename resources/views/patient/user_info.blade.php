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
                  
                  <h5 class="centered" style="padding-top: 20px;">{{ Session::get('user')->name }}</h5>
                  <h5 class="centered">(NSO)</h5>
                    
                  <li class="mt">
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>User Information</span>
                      </a>
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
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
							<!-- Form Name -->
							<h2>View User Information</h2>
								<div class="row" style="border:1px;">
								<	!-- start tabs -->
								<div class="panel panel-default" style="padding: 10px;">
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
												<!-- Button -->
												<div class="form-group">
												  <label class="col-md-4 control-label"></label>
												  <div class="col-md-6">
												    <a id="edit" type="submit" class="btn btn-warning pull-right">   Edit <span class="glyphicon glyphicon-pencil"></span>   </a> 
												    <a id="cancel" type="submit" class="btn btn-danger pull-right" style="margin-right: 10px;display: none;">   Cancel <i class="fa fa-times"></i></a> 
												    <button id="update" type="submit" class="btn btn-success pull-right" style="margin-right: 10px;display: none;">   Update <span class="glyphicon glyphicon-pencil"></span></button>
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
										<td>Ukur Lilit Pergelangan Tangan (cm)</td>
										<td>Ukur Lilit Pinggang (cm)</td>
										<td>Ukur Lilit Pinggul (cm)</td>
										<td>Ukur Lilit Lengan(cm)</td>
										<td>% Lemak Tubuh</td>
									</tr>
								  </thead>
								  <tbody>
									<tr>
										<th scope="row"><input type="date" class="form-control" name="tarikh" style="width: 149px;padding-right: 0px;"></th>
										<td>{{ $anthro_data->weight }}</td>
										<td>{{ $anthro_data->height }}</td>
										<td>{{ $anthro_data->BMI }}</td>
										<td>{{ $anthro_data->wrist }}</td>
										<td><{{ $anthro_data->waist }}</td>
										<td><{{ $anthro_data->hip }}</td>
										<td><{{ $anthro_data->forearm }}</td>
										<td><{{ $anthro_data->bodyFatMass }}</td>
									</tr>
									
								  </tbody>
								</table>
								<br/>
								
							</form>
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

</script>

@endsection