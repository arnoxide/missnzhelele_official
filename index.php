<?php 
require_once 'database/authcontroller.php';
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id']; 
}
if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
  }
  
  // //otp RSET//
  // if (isset($_GET['otp-token'])) {
  //   $otpToken = $_GET['otp-token'];
  //   resetOtp($otpToken);
  // }
   
  if (isset($_GET['resetToken'])) {
    $resetToken = $_GET['resetToken'];
    validateResetToken($resetToken,$base_url);
  }

?>
<!doctype html>
<html class="no-js" lang="">

<head> 
    <meta charset="utf-8">
    <title>Miss Nzhelele</title>
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="yes" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- Google Web Font -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lekton:400,700,400italic' rel='stylesheet' type='text/css'>

    <!--  Bootstrap 3-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- OWL Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">

    <!--  Slider -->
    <link rel="stylesheet" href="css/jquery.kenburnsy.css">

    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.css">

    <!-- Web Icons Font -->
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/iconmoon.css">
    <link rel="stylesheet" href="css/et-line.css">
    <link rel="stylesheet" href="css/ionicons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Magnific PopUp -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Tabs -->
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />

    <!-- Loader Style -->
    <link rel="stylesheet" href="css/loader-1.css">

    <!-- Costum Styles -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="img/favicon.png">

    <!-- Modernizer & Respond js -->
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>

    <!-- Preloader -->
    <div class="cover"></div>

    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="index.html">
                    <img src="img/photo.jpg" alt="Logo" height="150px" width="150px">
                    <!-- <h1>Miss <span>Nzhelele</span></h1>  -->
                </a>
            </div>
            
            <!-- Menu Hamburger (Default) -->
            <button class="main-menu-indicator" id="open-button">
                <span class="line"></span>
            </button>
            
            <div class="menu-wrap" style="background-image: url(img/nav_bg.jpg)">
                <div class="menu-content">
                    <div class="navigation">
                        <span class="pe-7s-close close-menu" id="close-button"></span>
                        <div class="search-wrap js-ui-search">
                            <input class="js-ui-text" type="text" placeholder="Search Here...">
                            <span class="eks js-ui-close"></span>
                        </div>
                    </div>
                    <nav class="menu">
                        <div class="menu-list">
                            <ul>
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="index.html">- Default</a></li>
                                        <li><a href="index-architecture.html">- Architecture</a></li>
                                        <li><a href="index-full-slider.html">- Slider Full Width</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li class="menu-item-has-children"><a href="#">Portfolio</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="portfolio-2column.html">-Portfolio 2 Column</a></li>
                                        <li><a href="portfolio-3column.html">-Portfolio 3 Column</a></li>
                                        <li><a href="portfolio-masonry.html">-Portfolio Masonry</a></li>
                                        <li><a href="portfolio-dribbble.html">-Portfolio Dribbble</a></li>
                                    </ul> -->
                                </li>
                                <li class="menu-item-has-children"><a href="#">Blog</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="blog.html">Blog Default</a></li>
                                        <li><a href="blog-timeline.html">Blog Timeline</a></li>
                                        <li><a href="single-blog.html">Blog Single</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                                <?php 
                               if (!isset($_SESSION['id'])) {
                               echo ' <li><a href="login">Sign-in</a></li>
                               <li><a href="register">Sign-up</a></li>
                               ';}
                               else{
                                echo '
                                <form class="form" action="ticket/index.php">
                                <input type = "hidden" min = "1" value = "1" name="quantity" >
                                <li><button type="submit" class="btn">Buy Ticket</button></li>
                                </form>
                                <li><a href="ticket/ticket.php">View ticket</a></li>
                                <li><a href="logout">Logout</a></li>'

                                ;
                               }
                              
                                
                                ?>
                               
                               
                                <!-- <li><a href="">Register</a></li> -->
                            </ul>
                        </div>
                    </nav>

                    <div class="hidden-xs">
                        <div class="menu-social-media">
                            <ul>
                               <li><a href="https://www.facebook.com/profile.php?id=100086479320924"><i class="iconmoon-facebook"></i></a></li>
                               <li><a href="#"><i class="iconmoon-twitter"></i></a></li>
                               <li><a href="https://www.instagram.com/miss.nzhelele/"><i class="iconmoon-instagram"></i></a></li>
                            </ul>
                        </div>

                        <div class="menu-information">
                            <ul>
                                <li><span>T:</span> 081 258 5734</li>
                                <li><span>E:</span> info@mail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Menu Hamburger (Default) -->

        </div>
    </div>

    <div class="container">
        <div class="slider-wrapper">
            <div class="slider-description">
                <div class="slider-description-inner">
                    <!-- <h1>Pure<span>Elegance</span></h1> -->
                </div>
              
              <div class="hero1">
               <div class="container">
                <div>
                  <h1><b>Miss Nzhelele 2023</b></h1>
                  <p ><b>2023 Entries are Closed</b> </p>
                <!-- <div class="time">
                    <p id="demo"></p>
                </div> -->
                <!-- <a href=""><p ><b>Register</b> </p></a> -->
                
              </div>
              <!-- <img src="https://assets.codepen.io/619833/0_3.webp" alt="" />  -->
              &nbsp; &nbsp; &nbsp;<img src="images/1680708142033.jpg" alt="" height="450px"/> 
              </div>
              </div>
                <!-- <div class="cd-intro">
                    
                    <div class="cd-headline clip">
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Elegant</b>
                            <b>MODERN COMBINATION</b>
                            <b>CREATIVE SOLUTIONS</b>
                        </span>
                    </div>
                </div> -->
            </div>
            <div id="slider-ef" class="slider-images-wrapper">
                <img class="img-responsive" src="img/Top3/winner.jpg" alt="">
                <img class="img-responsive" src="img/Top3/ambani.jpg" alt="">
                <img class="img-responsive" src="img/Top3/top3.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="container margin-top">
        <div class="history-wrapper">
            <div class="col-md-6 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">
                <div class="row">
                    <article>
                        <h1>HISTORY OF Organisation</h1>
                        <hr>
                        <h4>Miss Nzhelele is a groundbreaking modelling organisation that aims to redefine the world of self-love by 
                            incorporating the rich narratives of historical women who have made a significant impact on society. 
                           <br> Established just last year (2022) 
                            .</h4>
                        <p>
                        <br/>our organisation is committed to empowering girls and providing them with a platform to showcase their talent,
                        while simultaneously educating and inspiring others through the stories of remarkable women from the past.</p>
                    </article>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                <div class="row">
                    <div id="history-images" class="owl-carousel">
                        <div><img class="img-responsive center-block" src="img/top3/ambani.jpg" alt="About"></div>
                        <div><img class="img-responsive center-block" src="img/top3/runnerup-1.jpg" alt="About"></div>
                        <div><img class="img-responsive center-block" src="img/top3/runnerup-2.jpg" alt="About" height="400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container margin-top">
        <div class="main-title">
            <h1>WHY JOIN US?</h1>
            <hr>
            <h6>By joining our modeling Organisation's, girls can tap into their innate creativity and develop their self-confidence while being part of a supportive community that encourages self-expression.</h6>
        </div>
        <div class="services-home-page">
            <div class="row">
                <div class="col-md-4">
                    <div class="services-icon">
                        <span class="icon-heart"></span>
                        
                        <hr>
                    </div>
                    <h4>Empowering Self-Expression</h4>
                    <p>Modeling as a platform offers a unique opportunity for girls to express themselves creatively and confidently. 
                        It allows them to embrace their individuality, showcase their unique features, and celebrate their personal style</p>
                </div>
                <div class="col-md-4">
                    <div class="services-icon">
                        <span class="icon-heart"></span>
                        <hr>
                    </div>
                    <h4>Building Self-Confidence</h4>
                    <p>Through professional training, mentorship, and exposure to various aspects of the modeling industry, girls can develop
                         a strong sense of self and learn to project their best selves to the world</p>
                </div>
                <div class="col-md-4">
                    <div class="services-icon">
                        <span class="icon-globe"></span>
                        <hr>
                    </div>
                    <h4>Expanding Opportunities</h4>
                    <p>Whether they aspire to pursue a career in the fashion industry or simply want to explore their potential, modeling can act as a stepping stone towards various paths. Our agency has established connections with renowned designers, photographers, and brands, 
                        providing girls with the chance to participate in fashion shows, photo shoots, and other exciting projects</p>
                        
                </div>
                
            </div>
            <div class="btn">
                <input class="regbtn" type="submit" value="Register" >
            </div>
        </div>
    </div>
    <div class="container margin-top">
        <div class="main-title">
            <h1>2022 Highlights</h1>
            <hr>
            <h6>Have some peak at our last year excitement</h6>
        </div>
        <div class="portfolio-wrapper">
            <!-- <button class="nav">
                <span class="icon-container">
                    <span class="line line01"></span>
                    <span class="line line02"></span>
                    <span class="line line03"></span>
                    <span class="line line04"></span>
                </span>
            </button> -->
            <div class="works-filter">
                <a href="javascript:void(0)" class="filter active" data-filter="mix">All</a>
                <a href="javascript:void(0)" class="filter" data-filter="branding">Top 20</a>
                <a href="javascript:void(0)" class="filter" data-filter="web">Swimwear</a>
                <!-- <a href="javascript:void(0)" class="filter" data-filter="graphic">Graphic Design</a> -->
            </div>
            <div class="js-masonry">
                <div class="row" id="work-grid">
                    <!-- Begin of Thumbs Portfolio -->
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/01.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Liked</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">RINAE & LORRAINE</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix web">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/02.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">NEO & AMBANI</span>
                                    <span class="info">NEW TREND FASHION</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix graphic">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/03.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">SHONISANI & PFARELO</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/04.jpg" alt="Portfolio Item" height="350px">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">MATSHIDISO & VHUTHUHAWE</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/05.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">VHUTHUHAWE & KHADIVHONDZE</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/06.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">RILWELE & ZINZI</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/07.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">HAZEL & ZWANGA</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/08.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">LUFUNO & SHUDUFHADZO</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mix branding">
                        <div class="img home-portfolio-image">
                            <img src="img/swimwear/09.jpg" alt="Portfolio Item">
                            <div class="overlay-thumb">
                                <a href="javascript:void(0)" class="like-product">
                                    <i class="ion-ios-heart-outline"></i>
                                    <span class="like-product">Like</span>
                                    <span class="output">0</span>
                                </a>
                                <div class="details">
                                    <span class="title">FIFI & ANGEL</span>
                                    <span class="info">MISS NZHELELE 2022</span>
                                </div>
                                <span class="btnBefore"></span>
                                <span class="btnAfter"></span>
                                <a class="main-portfolio-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="load-more">
                <a href="javascript:void(0)" id="load-more"><i class="icon-refresh"></i></a>
            </div>
        </div>
    </div>
    <div class="container margin-top">
        <div class="newsletter">
            <div class="col-md-6">
                <div class="row">
                    <div class="newsletter-left">
                        <div class="newsletter-left-inner">
                            <h1>STAY INFORMED <br> WITH OUR <b>NEWSLETTER</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="newsletter-right" style="background: url(img/newsletter-bg.jpg)">
                        <div class="newsletter-right-inner">
                            <form>
                                <input type="text" name="newsletter" placeholder="ENTER YOUR EMAIL">
                                <input type="submit" value="SUBSCRIBE">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer margin-top">
        <div class="container">
            <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <h4>MISS NZHELELE</h4>
                                    <address>Nzhelele <br>Limpopo <br>South Africa</address>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-md-push-8 col-sm-4 col-xs-12">
                        <div class="footer-inner">
                            <div class="footer-content">
                               <h4>CONTACT INFO</h4>
                                <p>
                                    T:081 258 5734 <br>
                                    E:info@mail.com <br>
                                    W:www.website.com
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-inner">
                            <div class="footer-content">
                            <ul class="social-media">
                                <li><a href="https://www.facebook.com/profile.php?id=100086479320924"><i class="iconmoon-facebook"></i></a></li>
                                <li><a href="#"><i class="iconmoon-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/miss.nzhelele/"><i class="iconmoon-instagram"></i></a></li>
                                
                            </ul>
                            <span class="copyright-mark"><script>document.write(new Date().getFullYear())</script> &copy;  MISS NZHELELE, ALL RIGHTS RESERVED</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <a href="javascript:void(0)" class="scroll-top" id="scroll-top"><i class="pe-7s-angle-up"></i></a>

    <script src="js/vendor/jquery-1.11.2.min.js"></script>
    <script data-pace-options='{ "ajax": false }' src="js/vendor/pace.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/classie.js"></script>
    <script src="js/vendor/isotope.pkgd.min.js"></script>
    <script src="js/vendor/jquery.velocity.min.js"></script>
    <script src="js/vendor/jquery.kenburnsy.min.js"></script>
    <script src="js/vendor/textslide.js"></script>
    <script src="js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="js/vendor/tabs.js"></script>
    <script src="js/ef-slider.js"></script>    
    <script src="js/vendor/owl.carousel.min.js"></script>
    <script src="js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="js/vendor/jquery.social-buttons.min.js"></script>
    <script src="js/vendor/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>

    <!-- count dow timer -->
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jul 1, 2023 00:00:00").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
        
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
        
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
          // Display the result in the element with id="demo"
          document.getElementById("demo").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";
        
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }, 1000);
        </script>
</body>
</html>