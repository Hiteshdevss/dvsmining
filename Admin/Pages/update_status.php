<?php
$servername = "localhost";
$username = "u345348146_DVSMining";
$password = "Hitesh1100@";
$dbname = "u345348146_DVSMining";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed']));
}

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE applications SET status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update status']);
}

$stmt->close();
$conn->close();
?>
