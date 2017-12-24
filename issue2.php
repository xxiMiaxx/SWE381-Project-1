<?php
include('config/functions.php');



if(is_admin()){
    $cats = get_all_cats();
}else{
    header("Location: error.php");
}


$mmbs = get_all_mmbs();
$bks = get_all_bks();


$do = '';

if(isset($_GET['do'])){

$do = $_GET['do'];

} else {


$do = 'issue2';

}

if( $do == 'issue2'){

?>



<!DOCTYPE html>
<html>
<title>My Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="font-awesome.css" rel="stylesheet" type="text/css">

       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/stylenav.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/style.css">

<body class="w3-light-grey">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif},

</style>
<!-- Top container -->
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large navbar" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" style="color: orange;" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right" style="color: orange;">Legacy Library</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <!-- <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px"> -->
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
    <a href="adminDashboard2.php" class="w3-bar-item w3-button w3-padding " ><i class="fa fa-home fa-fw"></i>Overview</a>
    <a href="issue2.php" class="w3-bar-item w3-button w3-padding" style="background-color:#ffa500;"><i class="fa fa-pencil fa-fw"></i>  Issue A Book</a>
    <a href="memebrs2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users  fa-fw"></i>  Members</a>
    <a href="catgs2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-alt fa-fw"></i>  Categuries</a>
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
    <h5><b><i class="fa fa-pencil fa-fw"></i>  Issue A Book</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
           <div class="col-md-9">



  <form action="?do=send" method="POST" enctype="multipart/form-data">


  <div class="form-group">


    <label for="book">Book Title</label>
   <select class="selectpicker" data-live-search="true" name="book">



  <?php foreach($bks as $book){ ?>



    <option value="<?php echo $book['id'] ?>" data-tokens="<?php echo $book['title'] ?> " required ="" >  <?php echo $book['title'] ?> </option>

<?php
}
?>

    </optgroup>

</select>
  </div>


    <div class="form-group">
    <label for="user">Member</label>
   <select class="selectpicker" data-live-search="true" name="user">

<?php
foreach ($mmbs as $users) {
      ?>
    <option value="<?php echo $users['ID']?>" data-tokens="<?php echo $users['Name']?>" required ="" > <?php echo $users['Name']?> </option>

<?php
}
?>

</select>

  </div>

<div class="form-group">
    <label for="issuedDate">Issued Date</label>
<input type="date" name="issuedate"> </input>

</div>

<div class="form-group">
    <label for="dueDate">Due Date</label>
<input type="date" name="duedate"> </input>

</div>



  <button type="submit" class="btn btn-default">Issue</button>

</form>

        </div>







</div>





  </div>




  <!-- End page content -->
</div>



</body>

<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
<script>

$('.datepicker').datepicker()

  $(document).ready(function () {
    $('.selectpicker').selectpicker();
  });


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

<?php

}


 elseif ( $do == 'send') {




    if(isset($_POST['book']) && trim($_POST['book']) != '' &&
       isset($_POST['user']) && trim($_POST['user']) != '' &&
       isset($_POST['issuedate']) && trim($_POST['issuedate']) != '' &&
       isset($_POST['duedate']) && trim( $_POST['duedate']) != ''){

        $book = addslashes($_POST['book']);
        $user = addslashes($_POST['user']);
        $issueD = addslashes($_POST['issuedate']);
        $dueD = addslashes($_POST['duedate']);



        new_issue($dueD, $book, $user, $issueD);
        changestatus($book);

        header("Location: issue2.php");


    }else{
        header("Location: issue2.php?do=error");


  }
}

elseif ( $do == 'error') {

?>


<!DOCTYPE html>
<html>
<title>My Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="font-awesome.css" rel="stylesheet" type="text/css">

       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/stylenav.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/style.css">

<body class="w3-light-grey">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif},

</style>
<!-- Top container -->
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
    <a href="adminDashboard2.php" class="w3-bar-item w3-button w3-padding " ><i class="fa fa-home fa-fw"></i>Overview</a>
    <a href="issue2.php" class="w3-bar-item w3-button w3-padding" style="background-color:#ffa500;"><i class="fa fa-pencil fa-fw"></i>  Issue A Book</a>
    <a href="memebrs2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users  fa-fw"></i>  Members</a>
    <a href="catgs2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-alt fa-fw"></i>  Categuries</a>
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
    <h5><b><i class="fa fa-pencil fa-fw"></i>  Issue A Book</b></h5>
  </header>



  <div class="w3-row-padding w3-margin-bottom">

  <div class="alert alert-warning">
  please full all the fields.
</div>

           <div class="col-md-9">



  <form action="?do=send" method="POST" enctype="multipart/form-data">


  <div class="form-group">


    <label for="book">Book Title</label>
   <select class="selectpicker" data-live-search="true" name="book">



  <?php foreach($bks as $book){ ?>



    <option value="<?php echo $book['id'] ?>" data-tokens="<?php echo $book['title'] ?> " required ="" >  <?php echo $book['title'] ?> </option>

<?php
}
?>

    </optgroup>

</select>
  </div>


    <div class="form-group">
    <label for="user">Member</label>
   <select class="selectpicker" data-live-search="true" name="user">

<?php
foreach ($mmbs as $users) {
      ?>
    <option value="<?php echo $users['ID']?>" data-tokens="<?php echo $users['Name']?>" required ="" > <?php echo $users['Name']?> </option>

<?php
}
?>

</select>

  </div>

<div class="form-group">
    <label for="issuedDate">Issued Date</label>
<input type="date" name="issuedate"> </input>

</div>

<div class="form-group">
    <label for="dueDate">Due Date</label>
<input type="date" name="duedate"> </input>

</div>











  <button type="submit" class="btn btn-default">Issue</button>

</form>

        </div>







</div>





  </div>




  <!-- End page content -->
</div>



</body>

<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
<script>

$('.datepicker').datepicker()

  $(document).ready(function () {
    $('.selectpicker').selectpicker();
  });


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



<?php




}else{

echo "error";

}

?>
