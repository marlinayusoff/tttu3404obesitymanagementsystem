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
                          <li class="active"><a href="/admin/nso_list">NSO List</a></li>
                          <li><a href="/admin/register_nso">Add New NSO</a></li>
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
<div class="row mt">
              <div class="col-lg-12">
              	<div class="content-panel">
			<!-- Form Name -->
			<h2>&nbsp;&nbsp;&nbsp;View Nutritional Science Officer List</h2>
				<div>
					<!-- start tabs -->
					<div style="padding: 10px 10px 40px;">
					<h3>NSO Records</h3>

						<form class="form-horizontal" action="/admin/search_nso" method="get"  id="contact_form">
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
            						<h4><i class="fa fa-angle-right"></i>NSO List</h4>
                                    <section id="no-more-tables">
                                      	<table class="table table-bordered table-striped table-condensed cf">
                                            <thead class="cf">
                  							<tr>
                  								<td>#</td>
                  								<td>NSO Name</td>
                  								<td>Gender</td>
                  								<td>No.IC</td>
                                                <td>No.Tel</td>
                                                <td>Address</td>
                                                <td>Email</td>
                                                <td></td>
                  							</tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($data as $key => $d)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{$d->name}}</td>
                                                  <td>{{$d->gender}}</td>
                                                  <td>{{$d->icNo}}</td>
                                                  <td>{{$d->telNo}}</td>
                                                  <td>{{$d->address}}</td>
                                                  <td>{{$d->email}}</td>
                                                  <td>
                                                    <form method="post" action="{{ '/admin/'.$d->nsoId}}">
                                        							{{ csrf_field() }}
                                        							{{ method_field('DELETE') }}
                                                      <button style="margin-bottom: 2px; display: block; width: 100px;" type="submit" class="btn btn-danger btn-xs"> Delete <i class="fa fa-trash-o "></i></button>
                                                    </form>
                                                    <form method="get" action="{{url('/admin/'.$d->nsoId.'/edit')}}">
                                                      <button style="margin-bottom: 2px; display: block; width: 100px;" type="submit" class="btn btn-primary btn-xs"> Edit <i class="fa fa-exclamation"></i> </button>
                                                    </form>
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
					  </div>
					</div>
				</div>
			</div>
			<!-- /.container --></div><!-- /.container -->
		 </section>
      </section>
      </section>

      <div style="height: 60px;"></div>

       @endsection
