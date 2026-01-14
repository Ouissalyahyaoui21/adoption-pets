<?php

$conn = new mysqli("localhost", "root", "", "pet");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$personName   = $_POST['personName'] ?? '';
$email        = $_POST['email'] ?? '';
$animalName   = $_POST['animalName'] ?? '';
$animalType   = $_POST['animalType'] ?? '';
$age          = ($_POST['age'] !== '') ? (int)$_POST['age'] : null;
$healthStatus = $_POST['healthStatus'] ?? '';
$friendly     = $_POST['friendly'] ?? '';
$urgent       = $_POST['urgent'] ?? '';
$foundDate    = $_POST['foundDate'] ?? null;
$size         = $_POST['size'] ?? '';
$location     = $_POST['location'] ?? '';
$notes        = $_POST['notes'] ?? '';
$imagePath    = '';


if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $filename = time() . '_' . basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = $targetFile;
    }
}


$dataFile = 'animals.json';
$allData = [];

if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $allData = json_decode($json, true) ?? [];
}

$allData[] = [
    'personName'   => $personName,
    'email'        => $email,
    'animalName'   => $animalName,
    'animalType'   => $animalType,
    'age'          => $age,
    'healthStatus' => $healthStatus,
    'friendly'     => $friendly,
    'urgent'       => $urgent,
    'foundDate'    => $foundDate,
    'size'         => $size,
    'location'     => $location,
    'notes'        => $notes,
    'image'        => $imagePath
];

file_put_contents($dataFile, json_encode($allData, JSON_PRETTY_PRINT));


$sql = "INSERT INTO found_animals
(person_name, email, animal_name, animal_type, age, health_status, friendly, urgent, found_date, size, location, notes, image)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssissssssss",
    $personName,
    $email,
    $animalName,
    $animalType,
    $age,
    $healthStatus,
    $friendly,
    $urgent,
    $foundDate,
    $size,
    $location,
    $notes,
    $imagePath
);

$stmt->execute();
$stmt->close();
$conn->close();

echo "🎉 Thank you <strong>$personName</strong> for adding <strong>$animalName</strong> ($animalType)! 🐾";

?>
