<?php include 'header.php';?>
<?php 
$x = 5; 
for($i=0;$i<6;$i++,$x++){ 
  if($x > 9) {
    echo "Total is $x"; 
}
  }
 ?>
<!-- Main Content of the page -->
        <main>

          <!-- Carousel -->

          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

              <div class="item active">
                <img src="images/sweettreats-firstslide.png" alt="Welcome" width="1300" height="400">
              </div>

              <div class="item">
                <a href="about.php"><img src="images/sweettreats-secondslide.png" alt="About Sweet Treats" width="1300" height="400"></a>
              </div>
            
              <div class="item">
                <a href="store.php"><img src="images/sweettreats-thirdslide.png" alt="Store" width="1300" height="400"></a>
              </div>

              <div class="item">
                <a href="special-order.php"><img src="images/sweettreats-fourthslide.png" alt="Special Request" width="1300" height="400"></a>
              </div>
          
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- Store Images: Cupcakes - Cookies - Bread -->
          <nav class="bgHomeGreen">
              <ul class="treats list-unstyled list-inline">
                  <li><a href="cupcakes.php"><img src="images/cupcake_green.png"></a></li>
                  <li><a href="cookies.php"><img src="images/cookie_green.png"></a></li>
                  <li><a href="bread.php"><img src="images/bread_green.png"></a></li>
              </ul>
          </nav>
          <!-- Nav blocks/images -->
          <nav class="bgWhite">
              <div class="row">
                  <div class="navtop col-xs-12">   
                    <ul class="navtop list-unstyled list-inline text-center">
                        <li><a href="about.php"><img src="images/aboutus.png"></a></li>
                        <li><a href="special-order.php"><img src="images/specialorders.png"></a></li>
                    </ul>
                  </div>
              </div>
              <div class="row">
                  <div class="navbottom col-xs-12">
                      <ul class="navbottom list-unstyled list-inline text-center">
                        <li><a href="about.php#location"><img src="images/location.png"></a></li>
                        <li><a href="about.php#contact"><img src="images/contact.png"></a></li>
                    </ul>
                  </div>
              </div>
          </nav>
        </main>
<?php include 'footer.php';?>