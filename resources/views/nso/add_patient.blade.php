@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
      }
    </style>
<?php $user = Session::get('user'); ?>
<section id="container" >
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
                          <li class="active"><a href="/nso/register_patient">Add New Patient</a></li>
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
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
<div class="col-md-10 col-md-offset-1">
			<!-- Form Name -->
			<h2>Patient Registrationt</h2>
				<div class="row" style="border:1px;">
					<!-- start tabs -->
					
					        <!-- Tab panes -->
					        <div class="tab-content" style="padding-top: 20px">
					            <div role="tabpanel" class="tab-pane fade in active" id="basic">
									<form class="well form-horizontal" action="/nso/insert_patient" method="post"  id="contact_form">
									<fieldset>
										<h3>Basic Information</h3>
										<!-- Success message 
										<div class="alert alert-success" role="alert" id="success_message">Successful <i class="glyphicon glyphicon-thumbs-up"></i></div>-->
										<!-- Text input-->
										{{ csrf_field()}}

										<div class="form-group">
										  <label class="col-md-4 control-label">Name</label>  
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										  <input  name="nama" placeholder="Name" class="form-control"  type="text" required>
										    </div>
										  </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" >Gender</label> 
										    <div class="col-md-4 inputGroupContainer">
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="jantina" value="Lelaki" required="required"/> Male
					                                </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="jantina" value="Perempuan" required="required" /> Female
					                                </label>
					                            </div>
					                        </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Date Of Birth</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
										 		<input name="dob" placeholder="Date of Birth" class="form-control"  type="date" required>
										    </div>
										  </div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">Ic.No</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
												  	<input type="text"  class="form-control" name="mycard" id="id_mycard" required pattern="[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[01])(0[1-9]|1[0-6])[0-9]{4}">
											  	</div>
											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Address</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										  		<input name="alamat" placeholder="Address" class="form-control" type="text" required="">
										    </div>
										  </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">City</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										 		 <input name="bandar" placeholder="City" class="form-control"  type="text" required>
										    </div>
										  </div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">State</label>
										    <div class="col-md-6 selectContainer">
												    <div class="input-group">
												    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
												    <select name="negeri" class="form-control selectpicker" required>
												      <option value=" " >Select State</option>
												      <option value="Perlis" >Perlis</option>
												      <option value="Kedah" >Kedah</option>
												      <option value="Perak" >Perak</option>
												      <option value="Pulau Pinang" >Pulau Pinang</option>
												      <option value="Selangor" >Selangor</option>
												      <option value="Melaka" >Melaka</option>
												      <option value="Negeri" >Negeri Sembilan</option>
												      <option value="Johor" >Johor</option>
												      <option value="Pahang" >Pahang</option>
												      <option value="Terengganu" >Terengganu</option>
												      <option value="Kelantan" >Kelantan</option>
												    </select>
												  </div>
											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Poscode</label>  
										    <div class="col-md-4 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
											  		<input name="poskod" placeholder="Poscode" class="form-control"  type="text" required>
											    </div>
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Race</label>
										    <div class="col-md-6">
										    	<div class="radio">
					                            	<label>
					                                	<input type="radio" name="bangsa" value="Melayu" required="required"/>Melayu
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="bangsa" value="Cina" required="required"/>Cina
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="bangsa" value="India" required="required"/>India
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="bangsa" value="Bumiputra Sabah" required="required"/>Bumiputra Sabah
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="bangsa" value="Bumiputra Sarawak" required="required"/>Bumiputra Sarawak
					                                </label>
					                            </div> 
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Religion</label>
										    <div class="col-md-6">
											    <div class="radio">
					                            	<label>
					                                	<input type="radio" name="agama" value="Islam" required="required"/>Islam
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="agama" value="Buddha" required="required"/>Buddha
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="agama" value="Hindu" required="required"/>Hindu
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="agama" value="Kristian" required="required"/>Kristian
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="agama" value="lain" required="required"/>Lain-lain 
					                                	<input class="form-control" type="text" name="input">
					                                </label>
					                            </div>
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Education Level</label>
										    <div class="col-md-6">
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="UPSR" required="required"/>UPSR
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="PMR/PT3" required="required"/>PMR/PT3
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="SPM" required="required"/>SPM
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="Matrik" required="required"/>Matrik
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="Asasi" required="required"/>Asasi
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="Diploma" required="required"/>Diploma
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="Sarjana Muda" required="required"/>Sarjana Muda
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="Sarjana" required="required"/>Sarjana
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="PhD" required="required"/>PhD
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="pendidikan" value="other" required="required"/>Other 
					                                	<input class="form-control" type="text" name="input2">
					                                </label>
					                            </div>
											</div>
										</div>
										<!-- radio checks -->
										 <div class="form-group">
					                        <label class="col-md-4 control-label">Current Information</label>
					                        <div class="col-md-4">
					                            <div class="radio">
					                                <label>
					                                    <input type="radio"  name="currentInfo" value="belajar" required="required"/>
					                                    <strong>Student</strong> University / College / School : <input class="form-control" type="text" name="input3">
					                                    </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio"  name="currentInfo" value="bekerja" required="required"/>
					                                    <strong>Employment</strong>(Occupation) : <input class="form-control" type="text" name="input4">
					                                </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="currentInfo" value="Tidak bekerja" required="required">
					                                    <strong>Unemployment</strong>
					                                </label>
					                            </div>
					                        </div>
					                    </div>
					                    <!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Status</label>
										    <div class="col-md-6">
											    <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Bujang" required="required"/>Single
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Berkahwin" required="required"/>Married
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Bercerai" required="required"/>Divorce
					                                </label>
					                            </div>
					                             <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Balu" required="required"/>Widow (Male)
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Janda" required="required"/>Widow (Female)
					                                </label>
					                            </div>
											</div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">Tel. No</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
												  	<input type="text"  class="form-control" name="telefon" required pattern="[0-9]{10}">
											  	</div>
											</div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">Email</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												  	<input type="email"  class="form-control" name="email" required>
											  	</div>
											</div>
										</div>	
										<div class="form-group">
										  <label class="col-md-4 control-label">Username</label>  
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
										  <input  name="patientId" placeholder="Username" class="form-control"  type="text" required>
										    </div>
										  </div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">Password</label>
												<div class="col-md-6 inputGroupContainer">
													<div class="input-group">
													    <span class="input-group-addon"><i class="glyphicon glyphicon-folder-close"></i></span>
														<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
													</div>
												</div>
										</div>
										
									<br><!-- Button -->
									<hr>
									
									<br>

										

				            <div role="tabpanel" class="tab-pane" id="health">
				               
										
								
								<h3>Medical History</h3>
								<br/>
								
								
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th colspan="5">Family Medicine History</th>
									</tr>
									<tr>
										<td>Hipertension</td>
										<td>Cardiovascular Diseaser</td>
										<td>Diabetes</td>
										<td>Asthma</td>
										
									</tr>
								  </thead>
								  <tbody>
								  	
									<tr id="spkInput" >
										<td>
											<select class="form-control" name="hipertensi">
												<option  value="Ya">Yes</option>
												<option  value="Tidak" selected>No</option>
											</select>
										</td>
										<td>
											<select class="form-control"  name="kardiovaskular">
												<option value="Ya">Yes</option>
												<option  value="Tidak" selected>No</option>
											</select>
										</td>
										<td>
											<select class="form-control" name="diabetes">
												<option  value="Ya">Yes</option>
												<option  value="Tidak" selected>No</option>
											</select>
										</td>
										<td>
											<select class="form-control" name="asma">
												<option  value="Ya">Yes</option>
												<option value="Tidak" selected>No</option>
											</select>
										</td>
										
									</tr>
								  </tbody>
								  
								  	
								  
								</table>

								<br>
								<hr>
								<br>

								<div class="form-group">
										  <label class="col-md-12 control-label"></label>
										  <div class="col-md-12">
										    <button type="submit" style="float: right;"class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
										  </div>
										</div>

								<br/>
								<br/>
								</div>
									</fieldset>
								
								</div>
								</form>
						</div>
					</div>
			</div>
			</div>
		</div><!-- /.container -->
		 </section>
      </section>
      </section>

      <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>

      <script >
      var tr1 = $('#table1 tbody tr').length;
  	$('#add1').on('click',function() {
  		var newRow = "<td><input class='form-control' name='jenisPenyakit' placeholder='Jenis Penyakit'></td><td><input class='form-control' name='tempohSakit' placeholder='Tempoh Penyakit'></td></tr>";
  		
  		$('#table1').append("<tr>"+newRow);
  		
  	});

  	var tr2 = $('#table2 tbody tr').length;
  	$('#add2').on('click',function() {
  		var tableRow2 = $('#table2 tbody tr').length;
  		tableRow2++;
  		var newRow = "<td><input class='form-control' name='jenisUbat' placeholder='Jenis Ubat'></td><td><input class='form-control' name='tempohPengambilan' placeholder='Tempoh Pengambilan'></td></tr>";
  		$('#table2').append("<tr>"+newRow);
  		
  	});

  	</script>
      @endsection