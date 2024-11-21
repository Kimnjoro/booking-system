<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kenyattaversity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the query to select all rows
$sql = "SELECT boardroom_name, building_name, location, capacity FROM boardroom";

// Execute the query
$result = $conn->query($sql);

// Initialize an empty array to store the data
$data = array();

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Fetch data for each row
    while ($row = $result->fetch_assoc()) {
        $building_name = $row['building_name'];
        // Group by building_name
        if (!isset($data[$building_name])) {
            $data[$building_name] = array();
        }
        $data[$building_name][] = $row;
    }
} else {
    echo json_encode(["message" => "No results found."]);
    exit;
}

// Close the connection
$conn->close();

// Convert the array to JSON
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Set the content type to application/json
header('Content-Type: application/json');

// Output the JSON data
echo $json_data;
?>