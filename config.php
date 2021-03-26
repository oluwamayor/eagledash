<?php

session_start();

$host = "localhost"; /* Host name */
$user = "eaglhwox_user"; /* User */
$password = ";e3k..6-#63_"; /* Password */
$dbname = "eaglhwox_datas"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
