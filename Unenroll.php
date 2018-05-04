<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();

    $courseID = $_POST['courseId'];
    $Email = $_SESSION['mail'];
    echo $Email;
    $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
    $row = mysqli_fetch_array($result);
    $ID = $row[0];
    $sql = "Delete From student_schedule where studentID = '".$ID."'and courseID = '".$courseID."';";
    $result = $con->query($sql);
?>