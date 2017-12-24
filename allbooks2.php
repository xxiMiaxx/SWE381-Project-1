<?php
include('config/functions.php');

if(is_admin()){
    $cats = get_all_cats();
}else{
    header("Location: error.php");
}


$cats = get_all_cats();
if(isset($_GET['cat']) and trim($_GET['cat']) != ''){
    $books_count = count(get_books($_GET['cat'], 0));
    $books = get_books($_GET['cat']);
}else{
    $books_count = count(get_books('0'));
    $books = get_books('0');
}

if(isset($_GET['del']) && trim($_GET['del']) != ''){
    del_book($_GET['del']);
    header('Location: allbooks2.php');
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
		<h5><b><i class="fa fa-book fa-fw"></i>  Books</b></h5>
	    </header>

	    <div class="w3-row-padding w3-margin-bottom">
		<div class="col-md-9">

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Books..">

		    <p>
          Show Books Of Category:
        </p>
		    <a href="allbooks2.php?cat=0">All Books</a>
		    <?php foreach($cats as $cat){ ?>
			<a href="allbooks2.php?cat=<?php echo $cat['ID'] ?>"><?php echo stripslashes($cat['cat_name']) ?></a>
		    <?php } ?>
		    <table id="myTable">
			<thead>
			    <tr class="header">
				<th style="width:20%;">Book's title</th>
				<th style="width:20%;">Author</th>
				<th style="width:20%;">Category</th>
				<th style="width:20%;">ISBN</th>
				<th style="width:5%;">Status</th>
				<th style="width:15%;">Operations</th>
			    </tr>
			</thead>
			<tbody>
			    <?php foreach($books as $book){ ?>
				<tr <?php echo ($book['status'] == '0') ? '' : 'class="issuedb"' ?> >
				    <td><?php echo stripslashes($book['title']) ?></td>
				    <td><?php echo stripslashes($book['author']) ?></td>
				    <td><?php echo stripslashes($book['cat_name']) ?></td>
				    <td><?php echo stripslashes($book['ISBN']) ?></td>
				    <td><?php echo ($book['status'] == '0') ? 'available' : 'issued' ?></td>
				    <td>
					<a href="edit.php?id=<?php echo $book['id'] ?>" class="btn btn-default btn-xs">Edit</a>
					<a href="allbooks2.php?del=<?php echo $book['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
				    </td>
				</t>
			    <?php } ?>
			</tbody>
		    </table>
		    <script>
		    $(document).ready(function() {
			$('#myTable').DataTable();
			} );
		    </script>
		    <br >
<br >
<br/>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">

	  <form action="new-book.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
   <h6> | Add new Book</h6>
    <label for="BookName">books's name</label>
    <input class="form-control" name="title">
  </div>

   <div class="form-group">
   <label for="ISBN">books's ISBN</label>
    <input class="form-control" name="ISBN">
  </div>

    <div class="form-group">
   <label for="Author">Author</label>
   <input class="form-control" name="author">
  </div>

 <div class="form-group">
   <label for="Category">Category</label>
   <select class="form-control" name="category">
       <?php foreach($cats as $cat){ ?>
	   <option value="<?php echo $cat['ID'] ?>"><?php echo stripslashes($cat['cat_name']) ?></option>
       <?php } ?>
   </select>
 </div>

 <div class="form-group">
     <label for="coverimg">Upload cover</label>
     <input type="file" class="form-control-file" id="cover" name="book_image">
 </div>
 <div class="form-group">
     <label for="coverimg">Book description</label>
     <textarea type="text" class="form-control" name="book_desc"></textarea>
 </div>


  <button type="submit" class="btn btn-default">Add</button>
    <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
</form>


    </div>
  </div>
</div>
        </div>
        <div class="col-md-3">
          <a type="a" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Add new Book</a>
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
