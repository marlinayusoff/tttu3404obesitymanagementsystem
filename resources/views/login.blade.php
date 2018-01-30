@extends('main')
@section('content')
<style>
.go-top {
    display: none;
}
</style>

<div id="login-page">
        <div class="container">

              <form class="form-login" action="/" method="post">
                {{ csrf_field() }}
                <h2 class="form-login-heading">Log Masuk</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" name="userName" placeholder="User ID" autofocus>
                    <br>
                    <input type="password" class="form-control" name="userPassword" placeholder="Password">
                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> Lupa Kata Laluan?</a>

                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> LOG MASUK</button>
                    <hr>
                </div>

                  <!-- Modal -->
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Lupa Kata Laluan? </h4>
                              </div>
                              <div class="modal-body">
                                  <p>Isi emel anda dibawah bagi menetapkan semula kata laluan.</p>
                                  <input type="text" name="email" placeholder="Emel" autocomplete="off" class="form-control placeholder-no-fix">

                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                  <button class="btn btn-theme" type="button">Hantar</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- modal -->

              </form>       

        </div>
      </div>

      <script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ URL::asset('theme/js/jquery.backstretch.min.js') }}"></script>
    <script>
        $.backstretch("{{ URL::asset('theme//img/login-bg.jpg') }}", {speed: 500});
    </script>

    @endsection
