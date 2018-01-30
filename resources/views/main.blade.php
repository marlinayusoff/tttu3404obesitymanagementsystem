<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SISTEM PENGURUSAN OBESITI</title>

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

  <body>
      <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      @if (Session::has('user'))
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>Obesity System Management</b></a>
            <!--logo end-->

            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/logout">Log Keluar</a></li>
              </ul>
            </div>
        </header>
        @endif
      <!--header end-->
    @yield('content')

      <!--main content end-->
      <!--footer start-->
      @if (Session::has('user'))
      <footer class="site-footer">
          <div class="text-center">
              2017 - SISTEM PENGURUSAN OBESITI
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      @endif
      <!--footer end-->
  </section>

@if (Session::get('category') == 'staff')
@if (Request::path() !== 'Appointment')  
    <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('theme/js/common-scripts.js') }}"></script>
    <script src="{{ URL::asset('theme/js/zabuto_calendar.js') }}"></script>

    @endif
    @endif
    @if (Session::get('category') == 'admin')
    <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('theme/js/common-scripts.js') }}"></script>
    @endif
    @if (Session::get('category') == 'patient')
    <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('theme/js/common-scripts.js') }}"></script>
    @endif


    <script type="text/javascript">
      $('.go-top').on('click', function() {
        $('html, body').animate({ scrollTop: 0}, 'slow');
      });
    </script>

  </body>
</html>