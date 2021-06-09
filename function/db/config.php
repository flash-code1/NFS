<?php

$host = "localhost"; /* Host name */
$user = "nspireco_core"; /* User */
$password = "MceFd8^P%o.;"; /* Password */
$dbname = "nspireco_nspire"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}