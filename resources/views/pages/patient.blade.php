<html>
	<head>
		<title>View Patient Daily Diet</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.set-appointment {
				    position: fixed;
				    right: 0;
				    margin: 35px;
				    bottom: 0;
			}
			hr {
				border-top: 2px solid #95b8dc;
			}
			table {
				background-color: #fff;
			}

			.thead-inverse th {
				text-align: center;
			    color: #fff;
			    background-color: #292b2c;
			}
			.thead-inverse td {
			    color: #1f1d1d;
			    background-color: #798286;
			}

			.icon-success {
			    color: #5CB85C;
			}

			.icon-remove {
			    color: #b85c5c;
			}
		</style>
	</head>

	<body>
	<div class="container">
		<div class="row">
		<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="#">Home</a></li>-->
              
              <li><a href="register_form.html">Register Patient</a></li>
              <li><a href="view_patient_list.html">Patient List</a></li>
              <li><a href="view_patient_information.html">Patient Information</a></li>
              <li><a href="view_user_information.html">User Information</a></li>
              <li><a href="view_inbody.html">Inbody</a></li>
              <li><a href="schedule_appointment.html">Schedule Appointment</a></li>
              <li><a href="Addfeedback.html">Add Feedback</a></li>
              <li><a href="Viewfeedback.html">View Feedback</a></li>
              <li><a href="viewPatientDailyDiet.html">View Daily Diet</a></li>
              <li><a href="updatePatientDailyDiet.html">Update Daily Diet</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
			<div class="col-md-10 col-md-offset-1">
			<!-- Form Name -->
			<h2>View Patient Daily Diet</h2>
				<div class="row" style="border:1px;">
				<div class="row" style="border:1px;">
					<div class="panel panel-default" style="padding: 10px 10px 40px;">
					
					
						<form class="well form-horizontal" action=" " method="post"  id="contact_form">
							<fieldset>
							<div class="col-md-12">
								<div class="panel-body">
						            <div class="table-responsive">
						            <table class="table" align="center">
						              <thead>
						              	
						              </thead>
						              <tr>
						              	<td bgcolor="#dff0d8""><font size="4" >Tarikh</td>
						              	<td bgcolor="#dff0d8""></td>
						              </tr>
						              
						              <tbody>
						                <tr class="success">
						                  <td>30/05/2016</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>05/05/2016</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>15/02/2017</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>14/03/2017</td>
						                  <td align="right">view</td>
						                </tr>
						                <tr class="success">
						                  <td>15/09/2017</td>
						                  <td align="right">view</td>
						                </tr>
						              </tbody>
						            </table>
						            </div>
						            <!--pagination-->
						            <div class="text-center">
						            <ul class="pagination">
									  <li class="disabled"><a href="#">1</a></li>
									  <li><a href="#">2</a></li>
									  <li><a href="#">3</a></li>
									  <li><a href="#">4</a></li>
									  <li><a href="#">5</a></li>
									</ul>
									</div>
							</fieldset>
						</form>

						<div class="panel panel-default" style="padding: 10px 10px 40px;">
						<table class="table">
						<tbody>
						<tr>
							<td><font size="5">Patient Daily Diet</font></td>
							<td align="right" ><font size="5">14/02/2017</font></td>
						</tr>
							
						</tbody>
						</table>
					
					<form action="" method="post">
						
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">
									<tr>
										<th >Kategori</th>
										<th>Butiran</th>
										<th >Kalori</th>
									</tr>
									<tr>
										<td><font color="white" size="4">Makanan</td>
										<td style="background-color: #fff;">Nasi Lemak</td>
										<td style="background-color: #fff;">xxx Kcal</td>
										</tr>
										<tr>
										<td><font color="white" size="4">Minuman</td>
										<td style="background-color: #fff;">Air Mineral</td>
										<td style="background-color: #fff;">xxx Kcal</td>
										</tr>
										<tr>
										<td ><font color="white" size="4">Aktiviti</td>
										<td style="background-color: #fff;">Joging</td>
										<td style="background-color: #fff;">xxx Kcal</td>
										</tr>
										<tr>
											<td colspan="2" align="text-center" style="background-color: #292b2c"><font color="white" size="4">Jumlah</font></td>
											<td style="background-color: #fff;"><font color="green" size="3" style="bold">xxx Kcal</td>
										</tr>
										</thead>
								  
						</form>