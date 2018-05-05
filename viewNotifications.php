
<?php

 include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    
session_start();
$Email=$_SESSION['mail'];
$result =mysqli_query($con, "select users.Id from users where email='".$Email."' ;");
$row = mysqli_fetch_array ($result);
$id=$row[0];

$sql = "SELECT Date(Date) as Date,notifications.description as description,courses.name as name FROM notifications,courses,student_schedule where student_schedule.studentID = '".$id."' and student_schedule.courseID = notifications.courseID and courses.ID=notifications.courseID  ORDER BY Date DESC";
$result2 = mysqli_query($con,$sql);


if ($result2->num_rows > 0) {
     echo '<font size="4"><center><table><tr><th>Date</th><th>Course</th><th>Notifications</th></tr>';
     // output data of each row
     while($row = $result2->fetch_assoc()) {
         echo '<tr><td>' . $row["Date"]. '</td><td>' . $row["name"]. '</td><td>' . $row["description"]. '</td> </tr>';
	 }
     echo "</table></center></font>";
} 
else {
     echo "0 results";
}

$con->close();
?>
