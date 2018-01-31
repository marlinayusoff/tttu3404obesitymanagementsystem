<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OBESITY MANAGEMENT SYSTEM</title>

    <link href="{{ URL::asset('theme/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/css/style-responsive.css') }}" rel="stylesheet" type="text/css">

    <style type="text/css">
      .site-footer {
        position: fixed;bottom: 0;width: 100%;z-index: -1;
      }
    </style>
  </head>
<style type="text/css">
      .site-footer {
        position: unset;
      }
    </style>
	<div class="container">

		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<br/>
			<h2 style="text-align: center;">OBESITY MANAGEMENT SYSTEM</h2>
			<h3 style="text-align: center;">Patient Information</h3>
				
				<div class="row" style="border:1px;">
					
					<button class="btn pull-right btn-info" style="margin:10px;" > <i class="fa fa-print"></i> Print PDF</button>
					<!-- start tabs -->
					<div id="topView" class="panel panel-default" style="padding: 10px;">
					
						<br/>
						<br/>
						<br/>
						<div class="well">
							<form class="form-horizontal" action="/update" method="post"  id="contact_formsmall">
							<h3>Basic Information</h3>
								<fieldset>
									<div class="form-group">
										<label class="col-md-4 control-label">Name: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	{{ $data->name }}
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Gender: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	{{ $data->gender }}
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Date Of Birth: </label>  
										<div class="col-md-6 inputGroupContainer">
											{{ $data->dateOfBirth }}
											 
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">No KP: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	{{ $data->icNo }}
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Address: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	{{ $data->address }}
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Tel No: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	{{ $data->telNo }}
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Email: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	 {{$data->email }}
										 </div>
									</div>
									
									</div>
																	
								</fieldset>
							</form>
							
							<br/>
							<hr>
							<br/>
							
								<h3>Health Information</h3>
								<br/>
								<div class="well">
								<form class="form-horizontal" action="/update" method="post"  id="contact_formsmall">
									<h4>Sejarah Perubatan</h4>
										<div class="col-md-6">
											<form action="/Kesihatan" method="get">
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
												</form>
										</div>

										<div class="col-md-6">
											<form action="/ubat" method="get">
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
										</form>
										</div>

								<form action="/updatespk" method="get">
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
									  	<td><span class="glyphicon <?php if($data->hipertensi == 'Ya') { echo 'glyphicon-ok icon-success'; } else { echo 'glyphicon-remove icon-remove'; } ?>" aria-hidden="true"></span></td>
										<td><span class="glyphicon <?php if($data->kardiovaskular == 'Ya') { echo 'glyphicon-ok icon-success'; } else { echo 'glyphicon-remove icon-remove'; } ?>" aria-hidden="true"></span></td>
										<td><span class="glyphicon <?php if($data->diabetes == 'Ya') { echo 'glyphicon-ok icon-success'; } else { echo 'glyphicon-remove icon-remove'; } ?>" aria-hidden="true"></span></td>
										<td><span class="glyphicon <?php if($data->asma == 'Ya') { echo 'glyphicon-ok icon-success'; } else { echo 'glyphicon-remove icon-remove'; } ?>" aria-hidden="true"></span></td>
									</tr>
								
								  </tbody>
								</table>
							
								</form>
								<br/>
								<br/>
							</form>
						</div>


							<div class="well">
							<form class="form-horizontal" action="/update" method="post"  id="contact_formsmall">
								<h4>Data Antropometri</h4>
								<form action="/addAntro" method="post">
								<table id="table3" class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th rowspan="2" style="vertical-align: middle;">Tarikh</th>
										<th colspan="9">Maklumat</th>
									</tr>
									<tr>
										<td>Berat badan (kg)</td>
										<td>Tinggi (cm)</td>
										<td>Ukur Lilit Pergelangan Tangan (inch)</td>
										<td>Ukur Lilit Pinggang (inch)</td>
										<td>Ukur Lilit Pinggul (inch)</td>
										<td>Ukur Lilit Lengan (inch)</td>
										<td>BMI (kg/m2)</td>
										<td>% Lemak Tubuh</td>
									</tr>
								  </thead>
								  <tbody>
									  	@foreach($anthro_data as $row)
										<tr>
											<td>{{ $row->date }}</td>
											<td>{{ $row->weight }}</td>
											<td>{{ $row->height }}</td>
											<td>{{ $row->wrist }}</td>
											<td>{{ $row->waist }}</td>
											<td>{{ $row->hip }}</td>
											<td>{{ $row->forearm }}</td>
											<td>{{ $row->BMI }}</td>
											<td>{{ $row->bodyFatMass }}</td>
										</tr>
										@endforeach
								</tbody>
								
								</table>
							</form>
						</div>
					</div>
				</form>
			</div>


					<div class="panel panel-default" style="padding: 10px;">
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
						                @foreach($treatment as $tr)
						                <tr>
						                  <td>{{$tr->date}}</td>
						                  <td>{{$tr->remarks}}</td>
						                </tr>
						                @endforeach
						              </tbody>
						            </table>
						            </div>
						            <div class="text-center">
						            
									</div>
							</fieldset>
						</form>
					</div>

					<div class="panel panel-default" style="padding: 10px 10px 40px;">
					<h3>InBody Result</h3>
						<form class="well form-horizontal" action=" " method="post"  id="contact_form">
							<fieldset>
								<div class="panel-body">
						            <div class="table-responsive">
						            <table class="table table-striped table-advance table-hover">
						              <thead>
						                <tr>
						                  <th>Date</th>
						                  <th>Berat badan (kg)</th>
						                  <th>BMI</th>
						                  <th>% Lemak Tubuh</th>
						                  <th>Fitness Score</th>
						                </tr>
						              </thead>
						              <tbody>
						              	@foreach($inbody as $in)
						                <tr>
						                  <td>{{$in->date}}</td>
						                  <td>{{$in->weight}}</td>
						                  <td>{{$in->BMI}}</td>
						                  <td>{{$in->percentBodyFat}}</td>
						                  <td>{{$in->fitnessScore}}</td>
						                </tr>
						                @endforeach
						              </tbody>
						            </table>
						            </div>
						            <div class="text-center">
						            
									</div>
						
							</fieldset>
						</form>
					</div>

				</div>
			</div>
<script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
<script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>

<script type="text/javascript">
	$("button").click(function () {
    print()
});
</script>
</html>
