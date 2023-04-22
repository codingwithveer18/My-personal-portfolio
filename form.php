<?php
// Connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select database and collection
$database = $mongoClient->formcontent;
$collection = $database->Documents;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Create document to insert
    $document = [
        'name' => $name,
        'email' => $email,
    ];

    // Insert document
    $result = $collection->insertOne($document);

    // Redirect to thank you page
    header('Location: thank-you.php');
    exit;
}
?>
