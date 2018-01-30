@extends('main')
@section('content')
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
                  <h5 class="centered">(ADMIN)</h5>
                    
                  <li class="mt">
                      <a class="active" href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Nutritional Science Officer</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin/nso_list">NSO List</a></li>
                          <li><a href="/admin/register_nso">Add New NSO</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Daily Diet Library</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin/food">Makanan</a></li>
                          <li><a href="/admin/drink">Minuman</a></li>
                          <li><a href="/admin/activity">Aktiviti</a></li>
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



            <div class="col-lg-6 col-md-6 col-sm-6 mb">
              <div class="product-panel-2 pn" style="height: 355px;"><br/>
                <span class="li_user" style="font-size: 100px;"><img src="{{ URL::asset('theme/img/Doctor-Icon-1.png') }}" width=' 190px;'></span>
                <h5 class="mt">Nutritional Science Officer</h5>
                <a href="/admin/nso_list" class="btn btn-small btn-theme04">View NSO List</a>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb">
              <div class="product-panel-2 pn" style="height: 355px;"><br/>
                <span class="li_stack" style="font-size: 100px;"><img src="{{ URL::asset('theme/img/icon_obesity_nobg.png') }}" width=' 190px;'></span>
                <h5 class="mt">Daily Diet Library</h5>
                <a class="btn btn-small btn-theme04" href="/admin/food">Makanan</a>
                          <a class="btn btn-small btn-theme04" href="/admin/drink">Minuman</a>
                          <a class="btn btn-small btn-theme04" href="/admin/activity">Aktiviti</a>
              </div>
            </div>


                  	</div><!-- /row mt -->
          </section>
      </section>
      </section>

      @endsection
