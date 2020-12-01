<?php

$host = "localhost"; /* Host name */
$user = "anchorbn_anchorbn"; /* User */
$password = "}@Ym-ac=CS2="; /* Password */
$dbname = "nspire_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}