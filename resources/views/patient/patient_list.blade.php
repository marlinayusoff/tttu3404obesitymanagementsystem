@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
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
                          <li class="active"><a href="/patientList">Patient List</a></li>
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
			<!-- Form Name -->
			<h2>&nbsp;&nbsp;&nbsp;View Patient List</h2>
				<div>
					<!-- start tabs -->
					<div style="padding: 10px 10px 40px;">
					<h3>Patient Records</h3>

						<form class="form-horizontal" action="/searchPatient" method="get"  id="contact_form">
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label">Search by Name: </label>
									<div class="col-md-6 inputGroupContainer">
										<input class="form-control" name="searchby" placeholder="Insert Name Here">
									</div>
									<div class="col-md-2">
									   <button type="submit" class="btn btn-warning">   Search <span class="glyphicon glyphicon-search"></span>   </button>
									</div>
								</div>
							</fieldset>
						</form>

						<hr><br/>
						  <h4><i class="fa fa-angle-right"></i> Patient List</h4>
                          <section id="no-more-tables">
                          	<table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
							<tr>
								<td>#</td>
								<td>Nama Pesakit</td>
								<td>No.IC</td>
								<td>Tarikh Lahir</td>
                <td>Agama</td>
                <td>Info Terkini</td>
                <td>Bangsa</td>
                <td>Alamat</td>
                <td>Status</td>
                <td>No.Telefon</td>
                <td>Pendidikan</td>
                <td>Email</td>
                <td>Jantina</td>
                <td></td>
							</tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data as $key => $d)
                                    <tr>
                                      <th scope="row">{{$d->patientId}}</th>
                                      <td>{{$d->name}}</td>
                                      <td>{{$d->icNo}}</td>
                                      <td>{{$d->dateOfBirth}}</td>
                                      <td>{{$d->gender}}</td>
                                      <td>{{$d->religion}}</td>
                                      <td>{{$d->currentInfo}}</td>
                                      <td>{{$d->race}}</td>
                                      <td>{{$d->address}}</td>
                                      <td>{{$d->status}}</td>
                                      <td>{{$d->telNo}}</td>
                                      <td>{{$d->education}}</td>
                                      <td>{{$d->email}}</td>
                                      <td>
                                              <div class="pull-right hidden-phone" style="margin-left: -7px;">
                                                <form method="post" action="/info" style="float: left;margin-right: 5px;">
    <input type="hidden" name="patientId" value="{{ $d->patientId }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-primary btn-xs" role="button" style="width: 25px;"><i class="fa fa-exclamation "></i></button>
</form>
<form method="post" action="/edit" style="float: left;margin-right: 5px;">
    <input type="hidden" name="patientId" value="{{ $d->patientId }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-warning btn-xs" role="button" style="width: 25px;"><i class="fa fa-pencil"></i></button>
</form>
<form method="post" action="/delete" style="float: left;margin-right: 5px;">
    <input type="hidden" name="patientId" value="{{ $d->patientId }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?');" style="width: 25px;"><i class="fa fa-trash-o "></i></button>
</form>
                                              </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->

						<!--pagination-->
            <center>{{$data->links()}}</center>
						<!--<div class="text-center">
						    <ul class="pagination">
								<li class="disabled"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
							 	<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							</ul>
						</div>-->

					  </div>
					</div>
				</div>
			</div>
			<!-- /.container --></div><!-- /.container -->
		 </section>
      </section>
      </section>

       @endsection