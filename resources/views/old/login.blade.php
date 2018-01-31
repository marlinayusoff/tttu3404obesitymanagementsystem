@extends('main')
@section('content')

<div class="container-fluid">

<div class="row">
    <div class="col-xs-12s col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

    
   
        <div class="page-header">
                <h1>Login</h1>
        </div>
                <form action="/login" method="post" class="form-signin">
                    {{ csrf_field() }}
                    
                <!--<form action="customer_crud.php" method="post" class="form-horizontal">-->
                <div class="form-group">
                    <label for="inputemail" class="sr-only">Nama</label>
                    <input type="text" id="inputemail" name="userName" class="form-control" placeholder="User ID" equired autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Kata Laluan</label>
                    <input type="password" id="inputPassword" name="userPassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log Masuk</button>
                </div>
                </form>
      

    </div> <!-- /container -->
    <!-- /.container -->

</div>
</div>

    @endsection