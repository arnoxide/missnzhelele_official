<?php
require_once 'database/authcontroller.php';

$mk="SELECT * FROM contestant";
$res=mysqli_query($conn, $mk);
$gallery=mysqli_fetch_all($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Miss Nzhelele | admin</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
    <?php include_once('includes/side-bar.php') ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Contenstants</h1>
                        <h1 class="page-subhead-line">Hello [admin name], welcome to Miss Nzhelele Admin. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div id="port-folio">
                      <div class="row " >
                          <ul id="filters" >
						<li><span class="filter active" data-filter="landscape nature awesome">All </span></li>
						<li><span class="filter active">/</span></li>
						<li><span class="filter" data-filter="landscape">Contenstants</span></li>
						
					</ul>
                <?php foreach($gallery as $key => $image):?>
                <div class="col-md-4 ">
                    <div class="portfolio-item awesome mix_all" data-cat="awesome" >
                   
                        <img src="<?php echo'../registration/'.$image['picture']; ?>" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                <?php echo $image['fullname'] ;?> <?php echo $image['lastname'] ;?>
                                </span><br>
                                <?php echo $image['motto'] ;?> <br>
                                <span>
                                <?php echo $image['con_num'] ;?>
                                    </span><br>
                            </p>
                            <a class="preview btn btn-info " title="Image Title Here" href="<?php echo'../registration/'.$image['picture']; ?>"><i class="fa fa-plus fa-2x"></i></a>
                        </div>                        
                    </div>
                </div>
                <?php endforeach ?>
               
                

            </div>

            <div class="row " style="padding-top: 50px;">
                
                
                

            </div>
                    <div class="row "  style="padding-top: 50px;" >
              
             
                

            </div>
                </div>
               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2023 Miss Nzhelele | Design By : <a href="http://www.missnzhelele.co.za" target="_blank">missnzhelele.co.za</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.mixitup.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <!-- CUSTOM Gallery Call SCRIPTS -->
    <script src="assets/js/galleryCustom.js"></script>
</body>
</html>
