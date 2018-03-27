<?php
include 'conn.php';
$instance = conn::getInstance();
$con = $instance->getConnection();

session_start();
$Email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];


$query = mysqli_query($con,"SELECT * FROM users where email = '".$Email."' AND password = '".$password."';") ;
$row = mysqli_fetch_array($query); 
$query2 = mysqli_query($con,"SELECT privilage FROM users where email = '".$Email."' AND password = '".$password."';") ;	
$Privilage = mysqli_fetch_array($query2);
$name=mysqli_query($con,"SELECT name FROM users WHERE email = '".$Email."' AND password= '".$password."';");
$username=mysqli_fetch_array($name);		
if (!empty($row)){
	if($Privilage[0] == 2 ){
		
		 $_SESSION['mail'] = $Email;
		$_SESSION['username']=$username[0];
		header("Location: Student.php");		
	}
	if($Privilage[0] == 1 ){
		$_SESSION['mail'] = $Email;
		$_SESSION['username']=$username[0];
		 header("Location: instructor.php");
	}
	 if($Privilage[0] == 0 ){
		  $_SESSION['mail'] = $Email;
		  $_SESSION['username']=$username[0];
		 header("Location: admin.php");
	 }
}else{
			echo "<script>
	alert('Invalid email or password');
    window.location.href='index.php';
</script>";
}

$con->close();

?>