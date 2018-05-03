<?php

 include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

session_start();

$Email=$_SESSION['mail'];
$des=$_POST['notification'];

$result =mysqli_query($con, "select users.Id from users where email='".$Email."' ;");
$row = mysqli_fetch_array ($result);
$id=$row[0];

$courseid=mysqli_query($con,"SELECT ID FROM courses WHERE instructorID='".$id."';");
$row = mysqli_fetch_array ($courseid);
$courseid=$row[0];

$sql=mysqli_query($con,"INSERT INTO notifications(description,instructorID,courseID) VALUES ('".$des."','".$id."','".$courseid."');");

if($sql)
{
		echo "<script>
		alert('Notification is sent successfully');
		window.location.href='instructor.php';
		</script>";
}
else
{
	echo "<script>
		alert('Notification is failed to be sent');
		window.location.href='instructor.php';
		</script>";
}
$con->close();

?>
