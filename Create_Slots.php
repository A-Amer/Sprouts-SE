<?php
    function insertSlot($numOfSlots,&$index,$data,$con){
            
            for( $i = 0; $i < $numOfSlots ; $i++ )
                {           $day=$data[$index];
                            $index=$index+1;
                            $start_time=$data[$index];
                            $index=$index+1;
                            $end_time=$data[$index];
                            $index=$index+1;
                            $course_name=$data[$index];
                            $index=$index+1;
                            $result=mysqli_query($con,"SELECT ID FROM courses WHERE name='".$course_name."';");
                            if(!$result) echo ($i+1).'-The Course does not exists';
                            else
                            {
                                    $course_id=mysqli_fetch_array($result)[0];
                                    $result=mysqli_query($con,"SELECT `startTime`,`endTime` FROM center_schedule WHERE courseID=".$course_id." AND day='".$day."';");
                                    if($result)
                                    {
                                         while($courseTimes=mysqli_fetch_row($result)) 
                                        {
                                        if(($start_time<$courseTimes[1]&&$start_time>$courseTimes[0])||($end_time<$courseTimes[1]&&$end_time>$courseTimes[0]))
                                            {
                                                echo ($i+1).'-Slot overlaps another slot';
                                                return;
                                            }
                                        }
                            
                                    }
                                    $result=mysqli_query($con,"INSERT INTO center_schedule VALUES ('".$course_id."','".$day."','".$start_time."','".$end_time."','1');");
                                    if(!$result) echo ($i+1).'-Slot overlaps another slot';
                                    else echo ($i+1).'-Slot is inserted in the schedule successfully';
                            }
                }
    }
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    session_start();
    $data=$_POST['data'];//array of slots
    $j=0;
    if($_POST['numOfSlots']>0){
        insertSlot($_POST['numOfSlots'],$j,$data,$con);
    }
    $con->close();
?>
