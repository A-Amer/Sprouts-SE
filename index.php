<!DOCTYPE html>
<html lang="en">
    <head>
         <script>
            function viewAnnouncements() {
                var ann_div = $('#ann');
                $.ajax({
                    type: 'GET',
                    url: 'viewAnnouncements.php',
                    success: function (html) {
                        ann_div.html(html);
                    }
                });
            }
            


       </script>
        <script type="text/javascript">
        function setDate() {
                var today = new Date();
                var nextyear = new Date();
                var dd = today.getDate()+1;
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                var yyyynext = today.getFullYear()+1;
                 if(dd<10){
                        dd='0'+dd
                    } 
                    if(mm<10){
                        mm='0'+mm
                    } 
                nextyear=yyyynext+'-'+mm+'-'+dd;
                today = yyyy+'-'+mm+'-'+dd;
                document.getElementById("date").setAttribute("min", today);
                document.getElementById("date").setAttribute("max", nextyear);
                
        }
        window.onload = setDate;
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        
        <title>Sprouts</title>
        
        <!-- stylesheet css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/nivo-lightbox.css">
        <link rel="stylesheet" href="css/nivo_themes/default/default.css">
        <link rel="stylesheet" href="css/style.css">
        
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>
        <style>
            table, th, td {
                 border-spacing: 30px;
                 padding:0 15px 0 15px;
            }
           
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        
        <!-- navigation -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header" style="align: left">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>
                    <a href="#home" class="navbar-brand smoothScroll">Sprouts</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li><a href="#AllAnnoucements" onclick="viewAnnouncements()" class="smoothScroll">ANNOUNCEMENTS</a></li>
                        <li><a href="#Donation" class="smoothScroll">DONATE</a></li>
                        <li><a href="#SignUP" class="smoothScroll">SIGNUP</a></li>                       
                        <li><a href="#Contact" class="smoothScroll">CONTACT US</a></li>
                        <li>
                            <form action="login.php" method="post" role="form">
                                <div class="col-md-3 col-md-3">
                                    <br>
                                    <input name="loginEmail" type="email" class="form-control" id="loginEmail" placeholder="Email" required>
                                </div>
                                <div class="col-md-3 col-md-3">
                                    <br>
                                    <input name="loginPassword" type="password" class="form-control" id="loginSubject" placeholder="Password" required>
                                </div>
                                <div class="col-md-3 col-md-3">
                                    <br>
                                    <input name="submitin" type="submit" class="form-control" id="submitin" value="Login">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- home section -->
        <div id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-6 col-md-6 col-sm-offset-6 col-sm-6">
                        <h2>Welcome to</h2>
                        <h1>Sprouts <strong>Education Center</strong></h1>
                        <a href="#service" class="btn btn-default smoothScroll">GET STARTED</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- service section -->
        <div id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h2>Getting Started</h2>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <i class="fa fa-cubes"></i>
                        <h3>Who Are We </h3>
                        <p>Sprouts is a platform serving students and their instructors throughout easy online services </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <i class="fa fa-cogs"></i>
                        <h3>What Do We Provide</h3>
                        <p>For our students, They can view their assignments, schedule, enroll in a course etc... .</p>
                        <p>For our instructors, They can upload assignments, post notifications for their students , etc... .</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <i class="fa fa-group"></i>
                        <h3>Join Us</h3>
                        <p>Start by creating an <a href="#SignUp" class="btn btn-default smoothScroll">Account</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- divider section -->
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <hr>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
        </div>
        
       <div  id="viewAnnoucements">
            <div id="AllAnnoucements">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <center><h2>Announcements</h2></center>
                        </div>
                        <div id="ann"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- divider section -->
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <hr>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
        </div>
        
           <div id="SignUp">
               <div id="Donation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h2>Donate</h2>
                    </div>
                    <form action="Donate.php" method="post" role="form">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <div class="col-md-6 col-sm-6">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input name="address" type="text" class="form-control" id="address" placeholder="Collection Address" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input name="tele" type="number" class="form-control" size="11" id="tele" placeholder="Telephone" required>
                            </div> 
                            <div class="col-md-6 col-sm-6">
                                <input name="date" type="date" class="form-control" min='2018-05-01' max="2019-05-01" id="date"  required>
                            </div>
                           <!-- <div class="col-md-6 col-sm-6">
                                 <input name="time" type="time" class="form-control" id="time" min="10:00" max="18:00" required>
                            </div> -->
                            <div class="col-md-4 col-sm-4">
                                <input name="submit" type="submit" class="form-control" id="submit" value="Donate">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1"></div>
                    </form>
                </div>
            </div>
               </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <hr>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
        </div>
        <!--SignUp-->
        <div id="SignUp">
            <div id="SignUP">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h2>Sign Up</h2>
                    </div>
                    <form action="signup.php" method="post" role="form">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <div class="col-md-6 col-sm-6">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input name="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input name="submit" type="submit" class="form-control" id="submit" value="SIGN UP">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1"></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        
        
        <!-- divider section -->
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <hr>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
        </div>
        
        <!-- footer section -->
        <footer>
            <div id="Contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2>Our Office</h2>
                            <p>3 Nawal st Dokki,Giza,Egypt</p>
                            <p>Email: <span>Sprouts@hotmail.com</span></p>
                            <p>Phone: <span>01111688661</span></p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h2>Social Us</h2>
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/Learn-Centric-260821564385169/" target="_blank" class="fa fa-facebook"></a></li>
                                <li><a href="https://www.instagram.com/accounts/login/" target="_blank" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- divider section -->
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <hr>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
        </div>
        
        <!-- copyright section -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p>
                            Copyright &copy; 2018 Sprouts-Education:
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- scrolltop section -->
        <a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a>
        
        
        <!-- javascript js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/nivo-lightbox.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/isotope.js"></script>
        <script src="js/imagesloaded.min.js"></script>
        <script src="js/custom.js"></script>
        
    </body>
</html>
