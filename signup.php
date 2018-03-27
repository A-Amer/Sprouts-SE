<?php
include 'conn.php';
$instance = conn::getInstance();
$con = $instance->getConnection();

$name = $_POST['name'];
$Email = $_POST['email'];
$password = $_POST['password'];
$confirmpass=$_POST['confirmpassword'];
if($password == $confirmpass)
{
$sql= "INSERT INTO users(email, password, name, privilage) VALUES ('".$Email."','".$password."','".$name."',2);" ;
$result = $con->query($sql);
if($result)
{
echo "<script>
		alert('You Signed Up Successfully');
		window.location.href='index.php';
		</script>";
}
else 
{
echo "<script>
		alert('Email is already exists');
		window.location.href='index.php';
		</script>";	
}

}

else
{
	echo "<script>
		alert('Passwords does not match');
		window.location.href='index.php';
		</script>";
}	
$con->close();

?>