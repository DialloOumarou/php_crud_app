<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="crud2";


//create a connection using mysql_i
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connecion failed: ".mysqli_connect_error());
}