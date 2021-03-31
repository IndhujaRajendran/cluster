<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'ls-368e16b6922a409f3c8f6c38fa4222ae912f9d6d.ct5zdyhxsqlg.ap-south-1.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '12345678');
define('DB_NAME', 'inspirecloud');

/* Attempt to connect to MySQL database */
$link = mysqli_connect('ls-368e16b6922a409f3c8f6c38fa4222ae912f9d6d.ct5zdyhxsqlg.ap-south-1.rds.amazonaws.com', 'admin','12345678' , 'inspirecloud' );

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>


