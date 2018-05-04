<?php
    error_reporting(0);
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    session_start();
    $desc = $_POST['desc'];
    $Email = $_SESSION['mail'];
   
    $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
    $row = mysqli_fetch_array($result);
    $ID = $row[0];
    
    $sql = "Update courses set Description = '".$desc."' where instructorID = '".$ID."' ;";
    $result = $con->query($sql);
    if($result)
    {

            echo "<script>
            alert('Description Updated successfully');
            window.location.href='instructor.php';
            </script>";
    }
    else
    {

            echo "<script>
            alert('Description failed to Update');
            window.location.href='instructor.php';
            </script>";
    }
?>