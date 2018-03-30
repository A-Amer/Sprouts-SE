<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

    $name = $_POST['name'];
    $Email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass=$_POST['confirmpass'];
    $Cname=$_POST['course'];
    $Cdiscription=$_POST['discription'];
    $Cmaxnumber=$_POST['max_number'];
    if($confirmpass!=$password)
    {
            echo "<script>
            alert('The Passwords does not match');
            window.location.href='admin.php';
            </script>";
    }
    else
    {
                    //course_information checks
                    if($Cmaxnumber>100)
                    {
                            echo "<script>
                            alert('The maximum number of any room not exceeds 100 students');
                            window.location.href='admin.php';
                            </script>";
                    }
                    else if($Cmaxnumber<10)
                    {
                            echo "<script>
                            alert('The Minimum  number of any room must exceeds than 10 students');
                            window.location.href='admin.php';
                            </script>";
                    }
                    else if($Cdiscription=="")
                    {
                            echo "<script>
                            alert('Please enter a valid discription');
                            window.location.href='admin.php';
                            </script>";
                    }
                    else 
                    {
                            $result = mysqli_query($con,"INSERT INTO users(email, password, name, privilage) VALUES ('".$Email."','".$password."','".$name."',1);" );
                            if(!$result)	
                            {
                                    echo "<script>
                                    alert('The Email is already exists');
                                    window.location.href='admin.php';
                                    </script>";
                            }
                            else
                            {
                                    $result=mysqli_query($con,"SELECT Id FROM users WHERE email = '".$Email."';");
                                    $row = mysqli_fetch_row($result);
                                    $Instructor_id=$row[0];
                                    $result = mysqli_query($con,"INSERT INTO courses(name,Description,instructorID,maxNumber) VALUES ('".$Cname."','".$Cdiscription."','".$Instructor_id."','".$Cmaxnumber."');");
                                    if(!$result)
                                    {
                                            echo "<script>
                                            alert('The instructor is failed to be inserted');
                                            window.location.href='admin.php';
                                            </script>";
                                    }
                                    else
                                    {
                                            echo "<script>
                                            alert('The instructor is inserted successfully');
                                            window.location.href='admin.php';
                                            </script>";
                                    }
                            }

                    }
    }
    $con->close();
    
?>