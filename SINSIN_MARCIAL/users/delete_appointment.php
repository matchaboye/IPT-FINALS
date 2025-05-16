<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid appointment ID.");
}

$appointment_id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM appointments WHERE appointment_id = ? AND user_id = ?");
$stmt->bind_param("ii", $appointment_id, $user_id);
$stmt->execute();

header("Location: user_portal.php?msg=deleted");
exit;
