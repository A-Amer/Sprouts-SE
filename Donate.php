<?php
    include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();
    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tele = $_POST['tele'];
    $date = $_POST['date'];

    $sql = "INSERT INTO donations (donorName,telephone,address,collectionDate) VALUES ('".$name."','".$tele."','".$address."','".$date."');";
    $result = $con->query($sql);
    if ($result)
    {
    echo "<script>
            alert('Thank you for donating');
            window.location.href='index.php';
            </script>";
    }
    else
    {
        "<script>
            alert('An error has ocurred please try again');
            window.location.href='index.php';
            </script>";
    }
?>