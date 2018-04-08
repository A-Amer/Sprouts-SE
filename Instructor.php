<!DOCTYPE html>
<html lang="en">
    <head>
<?php session_start();?>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
        
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
        <!-- google web font css -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>
            
        <script>
            
            
            function GetUserName() {
                var name_div = $('#dispname');
                $.ajax({
                    type: 'GET',
                    url: 'GetUserName.php',
                    success: function (html) {
                        name_div.html(html);
                    }
                });
            }
            
            
            function DispCenSchedule() {
                var CenSchedule_div = $('#cenSchedule');
                $.ajax({
                    type: 'GET',
                    url: 'ViewCenSchedule.php',
                    success: function (html) {
                        CenSchedule_div.html(html);
                    }
                });
            }
            
            function viewInstSchedule()
            {
                var myschedule_div = $('#myschedule');
                $.ajax({
                    type: 'GET',
                    url: 'InstructorSchedule.php',
                    success: function (html) {
                        myschedule_div.html(html);
                    }
                });
                
            }	
            
        </script>
            
    </head>
        <body data-spy="scroll" data-target=".navbar-collapse">
    
        <!-- navigation -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>
                    <a href="#home" class="navbar-brand smoothScroll">Sprouts</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home" class="smoothScroll">HOME</a></li>
                        <li><a href="#Contact" class="smoothScroll">CONTACT US</a></li>
                        <li><a href="index.php" class="smoothScroll">LOG OUT</a></li>
                    </ul>
                </div>
            </div>
        </div>		
    
        <!-- home section -->
        <div id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-6 col-md-6 col-sm-offset-6 col-sm-6">
                        <h2>Welcome <?php echo $_SESSION['username']; ?> to</h2>
                        <h1>Sprouts <strong>Education Center <script>GetUserName(); </script></strong> </h1>
                        <div id="dispname" >
                            <h1>  </h1>
                        </div>
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
    
        <div class="container">
            <div class="row">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#ISchedule" data-toggle="tab" onclick="viewInstSchedule()">My Schedule</a></li>
                    <li><a href="#Notifications " data-toggle="tab">Send Notifications</a></li>
                    <li><a href="#Assignments " data-toggle="tab">Post Assignments</a></li>
                    <li><a href="#ViewSchedule " data-toggle="tab" onclick= "DispCenSchedule()">Center's Schedule</a></li>
                    <li><a href="#ChangePassword " data-toggle="tab">Change Password</a></li>
                                    
                </ul>
                    
                <div class="tab-content">
                    
                    <div class="tab-pane fade" id="ISchedule">
                        <div id="myschedule">                    
                        </div>
                    </div>
                                
                    <div class="tab-pane fade"  id="Notifications">
                        <div class="form-group">
                            <label for="comment">Notifications:</label>	
                        </div>
                    </div>
                    <div class="tab-pane fade"  id="Assignments">
                    </div>
                    <div class="tab-pane fade"  id="ViewSchedule">
                                <center><div id="cenSchedule">
                                            
                            </div></center>
                    </div>
                                    
                    <div class="tab-pane fade " id="ChangePassword">
                        <!--SignUp-->
                        <div id="SignUp">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h2>Change Password</h2>
                                    </div>
                                    <form action="Change_pass.php" method="post" role="form">
                                        <div class="col-md-1 col-sm-1"></div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="col-md-6 col-sm-6">
                                                <input name="oldpass" type="password" class="form-control" id="password" placeholder="Old Password" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input name="newpass" type="password" class="form-control" id="New password" placeholder="New Password"  required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input name="confirmpass" type="password" class="form-control" id="Confirm password" placeholder="Confirm Password" required>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <input name="submit" type="submit" class="form-control" id="submit" value="Submit">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    
    </body>
</html>
<?php
    include 'footer.php';
?>