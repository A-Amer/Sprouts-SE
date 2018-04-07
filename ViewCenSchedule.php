<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    
    </head>
    <body>
<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    $sql = "SELECT courses.name AS 'CName', center_schedule.courseID, center_schedule.Day, center_schedule.startTime, center_schedule.endTime,  users.name, courses.price FROM courses,center_schedule,users WHERE courses.id = center_schedule.courseID AND courses.instructorID = users.ID AND center_schedule.open = true;";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {
            echo "<table><tr><th>CourseName</th><th>CourseID</th><th>Day</th><th>StartTime</th><th>EndTime</th><th>InstructorName</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["CName"]. "</td><td>" . $row["courseID"]. "</td><td> " . $row["Day"]. "</td><td> " . $row["startTime"]. " </td><td>" . $row["endTime"]. "</td><td> " . $row["name"]. " </td></tr>";
            }
            echo "</table>";
    } 
    else {
            echo "0 results";
    }

    $con->close();
?>  
    </body>
</html>