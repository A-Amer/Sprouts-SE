<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    session_start();

    $Email = $_SESSION['mail'];
    
    $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
    $row = mysqli_fetch_array($result);
    $ID = $row[0];

    $sql = "SELECT Date(materials.date) as date,materials.description as description,materials.filepath as filepath,materials.filename as filename ,courses.name as name FROM materials,courses,users,student_schedule WHERE users.id=student_schedule.studentID and student_schedule.courseID = courses.ID and materials.courseId = courses.ID and users.id = '".$ID."' order by materials.date desc;";
     $result = $con->query($sql);
    if ($result->num_rows > 0) {
            echo "<font size='4'><center><table><tr><th>Date</th><th>CourseName</th><th>Description</th><th>File</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["date"]. "</td><td>" . $row["name"]. "</td><td>" . $row["description"]. "</td> <td><a href='".$row["filepath"]."'>".$row["filename"]."</a> </td> </tr>";
            }
            echo "</table></center></font>";
    } 
    else {
            echo "0 results";
    }
 
?>