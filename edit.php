<?php
include('config/functions.php');
if(is_admin()){
    $cats = get_all_cats();
    if(isset($_GET['id']) && intval($_GET['id']) != 0){
        $book = get_book_by_id(intval($_GET['id']))[0];
        if($book != false){

            if(isset($_POST['book_title']) && trim($_POST['book_title']) != '' &&
               isset($_POST['book_id']) && intval($_POST['book_id']) != 0 &&
               isset($_POST['book_author']) && trim($_POST['book_author']) != '' &&
               isset($_POST['book_ISBN']) && trim($_POST['book_ISBN']) != '' &&
               isset($_POST['book_category']) && intval($_POST['book_category']) != 0 &&
               isset($_POST['book_desc']) && trim($_POST['book_desc']) != '' &&
               isset($_POST['book_img']) && trim($_POST['book_img']) != ''){
                $image = get_file('new_img');
                if($image['fileError'] > 0){
                    $img = $_POST['book_img'];
                }else{
                    $img = $image['fileName'];
                    upload_image($image['fileTmp'], $image['fileName']);
                }

                $info = [
                    'id' => intval($_POST['book_id']),
                    'title' => addslashes($_POST['book_title']),
                    'ISBN' => addslashes($_POST['book_ISBN']),
                    'book_desc' => addslashes($_POST['book_desc']),
                    'author' => addslashes($_POST['book_author']),
                    'categoryID' => intval($_POST['book_category']),
                    'image_url' => addslashes($img),
                ];

                edit_book($info);
                echo 'Saved!! <a href="">Refresh</a>';
            }
        }else{
            die('Book not found');
        }
    }else{
        die('Page not found');
    }
}else{
    header('Location: error.php');
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
    <a href="issue2.php" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-pencil fa-fw"></i>  Issue A Book</a>
    <a href="memebrs2.php" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-users  fa-fw"></i>  Members</a>
    <a href="catgs2.php" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-list-alt fa-fw"></i>  Categuries</a>
    <a href="allbooks2.php" class="w3-bar-item w3-button w3-padding" style="background-color:#ffa500;"><i class="fa fa-book fa-fw"></i>  Books</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-list-alt fa-fw"></i>  Members</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
           <div class="col-md-9">


<h1>Edit book</h1>

    <form action="" method="POST" enctype="multipart/form-data">
    <input name="book_id" type="hidden" value="<?php echo $book['id'] ?>"/>
    <p>

    </p>
    book title <input name="book_title" type="text" value="<?php echo $book['title'] ?>"/> <br/><br/>
    book author <input name="book_author" type="text" value="<?php echo $book['author'] ?>"/> <br/><br/>
    book ISBN <input name="book_ISBN" type="text" value="<?php echo $book['ISBN'] ?>"/> <br/><br/>
    book category
    <select name="book_category" type="text">
    <option value="<?php echo $book['categoryID'] ?>"><?php echo $book['cat_name'] ?></option>
    <?php foreach($cats as $cat){ ?>
        <?php if($cat['ID'] == $book['categoryID']){ continue ;} ?>
        <option value="<?php echo $cat['ID'] ?>"><?php echo $cat['cat_name'] ?></option>
    <?php } ?>
    </select>
    <br/><br/>
    book description <br/>
    <textarea cols="30" id="" name="book_desc" rows="10"><?php echo $book['book_desc'] ?></textarea> <br/><br/>
    <input name="book_img" type="hidden" value="<?php echo $book['image_url'] ?>"/>

    <input name="new_img" type="file" value=""/>
    <br/><br/>
    <a class="btn btn-default" href="./allbooks2.php">back</a>
    <button class="btn btn-default" >save</button>


    </form>





</div>
<div class="col-md-3">
  <img height="200" src="<?php echo $book['image_url'] ?>"/>
</div>




  </div>




  <!-- End page content -->
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
