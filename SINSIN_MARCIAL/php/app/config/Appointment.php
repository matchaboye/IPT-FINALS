<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once(ROOT_DIR."/php/includes/page-guard.php");  // ensure user is logged in

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and sanitize POST data
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';
    $department = $_POST['department'] ?? '';
    $message = $_POST['message'] ?? '';

    // Basic validation (add more if needed)
    if (!$fullName || !$email || !$phone || !$date || !$department) {
        $error = "Please fill in all required fields.";
    } else {
        try {
            $host = "localhost";
            $database = "aksohospital";
            $dbusername = "root";
            $dbpassword = "";

            $dsn = "mysql:host=$host;dbname=$database;";
            $conn = new PDO($dsn, $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO appointments (fullName, email, phone, date, department, message) VALUES (:fullName, :email, :phone, :date, :department, :message)");
            $stmt->bindParam(':fullName', $fullName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            $success = "Appointment booked successfully!";
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>
