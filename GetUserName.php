<html>
    <head>
    </head>
    <body>
    
        <?php
            include 'conn.php';
            $instance = conn::getInstance();
            $con = $instance->getConnection();

            session_start();

            $Email = $_SESSION['mail'];


            $result = mysqli_query($con,"SELECT name FROM users WHERE email = '".$Email."';");

            $row = mysqli_fetch_array($result);
            $name = $row[0];

            echo $name;

            $con->close();
        ?>
    
    </body>
</html>