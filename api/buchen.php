<?php
require_once("../classes/DBHelper.php");
$dbh = new DBHelper();

$data = json_decode($_POST["data"], true);
var_dump($data["totalPrice"]);
$dbh->addBooking($data);
?>