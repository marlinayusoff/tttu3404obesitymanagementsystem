@extends('main')
@section('content')

<style type="text/css">
      .site-footer {
        position: unset;
      }
    </style>
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
                  <h5 class="centered">(ADMIN)</h5>
                    
                  <li class="mt">
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Nutritional Science Officer</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin/nso_list">NSO List</a></li>
                          <li class="active"><a href="/admin/register_nso">Add New NSO</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Daily Diet Library</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin/food">Foods</a></li>
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
                    <h2>NSO Registration</h2>
        				<div class="row" style="border:1px;">
        					<!-- start tabs -->
        					<div class="panel panel-default" style="padding: 10px;">
        					    <div id="Tabs" class=".testTabs" role="tabpanel">
        					        <!-- Tab panes -->
        					        <div class="tab-content" style="padding-top: 20px">
        					            <div role="tabpanel" class="tab-pane fade in active" id="basic">
        									<form class="well form-horizontal" action="/admin" method="post"  id="contact_form">
        									<fieldset>
        									<h3>User Information</h3>
										  {{ csrf_field()}}
										<!-- Nama-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Name</label>
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										  <input name="name" placeholder="Name" class="form-control" type="text">
										    </div>
										  </div>
										</div>
										<!-- Jantina-->
										<div class="form-group">
										  <label class="col-md-4 control-label" >Gender</label>
										    <div class="col-md-4 inputGroupContainer" name="gender">
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="gender" value="Lelaki"> Male
					                                </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="gender" value="Perempuan"> Female
					                                </label>
					                            </div>
					                        </div>
										</div>

										<!-- IC No-->
										<div class="form-group">
										  <label class="col-md-4 control-label">No.Ic</label>
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
												  	<input type="text"  class="form-control" name="noIc" id="id_mycard" value="@yield('editKP')" required pattern="[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[01])(0[1-9]|1[0-6])[0-9]{4}">
											  	</div>
											</div>
										</div>
										<!-- Alamat-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Address</label>
										    <div class="col-md-6 inputGroupContainer">
										    <div class="input-group">
										        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										  		<input name="address" placeholder="Address" class="form-control" type="text">
										    </div>
										  </div>
										</div>




										<!-- Tel no.-->
										<div class="form-group">
										  <label class="col-md-4 control-label">No. Tel</label>
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
												  	<input type="text"  class="form-control" name="noTel" placeholder="No.Tel">
											  	</div>
											</div>
										</div>
										<!-- Email-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Email</label>
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												  	<input type="email"  class="form-control" name="email" placeholder="Email">
											  	</div>
											</div>
										</div>
										<!-- Id-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Username</label>
										    <div class="col-md-6 inputGroupContainer">
											    <div class="input-group">
											    	<span class="input-group-addon"><i class="glyphicon glyphicon-text-width"></i></span>
												  	<input type="text"  class="form-control" name="username" placeholder="Username" >
											  	</div>
											</div>
										</div>
										<!-- kata laluan-->
										<div class="form-group">
											<label class="col-md-4 control-label">Password</label>
												<div class="col-md-6 inputGroupContainer">
													<div class="input-group">
													    <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
														<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
													</div>
												</div>
										</div>
										<!-- Button -->
										<div class="form-group">
										  <label class="col-md-4 control-label"></label>
										  <div class="col-md-4">
										    <button type="submit" class="btn btn-warning" >Add <span class="glyphicon glyphicon-plus"></span></button>
										  </div>
										</div>
									</fieldset>
								</form>
								</div>

				            </div>
				            <!--tutup panel -->
				        </div>
				    </div>
				</div>
				<!-- tutup tabs -->
			</div>
			</div>
		</div><!-- /.container -->
		 </section>
      </section>
      </section>

      @endsection
