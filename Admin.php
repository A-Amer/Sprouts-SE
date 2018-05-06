<!DOCTYPE html>
<html lang="en">
    <head>
<?php  session_start(); ?>
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
        <!-- google web font css -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>
        
        <script>
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
            function viewInstructors() {
                var Instructors_div = $('#Instructors');
                $.ajax({
                    type: 'GET',
                    url: 'View_Instructors.php',
                    success: function (html) {
                        Instructors_div.html(html);
                    }
                });
            }
            function addRow(tableId) {
                var table = document.getElementById(tableId);
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell4 = row.insertCell(2);
                var cell3 = row.insertCell(3);
                cell1.innerHTML = "<input type='time' name='startDate' placeholder= 'Start Date' required>";
                cell2.innerHTML = "<input type='time' name='endDate' placeholder= 'End Date' required>";
                cell4.innerHTML = "<input type='text' name='course' placeholder= 'Course' required>";
                cell3.innerHTML = "<button type='button' onclick='deleteRow($(this))'>Delete Slot</button>";
            }

            function deleteRow(btn) {
                var row = btn[0].parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
            function slotDetails(day,table,childArray){
                var rowsCount = table.rows.length; 
                var inputvalue=new Date();
                if(rowsCount>2)
                {
                    childArray.push(day);
                }
                for (i = 2; i < rowsCount; i++) {
                    var inputs = table.rows.item(i).getElementsByTagName("input");
                    var inputLength = inputs.length;
                    for (var j = 0; j < inputLength-1; j++) {
                        var inputvalue = inputs[j].value;
                        var t = inputvalue.split(':');
                        var stime = (+t[0]) * 60 * 60 + (+t[1]) * 60; //calculate the time in seconds
                        if(inputvalue ==""){
                            alert('Please enter the time in slots');
                            return true;
                        }
                        else if(!stime)//check if the time is undefined or nan or null or false value
                        {
                            alert('Please enter a valid time slot');
                            return true;
                        }
                        else if(stime<32400||stime>72000){
                            alert("please enter valid time from 9 to 20");
                            return true;
                        }
                        else{
                            if(j==1&&stime<stime1)
                            {
                                alert('Start time must be before end time');
                                return true;
                            }
                            if(j==1 && stime-stime1<3600)
                            {
                                alert('The minimum time of slot is one hour');
                                return true;
                            }
                            childArray.push(inputvalue);
                            var stime1=stime;//check if the first time is true
                        }
                    }
                    if(inputs[inputLength-1]==""){
                        alert('Enter course name');
                        return true;
                    }
                    var course=inputs[2].value;
                    childArray.push(course);			
                }
            }
            function createSchedule()
            {
                var childArray = [];
                var parentArray = [];
                var checkInalid;
                var numOfSlots;
                var table = document.getElementById("sundayTable");
                numOfSlots=table.rows.length-2;
                checkInalid=slotDetails("sunday",table,childArray);
                
                table=document.getElementById("mondayTable");
                numOfSlots+=table.rows.length-2;
                checkInalid|=slotDetails("monday",table,childArray);
               
                table=document.getElementById("tuesdayTable");
                numOfSlots+=table.rows.length-2;
                checkInalid|=slotDetails("tuesday",table,childArray);
                
                table=document.getElementById("wednesdayTable");
                numOfSlots+=table.rows.length-2;
                checkInalid|=slotDetails("wednesday",table,childArray);
                
                table=document.getElementById("thursdayTable");
                numOfSlots+=table.rows.length-2;
                checkInalid|=slotDetails("thursday",table,childArray);
                
                table=document.getElementById("fridayTable");
                numOfSlots+=table.rows.length-2;
                checkInalid|=slotDetails("friday",table,childArray);
               
                table=document.getElementById("saturdayTable");
                numOfSlots+=table.rows.length-2;
                checkInalid|=slotDetails("saturday",table,childArray);
                if(checkInalid)
                    return;
                parentArray.push(childArray);
                $.ajax(
                        {
                            url: 'Create_Slots.php',
                    type: 'post',
                    data: {data:childArray,numOfSlots:numOfSlots},
                    dataType:'text',
                    success: function (response) {
                        alert(response);
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
                        <h1>Sprouts <strong>Education Center</strong></h1>
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
                    <li class="active"><a href="#APublishSchedule" data-toggle="tab">Create Schedule</a></li>
                    <li><a href="#Notifications " data-toggle="tab">Add Announcement</a></li>
                    <li><a href="#ViewSchedule " data-toggle="tab" onclick="DispCenSchedule()">Center's Schedule </a></li>
                    <li><a href="#AViewInstructor" data-toggle="tab" onclick="viewInstructors()">View Instructors</a></li>
                    <li><a href="#AAddInstructor " data-toggle="tab">Add Instructor</a></li>
                    <li><a href="#ARemoveInstructor " data-toggle="tab">Remove Instructor</a></li>
                    <li><a href="#AAddAdministrator " data-toggle="tab">Add Administrator</a></li>
                    <li><a href="#AChangePassword " data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">			
                    <div class="tab-pane fade in active" id="APublishSchedule">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <h2>
                                        <center>Create Schedule</center>
                                    </h2>
                                </div>
                                <table id="sundayTable" >
                                    <tr>
                                        <td><b>Sunday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <table id="mondayTable">
                                    <tr>
                                        <td><b>Monday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <table id="tuesdayTable">
                                    <tr>
                                        <td><b>Tuesday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <table id="wednesdayTable">
                                    <tr>
                                        <td><b>Wednesday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <table id="thursdayTable">
                                    <tr>
                                        <td><b>Thursday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <table id="fridayTable">
                                    <tr>
                                        <td><b>Friday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <table id="saturdayTable">
                                    <tr>
                                        <td><b>Saturday</b></td>
                                    <tr>
                                        <td><button onclick="addRow($(this).closest('table').attr('id'))">Add Slot</button></td>
                                    </tr>
                                </table>
                                <button type="button" onclick="createSchedule()">Create Schedule</button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade"  id="ViewSchedule">
                        <center>
                            <div id="cenSchedule"></div>
                        </center>
                    </div>	
                    <div class="tab-pane fade"  id="Notifications">
                        <div class="form-group">
                            <label for="comment">Announcements:</label>
                            <form action= "PostAnnouncements.php" method="post" role="form">
                                <textarea class="form-control" rows="5" name="notification" id="notification" required></textarea>
                        </div> 
                        <div class="col-md-2 col-sm-2">
                            <input name="submit" type="submit" class="form-control" id="submit" value="Add Announcement">
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="AViewInstructor">
                        <div id="centerSchedule">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h2>
                                            <center>Instructors</center>
                                        </h2>
                                    </div>
                                    <center> 
                                        <div id="Instructors"></div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="AAddInstructor">
                        <!--Add Instructor-->
                        <div id="SignUp">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h2>Add Instructor</h2>
                                    </div>
                                    <form action="Add_Instructor.php" method="post" role="form">
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
                                                <input name="confirmpass" type="password" class="form-control" id="Confirm password" placeholder="Confirm Password" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <h2>Course Information</h2>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input name="course" type="text" class="form-control" id="course" placeholder="Course Name" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input name="discription" type="text" class="form-control" id="discription" placeholder="Course Discription" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input name="max_number" type="text" class="form-control" id="max_number" placeholder="Max Number" required>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <input name="submit" type="submit" class="form-control" id="submit" value="Add">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ARemoveInstructor">
                        <!--Remove Instructor--->
                        <div id="SignUp">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h2>Remove Instructor</h2>
                                    </div>
                                    <form action="Remove_Instructor.php" method="post" role="form">
                                        <div class="col-md-1 col-sm-1"></div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="col-md-10 col-sm-10">
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <input name="submit" type="submit" class="form-control" id="submit" value="Delete">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="AAddAdministrator">
                        
                        <!--Add Administrator-->
                        <div id="SignUp">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h2>Add Administrator</h2>
                                    </div>
                                    <form action="Add_Admin.php" method="post" role="form">
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
                                                <input name="confirmpass" type="password" class="form-control" id="Confirm password" placeholder="Confirm Password" required>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <input name="submit" type="submit" class="form-control" id="submit" value="Add">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="AChangePassword">
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
                                                <input name="newpass" type="password" class="form-control" id="New password" placeholder="New Password" required>
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
