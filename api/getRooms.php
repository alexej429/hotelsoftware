<?php
// load rooms from db
require_once("../classes/DBHelper.php");
$dbh = new DBHelper();
echo json_encode($dbh->getRooms());
?>