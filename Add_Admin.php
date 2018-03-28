<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    $name = $_POST['name'];
    $Email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass=$_POST['confirmpass'];

    if($confirmpass!=$password)
    {
            echo "<script>
            alert('The Passwords does not match');
            window.location.href='admin.php';
            </script>";
    }
    else
    {
            $result = mysqli_query($con,"INSERT INTO users(email, password, name, privilage) VALUES ('".$Email."','".$password."','".$name."',0);" );
            if(!$result)	
            {
                    echo "<script>
                    alert('The Email is already exists');
                    window.location.href='admin.php';
                    </script>";
            }
            else 
            {
                    echo "<script>
                    alert('The Admin is added successfully');
                    window.location.href='admin.php';
                    </script>";
            }
    }
    $con->close();

?>