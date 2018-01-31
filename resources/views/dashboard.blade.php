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
    <link href="{{ URL::asset('theme/css/zabuto_calendar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/js/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/lineicons/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('theme/css/style-responsive.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ URL::asset('theme/js/chart-master/Chart.js') }}"></script>
  </head>

  <body>

    @yield('content')

    <div style="height:75px;"></div>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - SISTEM PENGURUSAN OBESITI
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery.sparkline.js') }}"></script>
    <script src="{{ URL::asset('theme/js/common-scripts.js') }}"></script>
    <script src="{{ URL::asset('theme/js/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ URL::asset('theme/js/gritter-conf.js') }}"></script>
    <script src="{{ URL::asset('theme/js/sparkline-chart.js') }}"></script>
    <script src="{{ URL::asset('theme/js/zabuto_calendar.js') }}"></script>
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>