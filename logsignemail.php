<?php


include('config/functions.php');
if(check_login_status() != false){
    header('Location: ' . check_login_status()['panel']);
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<!-- test -->
	<title>Join us</title>
	
        <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<style type="text/css">
	
h4{

color:red;
margin-top: 10%;
margin-bottom: 5%;
font-size: 12px;

}

</style>

    </head>
    <body>



	<nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv" style="background-color:rgb(51, 51, 51); opacity:0.8;">
            <div class="container">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		    <i class="fa fa-bars" aria-hidden="true"></i>
		</button>
		<a class="navbar-brand mx-auto" href="#">Legacy<span>Library</span></a>
		<div class="collapse navbar-collapse" id="navbarCollapse1">
		    <ul class="navbar-nav ml-auto">
			<li> <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
			<li class="nav-item active"><a class="nav-link" href="logsign.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
			<li class="nav-item active"><a class="nav-link" href="profile.php"> <i class="fa fa-user-o" aria-hidden="true"></i> Login</a></li>
		    </ul>

		</div>
            </div>
        </nav>


	<!-- Benefits
             ================================================== -->
	<section class="sign-sec" id="benefits">
	    <div class="container">
		<div class="row">
		    <div class="col-md-12">

			

			<div class="container">  

			<div class="alert alert-danger">
  <strong>Error</strong> Email is already used, please log in or try another email
</div>
						
						   
			    <div id="loginbox" style="margin-top:10%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
				    <div class="heading">
					<div class="panel-title"><h2>Sign In</h2></div>
				    </div>     

				    <div style="padding-top:10%" class="panel-body" >

					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
					<script>
					 function login(){
					     var loginData = $('#loginform').serialize();
					     console.log(loginData);
					     $.ajax({
						 method: 'POST',
						 url: 'login.php',
						 data: loginData,
						 success: function(resp){
						     var info = JSON.parse(resp);
						     if(info['logged_in'] == false){

							 alert(info['msg']);

						     }else{

							 window.location.href = info['panel'];

						     }

						 }
					     });
					 }
					</script>
					<form id="loginform" class="form-horizontal" role="form" action="login.php" method="post" onsubmit='return false'>
					    
					    <div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email" required="">                                        
					    </div>
					    
					    <div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input id="login-password" type="password" class="form-control" name="password" placeholder="password" required="">
					    </div>
					    

					    
					    <div class="input-group">
						<div class="checkbox">
						    <label>
							<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
						    </label>
						</div>
					    </div>


					    <div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-sm-12 controls">
						    <div class="col-md-12">
							<br>
							<button onclick="login()" class="btn btn-transparent-orange btn-capsul">Sign In</button>
						    </div>
						    

						</div>
					    </div>


					    <div class="form-group">
						<div class="col-md-12 control">
						    <div style="" font-size:85%" >Don't have an account! <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
							Sign Up Here
						    </a>
						    </div>
						</div>
					    </div>    
					</form>     



				    </div>                     
				</div>  
			    </div>


			    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
				    <div class="heading">
					<div class="panel-title"><h2>Sign Up</h2></div>
					<div style="float:right; font-size: 85%; position: relative; top:-10px">

					    

					</div>
				    </div>  
				    <div class="panel-body" >



					<form id="signupform" class="form-horizontal" role="form" method="POST" action="signup.php">
					    
					    <div id="signupalert" style="display:none" class="alert alert-danger">
						<p>Error:</p>
						<span></span>
					    </div>
					    
					 
<label colspan="2" align="center" class="error"></label>

					    
					    <div class="form-group">

						<label for="email" class="col-md-3 control-label" required="">Email</label>
						<div class="col-md-9">
						    <input type="text" class="form-control" name="email" placeholder="Email Address" required="">

						</div>

					    </div>
					    
					    <div class="form-group">
						<label for="name" class="col-md-3 control-label">Name</label>
						<div class="col-md-9">
						    <input type="text" class="form-control" name="name" placeholder="First Name" required="">
						</div>
					    </div>
					    
					    <div class="form-group">
						<label for="password" class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
						    <input type="password" class="form-control" name="password" placeholder="Password" required="" minlength="8">
						</div>

                        <div class="form-group">
						<label for="confirm_password" class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
						    <input type="password" class="form-control" name="confirm_password" placeholder="re-write password" required="">
						</div>

					    </div>
					    
					    

					    <div class="form-group">
						<!-- Button -->                                        
						<div class="col-md-offset-3 col-md-9">
                                                    <div class="col-md-12">

							<button type="submit" class="btn btn-transparent-orange btn-capsul">Sign up</button>
							    <a style="margin-left: 3%;" class="btn btn-transparent-orange btn-capsul" id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></p>

						    </div>
						    
						</div>
					    </div>
					    
					    <div style="padding-top:20px"  class="form-group">
						
                                                
						
					    </div>
					    
					    
					    
					</form>
				    </div>
				</div>

				
				
				
			    </div> 
			</div>
			

		    </div>
		    
		    <div class="row">
			
		    </div>

		    

		    <!-- <div class="col-md-4"> <img src="http://grafreez.com/wp-content/temp_demos/burnout/img/side-01.jpg" class="img-fluid" /> </div> -->
		</div>




		<!-- /.row -->
	    </div>
	    <div class="container">
		<div class="row">

		</div>
	    </div>
	</section>





    </body>

<script type="text/javascript">
	

$(document).ready(function() {
  $("#confirm_password").keyup(validate);
});


function validate() {
  var password1 = $("#password").val();
  var password2 = $("#confirm_password").val();

    
 
    if(password1 == password2) {
       $("#validate-status").text("Passwords matches");        
    }
    else {
        $("#validate-status").text("Passwords dosen't match");  
    }
    
}


</script>

</html>
