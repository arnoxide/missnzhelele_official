<?php

require_once('../database/authcontroller.php');

require_once('../database/mailer.php');

    if(isset($_POST['POST'])){

    $fullname = $_POST["fullname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $motto = $_POST["motto"];
    $generate= "012345678910111213141516171819202122232425262728290313233343536373839404142434445464748495051525354555657585960616263646566676869707172737475767778798081828384858687888990919293949596979899";
    $idgen=  substr(str_shuffle($generate),0,3); 
  
    // Handle uploaded picture
    $picture = $_FILES["picture"]["name"];
    $temp_file = $_FILES["picture"]["tmp_name"];
    $picture_path = "uploads/" . $picture;
    move_uploaded_file($temp_file, $picture_path);

    // Insert data into the database
    $sql = "INSERT INTO contestant (con_num,fullname, lastname, age, email, location, phone, picture, motto,new_returning)
            VALUES ('$idgen','$fullname', '$lastname', '$age', '$email', '$location', '$phone', '$picture_path', '$motto','0')";


    if (mysqli_query($conn, $sql)) {
        // echo "Registration successful!";
        header("refresh:0 url=http://localhost/miss/registration/success.php?id=$idgen");
     
        exit(0);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   

    // Close the database connection
    mysqli_close($conn);
}


////////////////////////////



////////////

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Miss Nzhelele | 2023 Registration</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body style="background-color: #FFDE59;">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">2023 Registration Form</h2>
                </div>
              
                <div class="card-body">
                    <form method="POST" action="index" enctype="multipart/form-data">
                    
                        <div class="form-row m-b-55">
                            <div class="name">Names</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fullname" required>
                                            <label class="label--desc">first names</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lastname" required>
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Age</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="age" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <!-- <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div> -->
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" required>
                                            <label class="label--desc">Make sure to provide a valid number, for contacting reasons</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="location" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Motto</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea id="" name="motto" class="input--style-5" maxlength="300"{{item.provider}} required></textarea>
                                    <label class="label--desc">300 words</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Picture</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="picture"  multiple required>
                                    <label class="label--desc">Clear half picture of yourself</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Joining Modelling for the 1st time?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="new" >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="returning" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                        <input type="submit" value="Register" name="POST">
                            <!-- <button class="btn btn--radius-2 btn--red" type="submit" name="POST">Register</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->