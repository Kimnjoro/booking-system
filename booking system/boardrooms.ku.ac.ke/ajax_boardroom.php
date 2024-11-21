<?php
// Include database connection details
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

// Check if location_id is set (for fetching boardrooms)
if (isset($_POST['building_id'])) {
    $location_id = $_POST['building_id'];
    
    // Initialize an array to store boardrooms
    $boardrooms = [];
    
    // Fetch boardrooms for the selected building
    $sql = "SELECT id, name FROM boardrooms WHERE building_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $building_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch results and add to boardrooms array
    while ($row = $result->fetch_assoc()) {
        $boardrooms[] = $row;
    }
    
    // Close statement
    $stmt->close();
    
    // Return JSON response
    echo json_encode($boardrooms);
} else {
    // If location_id is not set or invalid, return an empty array
    echo json_encode([]);
}

// Close database connection
$conn->close();
?>
