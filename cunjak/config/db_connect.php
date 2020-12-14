<?php 

//connect to database
$conn = mysqli_connect('localhost', 'moderator', 'test1234', 'bibliotekaa');

// check connection
if (!$conn){
echo 'Connection Error: ' . mysqli_connect_error();
} 

?>