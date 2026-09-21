<?php

$url = "http://localhost/nestnotes/backend/listings.php";

$response = file_get_contents($url);

echo $response;

?>