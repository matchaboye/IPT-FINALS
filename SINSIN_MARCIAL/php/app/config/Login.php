<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $host = "localhost";
    $database = "aksohospital";
    $dbusername = "root";
    $dbpassword = "";

    $dsn = "mysql:host=$host;dbname=$database;";
    try {
        $conn = new PDO($dsn, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Check users table
        $stmtUser = $conn->prepare('SELECT * FROM users WHERE username = :username');
        $stmtUser->bindParam(':username', $username);
        $stmtUser->execute();
        $user = $stmtUser->fetch();

        if ($user && $password === $user['password']) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["user_id"];  // your users table PK name?
            $_SESSION["username"] = $user["username"];
            $_SESSION["fullname"] = $user["fullname"];
            $_SESSION["role"] = ($user["is_admin"] == 1) ? 'admin' : 'user';

            // Redirect based on role
            if ($_SESSION["role"] === 'admin') {
                header("Location: /admin/admin_dashboard.php");
            } else {
                header("Location: /users/user_portal.php");
            }
            exit;
        }

        // Check doctors table
        $stmtDoctor = $conn->prepare('SELECT * FROM doctors WHERE username = :username');
        $stmtDoctor->bindParam(':username', $username);
        $stmtDoctor->execute();
        $doctor = $stmtDoctor->fetch();

        if ($doctor && $password === $doctor['password']) {
            session_regenerate_id(true);
            $_SESSION["doctor_id"] = $doctor["doctor_id"];  // your doctors table PK name?
            $_SESSION["username"] = $doctor["username"];
            $_SESSION["fullname"] = $doctor["fullname"];
            $_SESSION["role"] = 'doctor';

            header("Location: /doctors/doctor_dashboard.php");
            exit;
        }

        // If no match found
        $_SESSION["error"] = "Invalid username or password";
        header("Location: /login.php");
        exit;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // Redirect if accessed without POST
    header("Location: /login.php");
    exit;
}
