<!DOCTYPE html>
  <html lang="en">
  <head>
<!-- test -->
<title>Home page</title>
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
             <li class="nav-item active"> <a class="nav-link" href="#myCarousel">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link" href="#benefits">Catgories</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#about">About</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#contact">Contact</a> </li>
            <li class="nav-item"><a class="nav-link" href="logsign.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
            <li class="nav-item"><a class="nav-link" href="logsign.php"> <i class="fa fa-user-o" aria-hidden="true"></i> Login</a></li>
            </ul>

          </div>
                </div>
        </nav>

    <!-- Swiper Silder
        ================================================== -->
    <!-- Slider main container -->
    <div class="swiper-container main-slider swiper-cintainer-horizontal" id="myCarousel">
      <div class="swiper-wrapper">
        <div class="swiper-slide slider-bg-position" style="background:url('images/bookwall.jpg')" data-hash="slide1">
          <div style="background-color:rgb(51, 51, 51); opacity:0.8; width:75%;"><h2 style="opacity:1;">Good friends good books and a sleepy conscience this is the ideal life</h2></div>
        </div>
        <div class="swiper-slide slider-bg-position" style="background:url('images/bookwall.jpg')" data-hash="slide2">
          <h2>Happiness is nothing more than good health and a bad memory</h2>
        </div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
      <!-- Add Navigation -->
      <!-- <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
      <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div> -->
    </div>


    <!-- Benefits
        ================================================== -->
    <section class="service-sec" id="benefits">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
          <h2><small>Features of the Leagcy Library</small>Browse thousands of genres. Find and enjoy your favourite books</h2>
        </div>
            </div>
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-bookmark-o" aria-hidden="true"></i>
              <h3>Biography</h3>
              <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
            </div>
            <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-leaf" aria-hidden="true"></i>
              <h3>Philosophy</h3>
              <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
            </div>
            <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-grav" aria-hidden="true"></i>
              <h3>Science Fiction</h3>
              <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
            </div>
            <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-clock-o" aria-hidden="true"></i>
              <h3>History</h3>
              <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
            </div>
          </div>

          </div>

          <!-- <div class="col-md-4"> <img src="http://grafreez.com/wp-content/temp_demos/burnout/img/side-01.jpg" class="img-fluid" /> </div> -->
        </div>


        <div class="col-md-12">

          <!-- <p><a href="books.php" class="btn btn-transparent-orange btn-capsul">Explore More</a></p> -->
        </div>

        <!-- /.row -->
      </div>
      <div class="container">
        <div class="row">

        </div>
      </div>
    </section>

    <!-- About
        ================================================== -->
    <section class="about-sec parallax-section" id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
<h2><small>Who We Are</small>Legacy<br>
              Library</h2>
          </div>
          <div class="col-md-4">
            <p>To enjoy good health, to bring true happiness to one's family, to bring peace to all, one must first discipline and control one's own mind. If a man can control his mind he can find the way to Enlightenment, and all wisdom and virtue will naturally come to him.</p>
            <p>Saving our planet, lifting people out of poverty, advancing economic growth... these are one and the same fight. We must connect the dots between climate change, water scarcity, energy shortages, global health, food security and women's empowerment. Solutions to one problem must be solutions for all.</p>
          </div>
          <div class="col-md-4">
            <p>Our greatest happiness does not depend on the condition of life in which chance has placed us, but is always the result of a good conscience, good health, occupation, and freedom in all just pursuits.</p>
            <p>Being in control of your life and having realistic expectations about your day-to-day challenges are the keys to stress management, which is perhaps the most important ingredient to living a happy, healthy and rewarding life.</p>
            <!-- <p><a href="newbooks.html" class="btn btn-transparent-white btn-capsul">Explore More</a></p> -->
          </div>
        </div>
      </div>
    </section>

     <section class="action-sec" id="contact">
              <div class="container">
                  <div class="action-box text-center"><h2>Contact us</h2>

<i class="fa fa-twitter" aria-hidden="true"></i>  |  <i  class="fa fa-facebook" aria-hidden="true"></i>  |  <i  class="fa fa-linkedin" aria-hidden="true"></i>

                  </div>
              </div>
          </section>


  </body>
  </html>
