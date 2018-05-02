<?php
include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    session_start();
    $desc = $_POST['desc'];
    $Email = $_SESSION['mail'];
   
    $result = mysqli_query($con,"SELECT ID FROM users WHERE email = '".$Email."';");
    $row = mysqli_fetch_array($result);
    $ID = $row[0];
    
    $result = mysqli_query($con,"SELECT ID FROM courses WHERE instructorID = '".$ID."';");
    $row = mysqli_fetch_array($result);
    $cid = $row[0];
    
if (isset($_FILES['fileToUpload']['name'])) {
$target_dir = "D:/xampp/htdocs/Sprouts/uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$temp=$_FILES['fileToUpload']['tmp_name'];
$file_path="uploads/". basename($_FILES['fileToUpload']['name']);

        if  (move_uploaded_file($temp, $target_file)){
            $sql = "insert into materials (description,filename,filepath,courseId) values ( '".$desc."' ,'".basename($_FILES['fileToUpload']['name'])."' , '".$file_path."' , '".$cid."');";
            $result = $con->query($sql);
            echo "<script>
            alert('File uploaded successfully');
            window.location.href='instructor.php';
            </script>";
        }
        else{
            echo "<script>
            alert('File uploading failed');
            window.location.href='instructor.php';
            </script>";
        }
}

?>
