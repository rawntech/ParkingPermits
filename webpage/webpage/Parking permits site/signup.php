<!DOCTYPE html>
<!-- This webpage contains the form to allow department staff the ability to fill out a form on behalf of someone who does not have an account -->
<?php
    $db = new PDO('mysql:host=localhost;dbname=parking_permits;charset=utf8mb4', 'root', '');
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
    /* tutorial_search is the name of database we've created */
     
    session_start();
// if the user is logged in already, redirect them to the logged in homepage
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'yes') {
      header('Location: ParkingPermits.php');
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Atmiya Parking</title><!-- styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse col-lg-12">
        <div class="container-fluid">
            <div class="navbar-header">
                <button aria-expanded="false" class="navbar-toggle collapsed"
                data-target="#myInverseNavbar2" data-toggle="collapse" type=
                "button"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span></button> <a class="navbar-brand"
                href="Home.php">Atmiya College Parking</a>
            </div>
            <!-- Navigation section linking pages and login/logout buttons -->


            <div class="collapse navbar-collapse" id="myInverseNavbar2">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                              if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'yes') {
                                echo "Welcome, " . $_COOKIE['user'] . " ";
                                echo '<a href="loggedout.php">Logout</a>';
                              }
                              ?>

                    <li>
                        <a href="Home.php">Home</a>
                    </li>
                    <?php
                              ini_set('display_errors',0);
                              if($_COOKIE['type'] == 'admin'){
                                echo '<li><a href="ParkingPermits.php">Search Database</a></li>';
                              }else{
                                echo '<li><a href="parkingpermitapplication.php">Parking Permit Application </a></li>';

                              }
                            ?>

                    <li>
                        <a href="Violations.php">Report Violations</a>
                    </li>


                    <li class="dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class=
                        "dropdown-toggle" data-toggle="dropdown" href="#" role=
                        "button">Account <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <?php
                                          if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'yes') {
                                            echo '<a href="loggedout.php">Logout</a>';
                                        
                                          }else {
                                            echo '<li><a href="login.php">Login</a></li><li><a href="signup.php">Sign up</a></li>';
                                          }
                                        ?>

                           
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Photo carousel banner  -->
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
                <div class="carousel slide" id="carousel-299058">
                    <ol class="carousel-indicators">
                        <li class="" data-slide-to="0" data-target=
                        "#carousel-299058">
                        </li>


                        <li class="active" data-slide-to="1" data-target=
                        "#carousel-299058">
                        </li>
                    </ol>
                    <!-- Photos -->


                    <div class="carousel-inner">
                        <div class="item">
                            <img alt="thumb" class="img-responsive" src=
                            "../images/carpark.jpg">

                            <div class="carousel-caption">
                                Undercover parking with access to all building
                            </div>
                        </div>


                        <div class="item active">
                            <img alt="thumb" class="img-responsive" src=
                            "../images/camera.jpg">

                            <div class="carousel-caption">
                                Safe and secure with CCTV 24/7
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" data-slide="prev" href=
                    "#carousel-299058"><span class="icon-prev"></span></a>
                    <a class="right carousel-control" data-slide="next" href=
                    "#carousel-299058"><span class="icon-next"></span></a>
                </div>
            </div>
        </div>

        <hr>
    </div>

    <hr>


    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="well">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    </div>


                    <nav class="sidemenu" id="sidemenu" style=
                    "z-index:3;width:250px;margin-top:51px;">
                        <form accept-charset='UTF-8' action='signupcheck.php'
                        id='register' method='post' name="register">
                            <legend>Register</legend> <input id='submitted'
                            name='submitted' type='hidden' value='1'>
                            <label for='name'>Your Full Name*:</label>
                            <input id='name' maxlength="50" name='name'
                            required="" type='text'> <label for='email'>Email
                            Address*:</label> <input id='email' maxlength="50"
                            name='email' required="" type='email'><br>
                            <label for='password'>Password*:</label> <input id=
                            'password' maxlength="50" name='password' type=
                            'password'> <label for=
                            'department_id'>Department*:</label> <select name=
                            "department_id" required="">
                                <option value="">
                                    None
                                </option>

                                <option value="1">
                                    IT
                                </option>

                                <option value="2">
                                    Business
                                </option>

                                <option value="3">
                                    drama
                                </option>

                                <option value="4">
                                    sport
                                </option>
                            </select><br>
                            Who are you: <select name="user_type" required="">
                                <option value="">
                                    None
                                </option>

                                <option value="student">
                                    Student
                                </option>

                                <option value="staff">
                                    Staff
                                </option>

                                <option value="visitor">
                                    Visitor
                                </option>
                            </select><br>
                            <input name='Submit' type='submit' value='Submit'>
                        </form>
                        <br>


                        <div class="row">
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <hr>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Location</h3>


                        <p><iframe allowfullscreen="" frameborder="0" height=
                        "450" src=
                        "https://www.google.com/maps/embed/v1/place?q=Atmiya%20&key=AIzaSyBb2OkrRfTcJo6KHcc3vH2pVHORmSyrVME"
                        style="border:0" width="100%"></iframe>
                        </p>
                    </div>


                    <div class="col-lg-6">
                        <!-- Information about Atmiya services -->


                        <h3>Our Services</h3>

                        <hr>


                        <ul class="nav nav-tabs" id="myTab1">
                            <li class="active">
                                <a data-toggle="tab" href="#home1">Parking
                                Permits</a>
                            </li>


                            <li>
                                <a data-toggle="tab" href="#pane2">Health and
                                Safety</a>
                            </li>


                            <li>
                                <a data-toggle="tab" href=
                                "#pane3">Violations</a>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade in active" id="home1">
                                <p class="text-center"><img alt="" src=
                                "../images/permit.jpg">
                                </p>


                                <p>At Atmiya College, Permits for parking are
                                managed by our health and safety department.
                                Requesting a Permit can be done online or on
                                campus and are approved by one of our
                                department employees.</p>
                            </div>


                            <div class="tab-pane fade" id="pane2">
                                <p class="text-center"><img alt="" src=
                                "../images/safety_first.jpg">
                                </p>


                                <p>At Atmiya College, Health and Safety are
                                managed by our health and safety department.
                                Submiting a Health and safety report may help
                                us better improve the college environment</p>
                            </div>


                            <div class="tab-pane fade" id="pane3">
                                <p class="text-center"><img alt="" src=
                                "../images/violation.jpg">
                                </p>


                                <p>At Atmiya College, Voilations are managed by
                                our health and safety department. Submiting a
                                voilation report may help us discover and
                                process voilation more efficient</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr>


        <footer class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Copyright © Atmiya College. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="../js/jquery-1.11.3.min.js">
        </script> 
        <script src="../js/bootstrap.js">
        </script> 
    </div>
</body>
</html>