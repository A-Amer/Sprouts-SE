<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
        <script>
            function enroll(btn)
            {
                var courseId = btn.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                var day = btn.parentNode.parentNode.getElementsByTagName('td')[2].innerText;
                var startTime = btn.parentNode.parentNode.getElementsByTagName('td')[3].innerText;
                var endTime = btn.parentNode.parentNode.getElementsByTagName('td')[4].innerText;
            
                var max =  checkIfMaxReached(courseId);
         
                if(max === '1')
                {
                    alert('Class is full');
                }
                if(max === '0')
                {
                    $.ajax(
                            {
                                url: 'Enroll.php',
                        method: 'post',
                        data: { courseId: courseId, day: day, startTime: startTime, endTime: endTime },
                        success: function (result) {
                            alert('Student Enrolled Successfully');
                        },
                        error: function () {
                            alert('Error');
                        
                        }
                    }
                            );
                }         
            }
            
            
            
            
            function buttonCheck()
            {
            
            }
        
            function checkIfMaxReached(courseId)
            {
                var max;
            
                $.ajax(
                        {
                            url: 'getMaxStdNum.php',
                    method: 'post',
                    data: { courseId: courseId},
                    dataType: 'json', 
                    async: false,
                    success: function (result) {
                        max = result.max;
                    },
                    error: function () {
                        alert('Error');
                    
                    
                    }
                }
                        );
                return max;
            
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
            $sql = "SELECT courses.name AS 'CName', center_schedule.courseID, center_schedule.Day, center_schedule.startTime, center_schedule.endTime,  users.name FROM courses,center_schedule,users WHERE courses.id = center_schedule.courseID AND courses.instructorID = users.ID AND center_schedule.open = true;";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>CourseName</th><th>CourseID</th><th>Day</th><th>StartTime</th><th>EndTime</th><th>InstructorName</th><th>Enrollment</th></tr>";
                 // output data of each row
                while($row = $result->fetch_assoc()) {
                    $sql = "SELECT * FROM student_courses WHERE courseID = '".$row["courseID"]."' AND studentID ='".$ID."' ;";
                    $r = $con->query($sql);
                    if(mysqli_affected_rows($con)==0)
                    {
                        echo "<tr><td>" . $row["CName"]. "</td><td>" . $row["courseID"]. "</td><td> " . $row["Day"]. "</td><td> " . $row["startTime"]. " </td><td>" . $row["endTime"]. "</td><td> " . $row["name"]. " </td> <td> <button type='button' onclick='enroll(this)'>Enroll</button></td></tr>";
                    }
                    else 
                    {
                        echo "<tr><td>" . $row["CName"]. "</td><td>" . $row["courseID"]. "</td><td> " . $row["Day"]. "</td><td> " . $row["startTime"]. " </td><td>" . $row["endTime"]. "</td><td> " . $row["name"]. " </td> <td> <button type='button' disabled>Enroll</button></td></tr>";
                    }
                }
                echo "</table>";
            } 
            else 
            {
                echo "0 results";
            }

            $con->close();
            ?>  
    </body>
</html>