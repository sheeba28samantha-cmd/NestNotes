<?php

require_once "db.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $sql = "SELECT * FROM listings ORDER BY id DESC";
    $result = $conn->query($sql);

    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    echo json_encode($listings);

} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $title = $data["title"] ?? "";
    $description = $data["description"] ?? "";
    $location = $data["location"] ?? "";
    $rent = $data["rent"] ?? 0;

    $stmt = $conn->prepare(
        "INSERT INTO listings (title, description, location, rent)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("sssd", $title, $description, $location, $rent);

    if ($stmt->execute()) {
        echo json_encode([
            "message" => "Listing created successfully",
            "id" => $stmt->insert_id
        ]);
    } else {
        echo json_encode([
            "error" => "Failed to create listing"
        ]);
    }

    $stmt->close();

} else {

    http_response_code(405);

    echo json_encode([
        "error" => "Method not allowed"
    ]);
}

$conn->close();

?>