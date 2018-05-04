<?php
    error_reporting(0);
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    $desc = $_POST['desc'];
    $classId = $_POST['classid'];

    $sql = "Update courses set Description = '".$desc."' where ID = '".$classId."' ;";
    $result = $con->query($sql);
    if(mysqli_affected_rows($con)>0)
    {

            echo "<script>
            alert('Description Updated successfully');
            window.location.href='admin.php';
            </script>";
    }
    else
    {

            echo "<script>
            alert('Description failed to Update');
            window.location.href='admin.php';
            </script>";
    }
?>