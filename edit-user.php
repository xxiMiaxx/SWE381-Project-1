<?php
include('config/functions.php');
if(is_admin()){
    if(isset($_GET['id']) && intval($_GET['id']) != 0){
        $user = get_memeber_by_id(intval($_GET['id']));
        if($user != false){
            $user = $user[0];
	    if(isset($_POST['id']) && intval($_POST['id']) != 0 &&
	       isset($_POST['username']) && $_POST['username'] != '' &&
	       isset($_POST['email']) && $_POST['email'] != ''){
		if(isset($_POST['pass']) && $_POST['pass'] != ''){
		    $pass = md5($_POST['pass']);
		}else{
		    $pass = $user['Password'];
		}

		$info = [
		    'ID' => $_POST['id'],
		    'Name' => $_POST['username'],
		    'email' => $_POST['email'],
		    'Password' => $pass,
		    'image' => $user['image']
		];

		edit_profile($info);
		echo 'Saved!! <a href="">Refresh</a>';
	    }
        }else{
	    die('user not found');
        }
    }else{
	die('page not found');
    }
}else{
    
    header("Location: error.php");
}




?>
<!DOCTYPE html>
<html>
<title>My Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>

           <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link href="font-awesome.css" rel="stylesheet" type="text/css"> 
  <link href="css/style.css" rel="stylesheet" type="text/css">
  
       

       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<link rel="stylesheet" href="css/stylenav.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/style.css">

<body class="w3-light-grey">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif},

</style>
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large navbar" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" style="color: orange;" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right" style="color: orange;">Legacy Library</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Admin</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="adminDashboard2.php" class="w3-bar-item w3-button w3-padding " 
><i class="fa fa-home fa-fw"></i>  Overview</a>
    <a href="issue2.php" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-pencil fa-fw" s"></i>  Issue A Book</a>
    <a href="memebrs2.php" class="w3-bar-item w3-button w3-padding" style="background-color:#ffa500;"><i class="fa fa-users  fa-fw" ></i>  Members</a>
    <a href="catgs2.php" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-list-alt fa-fw"></i>  Categuries</a>
    <a href="allbooks2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>  Books</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-list-alt fa-fw"></i>  edit user info</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
           <div class="col-md-9">


<br/>




<h1>Edit <?php echo $user['Name'] ?> information</h1>

<form action="" method="POST" enctype="multipart/form-data">





    <input name="id" type="hidden" value="<?php echo $user['ID'] ?>"/> <br/><br/>
    Username: <input name="username" type="text" value="<?php echo $user['Name'] ?>"/> <br/><br/>
    Email: <input name="email" type="text" value="<?php echo $user['email'] ?>"/> <br/><br/>
    Password: <input name="pass" type="password" value=""/> <br/><br/>
    <button type="button" class="btn btn-success">Save edits</button> <a class="btn btn-default" href="./memebrs2.php">back</a> 




</form>


                   

        </div>  
   

</div>


  </div>

</div>



</body>



<script>

function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function send() {
    alert("notification sent!");
}

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}

</script>

</html>



