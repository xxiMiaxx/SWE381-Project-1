<?php

include('config/functions.php');
if(my_id()){
    $u_id = my_id();
$user = get_memeber_by_id($u_id);
    if($user != false){
  $user = $user[0];
        $currently = get_cur($u_id);
        $history = get_his($u_id);
    }else{
        die('User not found!');

    }
}else{
    //die('Page not found!');
    header('Location: logsign.php');
}
?>

<!DOCTYPE html>
<html>
<title>DashBoard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="css/stylenav.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/app.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

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
      <span>Welcome, <strong><?php echo $user['Name']; ?></strong></span><br>
      <!-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> -->
      <!-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a> -->
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-book fa-fw"></i> My Books</a>

    <a href="books.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pencil fa-fw"></i> Explore Books and Categories</a>
    <a href="requestBookF.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Request a new Book</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Sign Out</a>
    <a href="profile.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Profile</a><br><br>
  </div>
</nav>



<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <!-- <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-gold w3-padding-16">
        <div class="w3-left"><i class="fa fa-check-square-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Finished Books</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-peru w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Books To-Be-Read</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Currently Reading</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-calendar w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>coming Due Dates</h4>
      </div>
    </div>
  </div> -->

  <div class="w3-panel">
      <div class=" w3-col.s12">
        <h5>my current books (books issued to user)</h5>
        <table class="w3-table w3-striped w3-white">
          <!-- <h1>Currentlry</h1> -->
          <?php if(count($currently) == 0){ ?>
             No Currently
          <?php }else{ ?>
            <!-- <table id="currently-table" border="1"> -->
          <thead>
              <tr>
            <td>Book</td>
            <td>Due Date</td>
            <td>Issued Date</td>
              </tr>
          </thead>
          <tbody>
              <?php foreach($currently as $cur){ ?>
            <tr class="w3-white">
                <td class=" w3-large w3-bordered"><?php echo $cur['title'] ?></td>
                <td class=" w3-large"><?php echo $cur['cur_due'] ?></td>
                <td class=" w3-large"><?php echo $cur['issued_date'] ?></td>
                <td class=" w3-large">

            <a href="date.php"><button>Extend Due Date</button></a>

                </td>
                <td class=" w3-large">

            <a href="returnBook.php?id=<?php echo $cur['b_id']?>" ><button>Return Book</button></a>

                </td>
            </tr>
              <?php } ?>
          </tbody>
            </table>
          <?php } ?>
<h1>history</h1>
<table class="w3-table w3-striped w3-table-all w3-white">

          <?php if(count($history) == 0){ ?>
            No history
          <?php }else{ ?>

          <thead>
              <tr class="w3-white">
            <td class=" w3-large">Book</td>
              </tr>
          </thead>
          <tbody>

              <?php foreach($history as $his){ ?>
            <tr class="w3-white">
                <td class=" w3-large"><?php echo $his['title']; ?></td>
            </tr>
              <?php } ?>

          </tbody>
            </table>

          <?php } ?>



        <!-- NOTIFICATIONS -->



                  <?php if(get_not($u_id)!=''){
                    $notes = get_not($u_id);
                     ?>
                     <h1>Book Notifications</h1>
                    <table class="w3-table w3-table-all w3-striped w3-white">


                  <thead>
                      <tr class="w3-white">
                    <td class="w3-large">Book</td>


                    <td class=" w3-large">Notification</td>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach($notes as $not){
                        $book = get_book_by_id2($not['noti_book']);
                        foreach($book as $b)?>
                        <tr class="w3-white">
                            <td class=" w3-large"><?php echo $b['title']?></td>

                        <td class="w3-large"><?php echo $not['noti_msg'] ?></td>
                    </tr>
                      <?php } ?>
                  </tbody>
                    </table>
                  <?php } ?>

                  <?php
                   // $user = my_id();
                  ////  $current = get_cur($user);
                   // foreach($current as $book){
                  /*
     <!-- <tr>
                    <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
                    <td class=" w3-large">
                      <?php echo $book['b_id']; } ?>
                    </td> -->
                    <!-- <td><i></i></td> -->
                  <!-- </tr> -->

                  */
                  ?>


                </table>
      </div>
    <!-- </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Reading Progress</h5>
    <p>Harry Potter and the Cursed Child</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>The Perfect Theory</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>The Stranger</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-teal" style="width:75%">75%</div>
    </div>
  </div>
  <hr> -->

  <!-- <div class="w3-container">
    <h5>Reading History</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td> the history of United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>before i fall</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>the dark knight</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>the perks of being a wallflower</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>pride and prejudice</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>tarzan</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Readers community</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16"> -->
        <!-- <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px"> -->
        <!-- <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16"> -->
        <!-- <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px"> -->
        <!-- <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16"> -->
        <!-- <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px"> -->
        <!-- <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr> -->

  <!-- <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center"> -->
        <!-- <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px"> -->
      <!-- </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div> -->

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <!-- <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px"> -->
      </div>
      <!-- <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div> -->
    </div>
  </div>
  <br>
  <!-- <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">reading challenge</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">book due date</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">reading goals</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div> -->

  <!-- Footer -->
  <!-- <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p><a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a> books are nothing but minds sitting on shelves</p>
  </footer> -->

  <!-- End page content -->
</div>

<script>
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

</body>
</html>
