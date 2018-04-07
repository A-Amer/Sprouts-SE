<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    session_start();

    $Email = $_SESSION['mail'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confirmpass=$_POST['confirmpass'];
    if($confirmpass!=$newpass)
    {
            echo "<script>
            alert('The Passwords does not match');
            window.location.href='admin.php';
            </script>";
    }
    else
    {
            $result = mysqli_query($con,"SELECT password FROM users WHERE email='".$Email."' and privilage ='2';");
            ////$result = $con->query($sql);
            if(!$result)
            {
                    echo "<script>
                    alert('The Email does not Exist');
                    window.location.href='student.php';
                    </script>";
            }
            else if ($oldpass!=mysqli_fetch_row($result)[0])
            {
                    echo "<script>
                    alert('Incorrect password');
                    window.location.href='student.php';
                    </script>";
            }
            else 
            {
                    $result = mysqli_query($con,"UPDATE users SET password = '".$newpass."'  where email = '".$Email."' AND password = '".$oldpass."';");
                    if($result)
                    {

                            echo "<script>
                            alert('The Password changed successfully');
                            window.location.href='student.php';
                            </script>";
                    }
                    else
                    {

                            echo "<script>
                            alert('The Password failed to change');
                            window.location.href='student.php';
                            </script>";
                    }
            }
    }
    $con->close();
?>