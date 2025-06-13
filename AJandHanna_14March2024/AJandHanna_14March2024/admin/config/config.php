<?php

$dbsetupx="";//LIVE OR DEV
$currenthost = strtoupper($_SERVER['HTTP_HOST']);

if (strpos($currenthost, 'THEWEDDINGDAYSTORY.COM') !== false) {
    $dbsetupx = "LIVE";
}else{
     $dbsetupx = "DEV";
}


if ($dbsetupx == "DEV"){
    ////For Localhost: Enable This
    $databaseHost = 'localhost';
    $databaseName = 'myweddingdaystory_multiuser_db';
    $databaseUsername = 'root';
    $databasePassword = '';
}
else{
    ////For Online Database Use this
    $databaseHost = '127.0.0.1';
    $databaseName = 'myweddingdaystory_multiuser_db';
    $databaseUsername = 'myweddingdayuser';
    $databasePassword = '1nc0rr3ct57.';
}


$conn = mysql_connect($databaseHost, $databaseUsername, $databasePassword);
if(!$conn)
{
    die("Could not connect: " . mysql_error());
}

$db = mysql_select_db($databaseName, $conn);
if(!$db)
{
    die("Could not select database: " . mysql_error());
}
?>