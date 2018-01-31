<html>
	<head>
		<title> Pendaftaran Staf </title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">
		<div class="row">
		
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          
      </nav>
			<div class="col-md-10 col-md-offset-1">
			<!-- Form Name -->
			<h2>Pendaftaran Staf</h2>
				<div class="row" style="border:1px;">
					<!-- start tabs -->
					<div class="panel panel-default" style="padding: 10px;">
					    <div id="Tabs" class=".testTabs" role="tabpanel">
					        <!-- Nav tabs -->
					        
					        <!-- Tab panes -->
					        <div class="tab-content" style="padding-top: 20px">
					            <div role="tabpanel" class="tab-pane fade in active" id="basic">
									<form class="well form-horizontal" action="/new" method="post"  id="contact_form">
									<fieldset>
										<h3>Maklumat Diri</h3>
										<!-- Success message 
										<div class="alert alert-success" role="alert" id="success_message">Successful <i class="glyphicon glyphicon-thumbs-up"></i></div>-->
										{{ csrf_field()}}
										<!-- Nama-->
										<div class="form-group">
										  <label class="col-md-4 control-label">Nama</label>  
										  <div class="col-md-6 inputGroupContainer">
										  <div class="input-group">
										  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										  <input  name="name" placeholder="Nama" class="form-control"  type="text">
										    </div>
										  </div>
										</div>
										<div class="form-group">
										  <label class="col-md-4 control-label" >Jantina</label> 
										    <div class="col-md-4 inputGroupContainer">
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="jantina" value="Lelaki"> Lelaki
					                                </label>
					                            </div>
					                            <div class="radio">
					                                <label>
					                                    <input type="radio" name="jantina" value="Perempuan"> Perempuan
					                                </label>
					                            </div>
					                        </div>
										</div>
										<!-- Jantina-->
										
										<div class="form-group">
										  <label class="col-md-4 control-label"></label>
										  <div class="col-md-4">
										    <button type="submit" class="btn btn-warning" >Submit<span class="glyphicon glyphicon-submit"></span></button>
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
	</body>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>