<?php
include('config/functions.php');
if(my_id()){
  if(isset($_GET['id']) && trim($_GET['id']) != ''){
    $bkId= $_GET['id'];
$user=my_id();
  }


}
?>
<!DOCTYPE html>
<html>
<head>

<!-- test -->
<title>Book page</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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


li
{
  display:inline;
}




</style>
</head>

<body>
<nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
            <div class="container special">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </button>
          <a class="navbar-brand mx-auto" href="#" style="color:black;">Legacy<span>Library</span></a>

          <div class="collapse navbar-collapse" id="navbarCollapse1">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item active"> <a class="nav-link" href="#myCarousel">Home <span class="sr-only">(current)</span></a> </li>

             <li class="nav-item"> <a class="nav-link" href="userControlPanel.php">Dashboard</a> </li>
             <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>
 			 <li class="nav-item"><a class="nav-link" href="logsign.php"> <i class="fa fa-user-o" style="font-weight:900;"
 ><b style="font-family:Arial;font-weight:900;"> LogOut</b></i></a>

            </ul>

          </div>
                </div>
        </nav>

<div class="col-sm-2">
</div>
<div class="row" class="bookpage" >

  <div class="col-sm-10 col-md-8">
    <div class="thumbnail" style="padding-left:50px">
      <div class="caption">
        <!-- <h3>BOOK INFO</h3> -->
        <h3 class="product-title">Book is Borrowed</h3>
		<hr>


		  <div>


 <div class="details col-md-6">

<!-- <?php $info = get_bookInfo_by_id($bkId);
foreach ($info as $data) {
  echo $data['title'];


?>
<div class="rating">
<div class="stars">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
</div>
<span class="review-no">41 reviews</span>
</div>
<p class="product-description">Book info..........</p>
<?php echo $data['book_desc'];?>

<h4 class="price">current state: <span><?php
if($data['status']==0)
echo "Available";
else echo "not Available";
?></span></h4>
</h5>
<h5 class="colors">
<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
<span class="color green"></span>
<span class="color blue"></span>
</h5>
<div class="action">

</div>
</div>
 <img src="<?php echo $data['image_url'];?>" alt="book pictue" width="250px" height="400px">
   </div>
<?php }?> -->


       <!-- <hr>
	    <a href="#">
          <span class="glyphicon glyphicon-shopping-cart"></span>
        </a> -->
        <form>
          <?php
            changestatus($bkId);
            $date = strtotime("+30 day", strtotime(date("Y-m-d")));
            $new_date = date('Y-m-d', $date);
            new_issue($new_date, $bkId, $user,date("Y-m-d"));
          ?>
          <!-- <label>BORROW BOOK</label>
           <a  href="ownBook.php" class="add-to-cart btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Borrow Book</a>
        </form> -->

<!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->

      </div>

    </div>
  </div>


</div>

</body>
</html>
