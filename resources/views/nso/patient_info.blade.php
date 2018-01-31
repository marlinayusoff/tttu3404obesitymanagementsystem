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

      <section id="main-content">
          <section class="wrapper" style="margin-left: -28px;">
			<div class="row mt">
              <div class="col-lg-12">
              	<div>
              		
			<!-- Form Name -->
			<h2>&nbsp;&nbsp;&nbsp;View Patient List</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			<!-- Form Name -->
			<h2>View Patient Information</h2>
			 
			<!--<a id="edit" type="submit" style="margin-top: 20px;" href="/pdf" class="btn pull-right"> Print <span class="fa fa-print"></span>   </a> -->
				<div class="row" style="border:1px;">
					<form method="post" action="/pdfPatientInformation">
					    <input type="hidden" name="patientId" value="{{ $data->patientId }}">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <button class="btn pull-right btn-info" style="margin:10px;"> <i class="fa fa-print"></i> Print PDF</button>
					</form>
					<!-- start tabs -->
					<div id="topView" class="panel panel-default" style="padding: 10px;">
					<h3>Patient Information</h3>

						<div class="well">
							<form class="form-horizontal" action="/update" method="get"  id="contact_formsmall">
							<h3>Basic Information</h3>
								<fieldset>
									<div class="form-group">
										<label class="col-md-4 control-label">Name: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="name" value="{{ $data->name }}" readonly disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Gender: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="gender" value="{{ $data->gender }}" readonly disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Date Of Birth: </label>  
										<div class="col-md-6 inputGroupContainer">
											<?php 
											  	$date = $data->dateOfBirth;
												$newDate = date("d M Y", strtotime($date));
											  	 ?>
										  	<input id="info" class="form-control" name="dateOfBirth" value="{{ $newDate }}" readonly disabled>
											 
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">No KP: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="icNo" value="{{ $data->icNo }}" readonly disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Address: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="address" value="{{ $data->address }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Tel No: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="telNo" value="{{ $data->telNo }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Email: </label>  
										<div class="col-md-6 inputGroupContainer">
										  	<input id="info" class="form-control" name="email" value="{{ $data->email }}" disabled>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Appointment Detail: </label>  
										<div class="col-md-6 inputGroupContainer">
    <a href="/schedule/{{ $data->patientId }}" class="btn btn-round btn-theme02" style="width: 45px;padding: 12px;"><i class="fa fa-calendar "></i></a>
										 </div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Daily Diet Detail: </label>  
										<div class="col-md-6 inputGroupContainer">
    <a href="/dailyDiet/{{ $data->patientId }}" class="btn btn-round btn-theme03" style="width: 45px;padding: 12px;"><i class="fa fa-book "></i></a>
										 </div>
									</div>
									<!-- Button -->
									<div class="form-group">
									  <div class="col-md-12">
									  <div style="margin-top: 20px;">
									  	<a id="moreDetail" class="btn btn-info pull-left">   More Details <span class="fa fa-plus-square-o"></span></a>
									  </div>
									    <a id="edit" type="submit" class="btn btn-warning pull-right">   Edit <span class="glyphicon glyphicon-pencil"></span>   </a> 
									    <a id="cancel" type="submit" class="btn btn-danger pull-right" style="margin-right: 10px;display: none;">   Cancel <i class="fa fa-times"></i></a> 
									    <input type="hidden" name="patientId" value="{{ $data->patientId }}">
									    <button id="update" type="submit" class="btn btn-success pull-right" style="margin-right: 10px;display: none;">   Update <span class="glyphicon glyphicon-pencil"></span></button>
									  </div>
									</div>
								</fieldset>
							</form>
							<form class="form-horizontal" action="/updateMore" method="post"  id="contact_formfull" style="display: none;">
								<fieldset>
								<div class="form-group">
										  <label class="col-md-4 control-label">Name</label>  
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										  <input  name="nama" value="{{ $data->name }}" class="form-control"  type="text" readonly>
										    </div>
										  </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" >Gender</label> 
										    <div class="col-md-4 inputGroupContainer">
					                            <div class="input-group">
											  <span class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></span>
											  <input  name="gender" value="{{ $data->gender }}" class="form-control"  type="text" readonly>
											    </div>
					                        </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Date Of Birth</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
										 		<input name="dob" value="{{ $data->dateOfBirth }}" class="form-control"  type="date" readonly>
										    </div>
										  </div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">Ic. No</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
												  	<input type="text" value="{{ $data->icNo }}" class="form-control" name="mycard" id="id_mycard"  readonly>
											  	</div>
											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Address</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										  		<input name="alamat" value="{{ $data->address }}" class="form-control" type="text" readonly="" ="">
										    </div>
										  </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">City</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										 		 <input name="bandar" value="{{ $data->city }}" class="form-control"  type="text" readonly="">
										    </div>
										  </div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">State</label>
										    <div class="col-md-6 selectContainer">
												<div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										 		 <input name="state" value="{{ $data->state }}" class="form-control"  type="text" readonly>
										    </div>
											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Poscode</label>  
										    <div class="col-md-4 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
											  		<input name="poscode" value="{{ $data->poscode }}" class="form-control"  type="text" readonly>
											    </div>
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Race</label>
										    <div class="col-md-6">
										    	<div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
											  		<input name="race" value="{{ $data->race }}" class="form-control"  type="text" readonly>
											    </div> 
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Religion</label>
										    <div class="col-md-6">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
											  		<input name="religion" value="{{ $data->religion }}" class="form-control"  type="text" readonly="">
											    </div>
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Education Level</label>
										    <div class="col-md-6">
					                            <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-folder-close"></i></span>
											  		<input name="education" value="{{ $data->education }}" class="form-control"  type="text" readonly="">
											    </div>
											</div>
										</div>
										<!-- radio checks -->
										 <div class="form-group">
					                        <label class="col-md-4 control-label">Current Information</label>
					                        <div class="col-md-4">
					                           <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
											  		<input name="currentInfo" value="{{ $data->currentInfo }}" class="form-control"  type="text" readonly="">
											    </div>
					                        </div>
					                    </div>
					                    <!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Status</label>
										    <div class="col-md-6">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty"></i></span>
											  		<input name="status" value="{{ $data->status }}" class="form-control"  type="text" readonly="">
											    </div>
											</div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">Tel. No</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
											  		<input name="telNo" value="{{ $data->telNo }}" class="form-control"  type="text" readonly="">
											    </div>
											</div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">Email</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												  	<input type="email" value="{{ $data->email }}" class="form-control"  name="email" readonly="">
											  	</div>
											</div>
										</div>	
										<div class="form-group">
										  <label class="col-md-4 control-label">Username</label>  
										  <div class="col-md-6 inputGroupContainer">
										  	<div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
												  	<input type="text" value="{{ $data->username }}" class="form-control" name="username" readonly="">
											  	</div>
										  </div>
										</div>

								

										<div class="form-group">
									  <div class="col-md-12">
									  <div style="margin-top: 20px;">
									  	<a id="closeDetail" class="btn btn-danger pull-left">   Close More Details <span class="fa fa-minus-square-o"></span></a>
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
								<h4>Medical History</h4>
								<div class="col-md-6">
							<form action="/Kesihatan" method="get">
									<table id="table1" class="table table-hover table-bordered">
									  <thead class="thead-inverse">
										<tr>
											<th colspan="3">Health Issue</th>
										</tr>
										<tr>
											<td>#</td>
											<td>Type of Illness</td>
											<td>Duration</td>
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
												
												<input type="hidden" name="patientId" value="{{ $data->patientId }}">
												<button id="save1" style="display:none;" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
												
												<a id="reset1" style="display:none;" class="btn btn-warning">Reset <i class="fa fa-times"></i></a>
												<a id="cancel1" style="display:none;" class="btn btn-danger">Cancel <i class="fa fa-times"></i></a>
											</td>
										</tr>
									  </tfoot>
									  </tbody>
									</table>
								</form>
								</div>
								<div class="col-md-6">
									<form action="/ubat" method="get">
									<table id="table2" class="table table-hover table-bordered">
									  <thead class="thead-inverse">
										<tr>
											<th colspan="2">Medicine</th>
										</tr>
										<tr>
											<td>#</td>
											<td>Medicine Name</td>
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
												<input type="hidden" name="patientId" value="{{ $data->patientId }}">
												<button id="save2" style="display:none;" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
												<a id="reset2" style="display:none;" class="btn btn-warning">Reset <i class="fa fa-times"></i></a>
												<a id="cancel2" style="display:none;" class="btn btn-danger">Cancel <i class="fa fa-times"></i></a>
											</td>
										</tr>
									  </tfoot>
									  </tbody>
									</table>
								</form>
								</div>
								<form action="/updatespk" method="get">
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th colspan="4">Family Medicine History</th>
									</tr>
									<tr>
										<td>Hipertension</td>
										<td>Cardiovascular Disease</td>
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
									<tr id="spkInput" style="display:none;">
										<td>
											<select name="hipertensi" class="form-control">
												<option <?php if($data->hipertensi == "Ya") {echo "selected"; } ?>>Ya</option>
												<option <?php if($data->hipertensi == "Tidak") {echo "selected"; } ?>>Tidak</option>
											</select>
										</td>
										<td>
											<select name="kardiovaskular" class="form-control">
												<option <?php if($data->kardiovaskular == "Ya") {echo "selected"; } ?>>Ya</option>
												<option <?php if($data->kardiovaskular == "Tidak") {echo "selected"; } ?>>Tidak</option>
											</select>
										</td>
										<td>
											<select name="diabetes" class="form-control">
												<option <?php if($data->diabetes == "Ya") {echo "selected"; } ?>>Ya</option>
												<option <?php if($data->diabetes == "Tidak") {echo "selected"; } ?>>Tidak</option>
											</select>
										</td>
										<td>
											<select name="asma" class="form-control">
												<option <?php if($data->asma == "Ya") {echo "selected"; } ?>>Ya</option>
												<option <?php if($data->asma == "Tidak") {echo "selected"; } ?>>Tidak</option>
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
									    <input type="hidden" name="patientId" value="{{ $data->patientId }}">
									    <button id="update_spk" type="submit" class="btn btn-success pull-right" style="margin-right: 10px;display: none;">   Update <span class="glyphicon glyphicon-pencil"></span></button>
									  </div>
									</div>
								</form>
								<br/>
								<br/>

								<h4>Antropometrial Data</h4>
								<form action="/addAntro" method="post">
									{{ csrf_field() }}
								<table id="table3" class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th rowspan="2" style="vertical-align: middle;">Date</th>
										<th colspan="9">Information</th>
									</tr>
									<tr>
										<td>Weight (kg)</td>
										<td>Height (cm)</td>
										<td>Wrist (inch)</td>
										<td>Waist (inch)</td>
										<td>Hip (inch)</td>
										<td>Forearm (inch)</td>
										<td>BMI (kg/m2)</td>
										<td>% Body Fat Mass</td>
										<td></td>
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
											<td></td>
										</tr>
										@endforeach
								</tbody>
								<tfoot>
									<tr>
											<td colspan="10" style="text-align:center">
												<a id="add3" type="submit" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
												<input type="hidden" name="patientId" value="{{ $data->patientId }}">
												<button id="save3" style="display:none;" type="submit" class="btn btn-success">Save <i class="fa fa-floppy-o"></i></button>
												<a id="reset3" style="display:none;" class="btn btn-warning">Reset <i class="fa fa-times"></i></a>
												<a id="cancel3" style="display:none;" class="btn btn-danger">Cancel <i class="fa fa-times"></i></a>
											</td>
										</tr>
								</tfoot>
								</table>
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
							   <form action="/addTreatment/{{ $data->patientId }}" class="form-horizontal" role="form" method="get">
						        <div class="modal-body">
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
										 		<textarea name="remarks" class="form-control"></textarea>
										  	</div>
										</div>
						        </div>
						        <div class="modal-footer">
						       	  <button type="submit" class="btn btn-success">Submit</button>
						          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
						        </div>
						      </div>
						  	  </form>
						    </div>
						  </div>
						  <!-- close modal -->
						  
					</div>
					
					<div class="panel panel-default" style="padding: 10px 10px 40px;">
					<h3>InBody Result</h3>
								<div class="panel-body">
						            <div class="table-responsive">
						            <table class="table table-striped table-advance table-hover">
						              <thead>
						                <tr>
						                  <th>Date</th>
						                  <th>Weight (kg)</th>
						                  <th>BMI</th>
						                  <th>% Body Fat Mass</th>
						                  <th>Fitness Score</th>
						                  <th></th>
						                </tr>
						              </thead>
						              <tbody>
						              	@foreach($inbody as $in)
						                <tr>
						                  <td>{{$in->date}}</td>
						                  <td>{{$in->weight}}</td>
						                  <td>{{$in->BMI}}</td>
						                  <td>{{$in->bodyFatMass}}</td>
						                  <td>{{$in->fitnessScore}}</td>
						                  <td><div class="col-md-6 inputGroupContainer">
    <a href="/inbody/{{ $data->patientId }}/{{ $in->date }}" class="btn btn-info"><i class="fa fa-bar-chart-o"></i> Details</a>
										 </div></td>
						                </tr>
						                @endforeach
						              </tbody>
						            </table>
						            </div>
						            <div class="text-center">
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
	$('#moreDetail').click(function() {
        $('html, body').animate({ scrollTop: 0}, 'slow', function() {
        	$('#contact_formsmall').css('display', 'none');
			$('#contact_formfull').css('display', 'block');
        });
	});

	$('#closeDetail').click(function() {
		$('html, body').animate({ scrollTop: 0}, 'slow', function() {
		$('#contact_formsmall').css('display', 'block');
		$('#contact_formfull').css('display', 'none');
        });
	});



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
  		var newRow = "<td class='input-group'><span class='input-group-addon'></span><select name='jenispenyakit[]' class='form-control selectpicker' id='HealthProblems' required><option value=''>Select Health Isue</option><option value='Heart Attack' >Heart Attack</option><option value='Diabetes'>Diabetes</option><option value='Fatty Liver'>Fatty Liver</option><option value='Osteoarthritis' >Osteoarthritis</option><option value='Kidney'>Kidney</option><option value='High Blood Pressure'>High Blood Pressure</option><option value='Others'>Others</option></select></td><td><input class='form-control' name='duration[]'  required></td>";
  		$('#HealthIssueOthers').hide();
    	$('#dropdownHealthIssue').val($('#HealthProblems').val());

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
  		var newRow = "<td id='"+tableRow2+"'><input class='form-control' name='jenisubat[]' placeholder='Jenis Ubat' required></td></tr>";
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


  	var tr3 = $('#table3 tbody tr').length;
  	var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = yyyy+'-'+ mm + '-' + dd;
  	$('#add3').on('click',function() {

  		newRow = '<th scope="row"><input type="date" class="form-control" name="date" value="'+today+'" style="width: 149px;padding-right: 0px;" required></th><td><input type="number" class="form-control" name="weight" value="0"></td><td><input type="number" class="form-control" name="height" value="0"></td><td><input type="number" class="form-control" name="wrist" value="0"></td><td><input type="number" class="form-control" name="waist" value="0"></td><td><input type="number" class="form-control" name="hip" value="0"></td><td><input type="number" class="form-control" name="forearm" value="0"></td><td><input type="text" class="form-control" name="BMI" value="0" readonly></td><td><input type="text" class="form-control" name="bodyFatMass" readonly></td><td><input type="button" class="btn btn-default" name="check" value="Check"></td>';

		$('#table3').append("<tr id='antro1'>"+newRow);
		$('#add3').css('display','none');
  		$('#save3').css('display','inline-block');
  		$('#reset3').css('display','inline-block');
  		$('#cancel3').css('display','inline-block');
  	});

  	var trD3 = tr3 + 1;
  	$('#reset3').on('click', function() {
  		
    	var rowCount = $('#table3 tbody tr').length;
    	for(rowCount; rowCount > trD3; rowCount--) {
    		$('#table3 tbody tr:last').remove();
    	}
  	});

  	$('#cancel3').on('click', function() {
    	var rowCount = $('#table3 tbody tr').length;
    	for(rowCount; rowCount > tr3; rowCount--) {
    		$('#table3 tbody tr:last').remove();
    	}
    	$('#add3').css('display','inline-block');
    	$('#save3').css('display','none');
  		$('#reset3').css('display','none');
  		$('#cancel3').css('display','none');
  	});

$('#table3').bind("DOMSubtreeModified", function() {

	$('input[name="check"]').click( function () {
		var height = $('input[name="height"]').val() / 100;
		var weight = $('input[name="weight"]').val();
		var bmi = weight / (height * height);
		bmi = bmi.toFixed(2); 

		$('input[name="BMI"]').val(bmi);		
					
		var weight = $('input[name="weight"]').val();
		var wrist = $('td input[name="wrist"]').val();
		var waist = $('td input[name="waist"]').val();
		var hip = $('td input[name="hip"]').val();
		var forearm = $('td input[name="forearm"]').val();
		var gender = "{{$data->gender}}";

		if(weight != null && wrist != null && waist != null && hip != null && forearm != null) {
			weight = (weight / 0.45359237).toFixed(2);
			var f1,f2,f3,f4,f5,total,LBM,BFM;
			LBM = "";
			BFM = "";
			total = "";
			
			if(gender == "Perempuan") {
				f1 = (weight * 0.732) + 8.987;
				f2 = wrist / 3.14;
				f3 = waist * 0.157;
				f4 = hip * 0.249;
				f5 = forearm * 0.434;
				var n = f1 + f2;
				var q = n - f3;
				var g = q - f4;
				LBM = f5 + g;
				BFM = weight - LBM;
				total = (BFM / weight) * 100;

			} else if(gender == "Lelaki") {
				f1 = (weight * 1.082) + 94.42;
				LBM = f1 - (waist * 4.15);
				BFM = LBM - weight;
				total = (BFM / weight) * 100;
			}

			$('td input[name="bodyFatMass"]').val(Math.round(total));
			}  		
	});  
}); 
</script>

@endsection