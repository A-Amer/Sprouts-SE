<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();
    $courseID = $_POST['courseId'];
    $result = array();

    $result1 = mysqli_query($con,"SELECT COUNT(*) FROM student_schedule WHERE student_schedule.courseID = $courseID;");
    $row1 = mysqli_fetch_array($result1);
    $num = $row1[0];

    $result2 = mysqli_query($con,"SELECT maxNumber FROM courses WHERE ID =  $courseID ;");
    $row2 = mysqli_fetch_array($result2);
    $max = $row2[0];

    if ($num >= $max){	
            $result['max'] = '1';

    }
    else{
            $result['max'] = '0';
    }

    echo json_encode($result);
?>