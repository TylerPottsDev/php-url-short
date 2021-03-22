<?php
	include '../db.php';

	$db = new Database("localhost", "url_short", "root", "root");
	$db = $db->connect();

	$id = $_GET['c'];

	$query = "SELECT * FROM urls WHERE ID = :ID LIMIT 1";
	$stmt = $db->prepare($query);

	$params = array(
		"ID" => $id
	);

	$stmt->execute($params);

	$url = $stmt->fetch();

	header("location: " . $url['long_url']);