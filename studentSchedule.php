<!DOCTYPE html>
<html>
    <head>
       
        <script>
            function unenroll(btn)
            {
                var courseId = btn.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                   $.ajax(
                            {
                                url: 'Unenroll.php',
                                method: 'post',
                                data: { courseId: courseId},
                                success: function (result) {
                                    alert('Student Unenrolled Successfully');
                                },
                                error: function () {
                                    alert('Error');

                                }
                    }
                            );
                        
            }
          
            function viewmaterial()
            {
                var courseId = btn.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                   $.ajax(
                            {
                                url: 'downloadMaterial.php',
                                method: 'post',
                                data: { courseId: courseId},
                                success: function (result) {   
                                },
                                error: function () {
                                    alert('Error');

                                }
                    }
                            );
                        
            }
            function buttonCheck()
            {
            
            }
        
        </script>
    </head>
    <body>
<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();

    $Email = $_SESSION['mail'];
    $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
    $row = mysqli_fetch_array($result);
    $ID = $row[0];

    $sql = "SELECT courses.name,courses.Description, student_schedule.courseID, student_schedule.day, student_schedule.startTime, student_schedule.endTime FROM student_schedule,courses WHERE student_schedule.studentID = $ID AND courses.ID = student_schedule.courseID";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {
            echo "<font size='4'><center><table><tr><th>CourseName</th><th>CourseID</th><th>CourseDescription</th><th>day</th><th>StartTime</th><th>EndTime</th><th>State</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["courseID"]. "</td><td>" . $row["Description"]. "</td><td>" . $row["day"]. "</td><td> " . $row["startTime"]. "</td><td> " . $row["endTime"]. " </td> <td> <button type='button' onclick='unenroll(this)'><u>Unenroll</u></button></td> </tr>";
            }
            echo "</table></center></font>";
    } 
    else {
            echo "0 results";
    }

    $con->close();
    
?>
    
    </body>
</html>
