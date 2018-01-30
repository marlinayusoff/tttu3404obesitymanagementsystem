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
			<h2>Pendaftaran Pesakit</h2>
				<div class="row" style="border:1px;">
					<!-- start tabs -->
					
					        <!-- Tab panes -->
					        <div class="tab-content" style="padding-top: 20px">
					            <div role="tabpanel" class="tab-pane fade in active" id="basic">
									<form class="well form-horizontal" action="/nso/insert_patient" method="post"  id="contact_form">
									<fieldset>
										<h3>Maklumat Asas</h3>
										<!-- Success message 
										<div class="alert alert-success" role="alert" id="success_message">Successful <i class="glyphicon glyphicon-thumbs-up"></i></div>-->
										<!-- Text input-->
										{{ csrf_field()}}

										<div class="form-group">
										  <label class="col-md-4 control-label">Nama</label>  
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										  <input  name="nama" placeholder="Nama" class="form-control"  type="text" required>
										    </div>
										  </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" >Jantina</label> 
										    <div class="col-md-4 inputGroupContainer">
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="jantina" value="Lelaki" required="required"/> Lelaki
					                                </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="jantina" value="Perempuan" required="required" /> Perempuan
					                                </label>
					                            </div>
					                        </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Tarikh Lahir</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-birthday-cake"></i></span>
										 		<input name="dob" placeholder="tarikh Lahir" class="form-control"  type="date" required>
										    </div>
										  </div>
										</div>
										<!-- Text input--> 
										<div class="form-group">
										  <label class="col-md-4 control-label">No .KP</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-id-card"></i></span>
												  	<input type="text"  class="form-control" name="mycard" id="id_mycard" required pattern="[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[01])(0[1-9]|1[0-6])[0-9]{4}">
											  	</div>
											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Alamat</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										  		<input name="alamat" placeholder="Alamat" class="form-control" type="text" required="">
										    </div>
										  </div>
										</div>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Bandar</label>  
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										 		 <input name="bandar" placeholder="Bandar" class="form-control"  type="text" required>
										    </div>
										  </div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Negeri</label>
										    <div class="col-md-6 selectContainer">
												    <div class="input-group">
												    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
												    <select name="negeri" class="form-control selectpicker" required>
												      <option value=" " >Negeri</option>
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
										  <label class="col-md-4 control-label">Poskod</label>  
										    <div class="col-md-4 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
											  		<input name="poskod" placeholder="Poskod" class="form-control"  type="text" required>
											    </div>
											</div>
										</div>
										<!-- Select Basic -->
										<div class="form-group"> 
										  <label class="col-md-4 control-label">Bangsa</label>
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
										  <label class="col-md-4 control-label">Agama</label>
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
										  <label class="col-md-4 control-label">Peringkat Pendidikan</label>
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
					                                	<input type="radio" name="pendidikan" value="other" required="required"/>Lain-lain 
					                                	<input class="form-control" type="text" name="input2">
					                                </label>
					                            </div>
											</div>
										</div>
										<!-- radio checks -->
										 <div class="form-group">
					                        <label class="col-md-4 control-label">Maklumat Semasa</label>
					                        <div class="col-md-4">
					                            <div class="radio">
					                                <label>
					                                    <input type="radio"  name="currentInfo" value="belajar" required="required"/>
					                                    <strong>Pelajar</strong> Universiti / Kolej / Sekolah : <input class="form-control" type="text" name="input3">
					                                    </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio"  name="currentInfo" value="bekerja" required="required"/>
					                                    <strong>Pekerja</strong>(Nama Pekerjaan) : <input class="form-control" type="text" name="input4">
					                                </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="currentInfo" value="Tidak bekerja" required="required">
					                                    <strong>Tidak bekerja</strong>
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
					                                	<input type="radio" name="status" value="Bujang" required="required"/>Bujang
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Berkahwin" required="required"/>Berkahwin
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Bercerai" required="required"/>Bercerai
					                                </label>
					                            </div>
					                             <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Balu" required="required"/>Balu
					                                </label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input type="radio" name="status" value="Janda" required="required"/>Janda
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
										  <label class="col-md-4 control-label">Emel</label>  
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												  	<input type="email"  class="form-control" name="email" required>
											  	</div>
											</div>
										</div>	
										<div class="form-group">
										  <label class="col-md-4 control-label">Nama Pengguna</label>  
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  
										  <input name="patientId" value="{{ $patientId }}" class="form-control" type="text" required>
										    </div>
										  </div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">Kata laluan</label>
												<div class="col-md-6 inputGroupContainer">
													<div class="input-group">
														<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Kata Laluan" required>
													</div>
												</div>
										</div>
										
									<br><!-- Button -->
									<hr>
									
									<br>

										

				            <div role="tabpanel" class="tab-pane" id="health">
				               
										
								
								<h3>Sejarah Perubatan</h3>
								<br/>
								
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th colspan="5">Sejarah Perubatan Keluarga</th>
									</tr>
									<tr>
										<td>Hipertensi</td>
										<td>Penyakit Kardiovaskular</td>
										<td>Diabetes</td>
										<td>Asma</td>
										
									</tr>
								  </thead>
								  <tbody>
								  	
									<tr id="spkInput">
										<td>
											<select class="form-control" name="hipertensi">
												<option value="Ya">Ya</option>
												<option value="Tidak" selected>Tidak</option>
											</select>
										</td>
										<td>
											<select class="form-control"  name="kardiovaskular">
												<option value="Ya">Ya</option>
												<option value="Tidak" selected>Tidak</option>
											</select>
										</td>
										<td>
											<select class="form-control" name="diabetes">
												<option value="Ya">Ya</option>
												<option value="Tidak" selected>Tidak</option>
											</select>
										</td>
										<td>
											<select class="form-control" name="asma">
												<option value="Ya">Ya</option>
												<option value="Tidak" selected>Tidak</option>
											</select>
										</td>
										
									</tr>
								  </tbody>
								  
								  	
								  
								</table>

								<br>
								
								<div class="form-group">
										  <label class="col-md-12 control-label"></label>
										  <div class="col-md-12">
										    <button type="submit" class="btn btn-warning" >Simpan <span class="glyphicon glyphicon-send"></span></button>
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
  		var newRow = "<td class='input-group'><span class='input-group-addon'></span><select name='jenispenyakit[]' class='form-control selectpicker' id='HealthProblems'><option value=''>Select Health Isue</option><option value='Heart Attack' >Heart Attack</option><option value='Diabetes'>Diabetes</option><option value='Fatty Liver'>Fatty Liver</option><option value='Osteoarthritis' >Osteoarthritis</option><option value='Kidney'>Kidney</option><option value='High Blood Pressure'>High Blood Pressure</option><option value='Others'>Others</option></select><input class='form-control' name='healthIssueOthers' id='HealthIssueOthers' style='display:none'/></td><td><input class='form-control' name='duration[]' required></td>";
  		
  		$('#table1').append("<tr>"+newRow);
  		
  	});

  	var tr2 = $('#table2 tbody tr').length;
  	$('#add2').on('click',function() {
  		var tableRow2 = $('#table2 tbody tr').length;
  		tableRow2++;
  		var newRow = "<td id='"+tableRow2+"'><input class='form-control' name='jenisubat[]' placeholder='Jenis Ubat'></td></tr>";
  		$('#table2').append("<tr>"+newRow);
  		
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

		if(weight != null && wrist != null && waist != null && hip != null && forearm != null) {
			weight = (weight / 0.45359237).toFixed(2);
			var f1,f2,f3,f4,f5,total,LBM,BFM;
			LBM = "";
			BFM = "";
			total = "";
			
			if('name="gender"' == "Perempuan") {
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

			} else if('name="gender"' == "Lelaki") {
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