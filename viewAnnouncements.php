
<?php

 include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

$sql = "SELECT Date(Date) as Date,description FROM announcements ORDER BY Date DESC";
$result2 = mysqli_query($con,$sql);


if ($result2->num_rows > 0) {
     echo '<font size="4"><table><tr><th>Date</th><th>Announcement</th></tr>';
     // output data of each row
     while($row = $result2->fetch_assoc()) {
         echo '<tr><td>' . $row["Date"]. '</td><td>' . $row["description"]. '</td> </tr>';
	 }
     echo "</table></font>";
} 
else {
     echo "0 results";
}

$con->close();
?>
