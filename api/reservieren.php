<?php
require_once("../classes/DBHelper.php");
$dbh = new DBHelper();

$jsonArr = json_decode($_POST["data"], true);
$dbh->addReservation($jsonArr);

?>