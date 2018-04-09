<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();

    $Email = $_SESSION['mail'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confirmpass=$_POST['confirmpass'];
    $result = mysqli_query($con,"SELECT privilage FROM users WHERE email='".$Email."';");
    $privilage = "instructor.php";
    $r = mysqli_fetch_row($result); 
    if ($r[0]==0)
    {
        $privilage = "admin.php";
    }
    else if ($r[0]==2) 
    {
        $privilage = "student.php";
    }
  
    if($confirmpass!=$newpass)
    {
            echo "<script>
            alert('The Passwords does not match');
            window.location.href='".$privilage."';
            </script>";
    }
    else
    {
            $result = mysqli_query($con,"SELECT password FROM users WHERE email='".$Email."';");
            if(!$result)
            {
                    echo "<script>
                    alert('The Email does not Exist');
                    window.location.href='".$privilage."';
                    </script>";
            }
            else if ($oldpass!=mysqli_fetch_row($result)[0])
            {

                    echo "<script>
                    alert('Incorrect password');
                    window.location.href='".$privilage."';
                    </script>";
            }
            else 
            {
                    $result = mysqli_query($con,"UPDATE users SET password = '".$newpass."'  where email = '".$Email."' AND password = '".$oldpass."';");
                    if($result)
                    {

                            echo "<script>
                            alert('The Password changed successfully');
                            window.location.href='".$privilage."';
                            </script>";
                    }
                    else
                    {

                            echo "<script>
                            alert('The Password failed to change');
                            window.location.href='".$privilage."';
                            </script>";
                    }
            }
    }

    $con->close();
?>