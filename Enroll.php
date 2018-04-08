<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();

    $courseID = $_POST['courseId'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    echo $courseID;
    echo $day;
    echo $startTime;
    echo $endTime;


    $Email = $_SESSION['mail'];
    echo $Email;
    $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
    $row = mysqli_fetch_array($result);
    $ID = $row[0];
    $sql = "INSERT INTO student_schedule (studentID, courseID,day,startTime,endTime) VALUES ('".$ID."','".$courseID."','".$day."','".$startTime."','".$endTime."');";
    $result = $con->query($sql);
?>