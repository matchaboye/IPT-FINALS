<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: /login.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid doctor ID.");
}

$doctor_id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM doctors WHERE doctor_id = ?");
$stmt->bind_param("i", $doctor_id);
$stmt->execute();

header("Location: /admin/admin_dashboard.php?msg=doctor_deleted");
exit;
