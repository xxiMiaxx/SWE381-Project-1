<?php

include('config/functions.php');

$cats = get_all_cats();
$output = '';

if(isset($_POST['search'])){

$searchq = $_POST['search'];


function search($tit){
    $bks = selectSql('select * from books where (title = "' . $tit . '")');
    if($bks != false){
        return $bks;
    }else{
        return [];
    }
}

$query = search($searchq);


if($query == []){

$output = 'no search reasults avalible';

} else {


foreach($query as $q){

$output .= '<div class="col-sm-3"><img src="' . $q['image_url']. '" class="img-responsive i" alt="Image"><h3 class="booktittle">' . $q['title'] . '</h3></div>';
}



}}
?>



<!DOCTYPE html>
<html>
<head>
<title>Legacy Library</title>
<meta charset="UTF-8">


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <link rel="stylesheet" href="cs.css">

  <link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<script>
var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n) {
  showDivs(slideIndex += n);
}
function currentDiv(n) {
  showDivs(slideIndex = n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}
</script>
<style>
img {width:100%;height:420px; }
h1 {
  text-align:center;
  margin-top:30px;
}
#special {
margin-top:20px; margin-right:11px;
}
li
{
  margin:0px;
  display:inline;
}

h3{

margin-top: 10%;

}

.col-sm-3{
margin-top: 5%;
}
</style>
</head>

<body class="w3-light-grey">


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



          

            <li class="nav-item"> <a class="nav-link" href="<?php if(is_admin()) { echo 'adminDashboard2.php';} else { echo 'userControlPanel.php'; } ?>">Dashboard</a> </li>
            <li class="nav-item"> <a class="nav-link" href="books.php">Books</a> </li>
            <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>


            </ul>

          </div>
                </div>
        </nav>
<br><br><br><br>


<div class="container-fluid bg-3 text-center">

  <div class="row">



<?php echo $output; ?>


 

    </div>


  </div>




</body>


</html>