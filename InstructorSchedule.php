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

            session_start();

            $Email = $_SESSION['mail'];
            $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
            $row = mysqli_fetch_array($result);
            $ID = $row[0];


            $sql = "SELECT courses.name, center_schedule.day, center_schedule.startTime, center_schedule.endTime FROM center_schedule,courses WHERE courses.instructorID = $ID AND courses.ID = center_schedule.courseID";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>CourseName</th><th>day</th><th>StartTime</th><th>EndTime</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["day"]. "</td><td> " . $row["startTime"]. "</td><td> " . $row["endTime"]. " </td> </tr>";
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