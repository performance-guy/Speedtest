<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "speed";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}
function getWebsiteData($id)
{
    $con = OpenCon();
    $sql = mysqli_query($con, "SELECT * FROM website_test where ID = '$id'");

    while ($row = mysqli_fetch_array($sql)) {
        $names[] = $row[2];
        $a = $row['ID'];
    }
    $a =$names;
    //asf
}
