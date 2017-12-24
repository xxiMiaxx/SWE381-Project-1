<?php
include('config/functions.php');
if(check_login_status() != false){
    $user = get_memeber_by_id(my_id());
    if($user != false){
	$user = $user[0];
    }else{
	die('Some thing went wrong :(');
    }
}else{
    header('Location: logsign.php');
}

?>
<!DOCTYPE html>
<html>
<head>

<!-- test -->
<title>Profile page</title>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                         <script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Styles.css">
 <style>

#colors {
  color:rgb(255, 153, 0);
}



</style>
</head>

<body>

<!-- Top container -->
<nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
            <div class="container special">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <li class="fa fa-bars" aria-hidden="true"></li>
          </button>
          <a class="navbar-brand mx-auto" href="#" style="color:black;">Legacy<span>Library</span></a>
          <div class="collapse navbar-collapse" id="navbarCollapse1">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item" id="special"> 

<form action="booksearch.php" method="post">
               <input type="text" row="50" placeholder="Search.." name="search">
                <button value =">>" type="submit"><i class="fa fa-search"></i></button>
</form>

     

               </li>


<li class="nav-item"> <a class="nav-link" href="<?php if(is_admin()) { echo 'adminDashboard2.php';} else { echo 'userControlPanel.php'; }?>">Dashboard</a> </li>
            <li class="nav-item"> <a class="nav-link" href="books.php">Books</a> </li>
            <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>

           <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>
            </ul>

          </div>
                </div>
        </nav>

<div class="container">
  <div class="row">
    <div class="col-md-12 ">

<div id="colors" class="panel panel-default yes">
  <div class="panel-heading u">  <span id="colors" class="hf">My Profile</span>		   <span>
      <a href="edit-profile.php" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-pencil"></span> Edit
      </a>
      </span></div>
	  
	  
	


   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
			<div class="clearfix"></div>
                     <div class="col-sm-3">
                     <div  align="center" class="marginPhoto"> <img alt="User Pic" src="images/profiles/<?php echo $user['image'] ?>" id="profile-image1" class="img-circle img-responsive" > 
                
                <input id="profile-image-upload" class="hidden" type="file">

                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
		
			<div class="col-sm-3">

</div>



            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
			<div class="clearfix"></div>
    
    
              
<div id="colors" class="col-sm-5 col-xs-6 tital " >First Name:</div><div id="colors" class="col-sm-7 col-xs-6 "><?php echo $user['Name'] ?></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<!-- <div id="colors" class="col-sm-5 col-xs-6 tital " >Last Name:</div><div id="colors" class="col-sm-7"> Huddedar</div> -->
<div class="clearfix"></div>
<div class="bot-border"></div>

<!-- <div id="colors" class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div id="colors" class="col-sm-7">15 Jun 2016</div> -->

<div class="clearfix"></div>
<div class="bot-border"></div>

<div id="colors" class="col-sm-5 col-xs-6 tital " >E-mail:</div><div id="colors" class="col-sm-7"><?php echo $user['email'] ?></div>

<div class="clearfix"></div>
<div class="bot-border"></div>

        <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
 <div class="clearfix"></div>
<div class="bot-border"></div>



            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>


            <!-- /.box-body -->
         

</body>
</html>
