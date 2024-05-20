<?php
$con = mysqli_connect('localhost', 'root', '', 'myproject');
//check connection
if ($con->connect_error) {
    die("Connection failed :" . $con->connect_error);
}
