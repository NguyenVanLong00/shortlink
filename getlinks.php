<?php
require_once('./_private/bundle.php');


$query = $DB->query("SELECT * FROM `links` WHERE user_id =" . $_loggedIn["id"]);

$json = [];
while ($get = $query->fetch_assoc()) {
    array_push($json, $get);
}


header('Content-type: application/json');
echo json_encode($json);