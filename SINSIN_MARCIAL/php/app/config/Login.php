<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? '');
    $password = $_POST["password"] ?? '';

    $host = "localhost";
    $dbname = "aksohospital";
    $dbuser = "root";
    $dbpass = "";

    $dsn = "mysql:host=$host;dbname=$dbname";

    try {
        $conn = new PDO($dsn, $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Check doctor table only
        $stmt = $conn->prepare("SELECT * FROM doctor WHERE username = ?");
        $stmt->execute([$username]);
        $doctor = $stmt->fetch();

        if ($doctor && $doctor["password"] === $password) {
            session_regenerate_id(true);
            $_SESSION["doctor_id"] = $doctor["doctor_id"];
            $_SESSION["username"] = $doctor["username"];
            $_SESSION["fullname"] = $doctor["fullname"];
            $_SESSION["role"] = "doctor";

            header("Location: /doctors/doctor_dashboard.php");
            exit;
        }

        // Invalid credentials
        $_SESSION["error"] = "Invalid username or password.";
        header("Location: /login.php");
        exit;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
} else {
    header("Location: /login.php");
    exit;
}
