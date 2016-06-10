<?php
$dbUser = "root";
$dbPass = "";
$dbHost = "localhost";
$dbDatabase = "test1";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);

if(!$dbConn) {
    die ("Database not connected");
}

function isLoggedIn() {
    global $dbConn;
    $sessId = mysqli_real_escape_string($dbconn, session_id());
    
    $sql = "SELECT id, role FROM a1_active_users WHERE session_id=".$sessId." AND expires > " .time() ;
    $result = mysqli_query($dbConn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $expires = time() + (60*30); //set time to expire session after 30 minutes
        $sessData = mysqli_fetch_assoc($result);
        $sql = "UPDATE a1_active_users SET expires = " .$expires. " WHERE user_id = " .$sessData['id'];
        $result = mysqli_query($dbConn, $sql);
        if ($result) {
            return $sessData['role'];
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>