<?php

 include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

session_start();

$Email=$_SESSION['mail'];
$ann=$_POST['announcement'];
$result =mysqli_query($con, "select users.Id from users where email='".$Email."' ;");
$row = mysqli_fetch_array ($result);
$id=$row[0];
$sql=mysqli_query($con,"INSERT INTO announcements(description,adminID) VALUES ('".$ann."','".$id."');");

if($sql)
{
		echo "<script>
		alert('Announcement is posted successfully');
		window.location.href='admin.php';
		</script>";
}
else
{
	echo "<script>
		alert('Announcement failed to be posted');
		window.location.href='admin.php';
		</script>";
}
$con->close();



?>
