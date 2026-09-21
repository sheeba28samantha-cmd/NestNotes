<?php

$url = "http://localhost/nestnotes/backend/listings.php";


// ---------- GET TEST ----------

$response = file_get_contents($url);

if ($response === false) {
    echo "GET TEST FAILED\n";
} else {

    $data = json_decode($response, true);

    if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
        echo "GET TEST PASSED\n";
        echo "Listings found: " . count($data) . "\n";
    } else {
        echo "GET TEST FAILED\n";
    }
}


// ---------- POST TEST ----------

$postData = [
    "title" => "Test Listing",
    "description" => "This listing is created for API testing.",
    "location" => "Bangalore",
    "rent" => 10000
];

$options = [
    "http" => [
        "method" => "POST",
        "header" => "Content-Type: application/json",
        "content" => json_encode($postData),
        "ignore_errors" => true
    ]
];

$context = stream_context_create($options);

$postResponse = file_get_contents($url, false, $context);

if ($postResponse === false) {
    echo "POST TEST FAILED\n";
} else {

    $postResult = json_decode($postResponse, true);

    if (
        json_last_error() === JSON_ERROR_NONE &&
        isset($postResult["id"])
    ) {
        echo "POST TEST PASSED\n";
        echo "Created listing ID: " . $postResult["id"] . "\n";
    } else {
        echo "POST TEST FAILED\n";
    }
}

?>