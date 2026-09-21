<?php

$url = "http://localhost/nestnotes/backend/listings.php";

$data = [
    "title" => "2BHK Flat Near Manyata Tech Park",
    "description" => "Spacious flat suitable for students and working professionals.",
    "location" => "Nagawara, Bangalore",
    "rent" => 12000
];

$options = [
    "http" => [
        "method" => "POST",
        "header" => "Content-Type: application/json",
        "content" => json_encode($data),
        "ignore_errors" => true
    ]
];

$context = stream_context_create($options);

$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo "API request failed";
} else {
    echo $response;
}

?>