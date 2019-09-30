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
    $data[] = "";
    while ($row = mysqli_fetch_array($sql)) {
        $data["f_cache"] = $row['F_Cache'];
        $data["f_load_time"] = $row['F_Load_Time'];
        $data["f_render_time"] = $row['F_Render_Time'];
        $data["f_page_size"] = $row['F_Page_Size'];
        $data["f_request"] = $row['F_Request'];
        $data["r_cache"] = $row['R_Cache'];
        $data["r_load_time"] = $row['R_Load_Time'];
        $data["r_render_time"] = $row['R_Render_Time'];
        $data["r_page_size"] = $row['R_Page_Size'];
        $data["r_request"] = $row['R_Request'];
    }

    return $data;
    //asf
}
