<?php
require_once("../classes/DBHelper.php");
$dbh = new DBHelper();
$data = json_decode($_POST["data"], true);
$dbh->updateSPAhumidity($data["humidity"]);
?>