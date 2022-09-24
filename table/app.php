<?php
include('../config.php');

mysqli_report(MYSQLI_REPORT_STRICT);
//1
// Create table DOT


$sql="ALTER TABLE users ADD avatar VARCHAR(500) NOT NULL DEFAULT '0'";

// Execute query
if (mysqli_query($con,$sql)){
    echo "OK";
}
else{
    echo "NOOOO<br />" . mysqli_error($con);
}


$sql="ALTER TABLE users ADD username VARCHAR(255) NOT NULL DEFAULT '0'";

// Execute query
if (mysqli_query($con,$sql)){
    echo "OK";
}
else{
    echo "NOOOO<br />" . mysqli_error($con);
}





//////////// Create table
$sql="CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
privetid VARCHAR(225),
publicid VARCHAR(225),
pass VARCHAR(225),
lastactivity VARCHAR(250) NOT NULL DEFAULT '0',
tdate VARCHAR(250),
tstatus INT(11)NOT NULL DEFAULT '0')";

// Execute query
if (mysqli_query($con,$sql)){
    echo "users OK";
}
else{
    echo "به دلیل مشکل زیر، پایگاه داده ساخته نشد : <br />" . mysqli_error($con);
}




//////////// Create table
$sql="CREATE TABLE friends(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
sender VARCHAR(225),
reciver VARCHAR(225),

tdate VARCHAR(250),
tstatus INT(11)NOT NULL DEFAULT '0')";

// Execute query
if (mysqli_query($con,$sql)){
    echo "users OK";
}
else{
    echo "به دلیل مشکل زیر، پایگاه داده ساخته نشد : <br />" . mysqli_error($con);
}


//////////// Create table
$sql="CREATE TABLE mes(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
sender VARCHAR(225),
reciver VARCHAR(225),
textmes VARCHAR(900),

tdate VARCHAR(250),
tstatus INT(11)NOT NULL DEFAULT '0')";

// Execute query
if (mysqli_query($con,$sql)){
    echo "users OK";
}
else{
    echo "به دلیل مشکل زیر، پایگاه داده ساخته نشد : <br />" . mysqli_error($con);
}


?>