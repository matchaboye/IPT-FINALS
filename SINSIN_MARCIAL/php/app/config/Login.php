<?php

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $database = "aksohospital";
    $dbusername = "root";
    $dbpassword = "";

    $dsn = "mysql:host=$host;dbname=$database;";
    try {
        $conn = new PDO($dsn, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Check in users table
        $stmtUser = $conn->prepare('SELECT * FROM users WHERE username = :username');
        $stmtUser->bindParam(':username', $username);
        $stmtUser->execute();
        $user = $stmtUser->fetch();

        if ($user && $password === $user['password']) {
            session_regenerate_id(true);
            $_SESSION["user_type"] = "user";
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["fullname"] = $user["fullname"];
            $_SESSION["is_admin"] = $user["is_admin"];
            
            exit;
        } if ($user["is_admin"] == 1) {
                header("Location: /admin/admin_dashboard.php");
            } else {
                header("Location: /users/user_portal.php");
            }


        // Check in doctors table if not found in users
        $stmtDoctor = $conn->prepare('SELECT * FROM doctors WHERE username = :username');
        $stmtDoctor->bindParam(':username', $username);
        $stmtDoctor->execute();
        $doctor = $stmtDoctor->fetch();

        if ($doctor && $password === $doctor['password']) {
            session_regenerate_id(true);
            $_SESSION["user_type"] = "doctor";
            $_SESSION["doctor_id"] = $doctor["id"];
            $_SESSION["username"] = $doctor["username"];
            $_SESSION["fullname"] = $doctor["fullname"];
            header("Location: /doctors/doctor_dashboard.php");
            exit;
        }

        
        // If neither matched
        $_SESSION["error"] = "Invalid username or password";
        header("Location: /login.php");
        exit;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?>
