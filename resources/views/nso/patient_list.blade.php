@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
      }
    </style>

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
        								<td>Patient Name</td>
        								<td>No.IC</td>
        								<td>D.O.B</td>
                                        <td>Religion</td>
                                        <td>Latest Info</td>
                                        <td>Race</td>
                                        <td>Address</td>
                                        <td>Status</td>
                                        <td>No.Tel</td>
                                        <td>Education</td>
                                        <td>Email</td>
                                        <td>Gender</td>
                                        <td></td>
                        			</tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($data as $key => $d)
                                    <tr>
                                      <th scope="row">{{$i++}}</th>
                                      <td>{{$d->name}}</td>
                                      <td>{{$d->icNo}}</td>
                                      <td>{{$d->dateOfBirth}}</td>
                                      <td>{{$d->race}}</td>
                                      <td>{{$d->currentInfo}}</td>
                                      <td>{{$d->race}}</td>
                                      <td>{{$d->address}}</td>
                                      <td>{{$d->status}}</td>
                                      <td>{{$d->telNo}}</td>
                                      <td>{{$d->education}}</td>
                                      <td>{{$d->email}}</td>
                                      <td>{{$d->gender}}</td>
                                      <td style="width: 66px;vertical-align: middle;">
                                        <div class="pull-right hidden-phone">
                                            <form method="post" action="/info" style="float: left;">
                                                <input type="hidden" name="patientId" value="{{ $d->patientId }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-primary btn-xs" role="button" style="width: 25px;"><i class="fa fa-exclamation "></i></button>
                                            </form>

                                            <form method="post" action="/delete" style="float: left;margin-left: 5px;">
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
                <center>{{$data->links()}}</center>
			  </div>
			</div>
		</div>
	</div>
	<!-- /.container --></div><!-- /.container -->
 </section>
</section>
</section>

@endsection