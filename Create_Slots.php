<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();

    $data=$_POST['data'];//array of slots
    //no. of slots in each day 
    $sunday=$_POST['sundayRows'];
    $monday=$_POST['mondayRows'];
    $tuesday=$_POST['tuesdayRows'];
    $wednesday=$_POST['wednesdayRows'];
    $thursday=$_POST['thursdayRows'];
    $friday=$_POST['fridayRows'];
    $saturday=$_POST['saturdayRows'];
    $j=0;
    if($sunday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $sunday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    if($monday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $monday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    if($tuesday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $tuesday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    if($wednesday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $wednesday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    if($thursday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $thursday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    if($friday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $friday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    if($saturday>0)
    {
            $day=$data[$j];
            $j=$j+1;
                    for( $i = 0; $i < $saturday ; $i++ )
                    {
                            $start_time=$data[$j];
                            $j=$j+1;
                            $end_time=$data[$j];
                            $j=$j+1;
                            $course_name=$data[$j];
                            $j=$j+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo 'The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo 'Slot is not inserted in the center schedule';
                                    else echo 'Slot is inserted in the center schedulr successfully';
                            }
                    }
    }
    $con->close();
?>
