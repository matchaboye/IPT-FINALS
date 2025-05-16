<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");
require_once(ROOT_DIR."/php/includes/header.php");

// Simple admin guard (adjust based on your auth system)
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: /login.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid doctor ID.");
}

$doctor_id = (int) $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $username = $_POST['username'] ?? '';
    $department = $_POST['department'] ?? '';

    // Basic validation
    if (!$fullname || !$username || !$department) {
        $error = "Please fill in all required fields.";
    } else {
        // Update doctor info
        $stmt = $conn->prepare("UPDATE doctors SET fullname = ?, username = ?, department = ? WHERE doctor_id = ?");
        $stmt->bind_param("sssi", $fullname, $username, $department, $doctor_id);
        if ($stmt->execute()) {
            header("Location: /admin/admin_dashboard.php?msg=doctor_updated");
            exit;
        } else {
            $error = "Failed to update doctor.";
        }
    }
}

// Fetch current doctor info
$stmt = $conn->prepare("SELECT fullname, username, department FROM doctors WHERE doctor_id = ?");
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();
$stmt->close();

if (!$doctor) {
    die("Doctor not found.");
}
?>

<div class="container mt-4">
    <h2>Edit Doctor</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name *</label>
            <input type="text" id="fullname" name="fullname" class="form-control" required value="<?= htmlspecialchars($doctor['fullname']) ?>">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username *</label>
            <input type="text" id="username" name="username" class="form-control" required value="<?= htmlspecialchars($doctor['username']) ?>">
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department *</label>
            <select id="department" name="department" class="form-select" required>
                <option value="" disabled <?= !$doctor['department'] ? 'selected' : '' ?>>Choose...</option>
                <option value="General Medicine" <?= $doctor['department'] == 'General Medicine' ? 'selected' : '' ?>>General Medicine</option>
                <option value="Pediatrics" <?= $doctor['department'] == 'Pediatrics' ? 'selected' : '' ?>>Pediatrics</option>
                <option value="Dermatology" <?= $doctor['department'] == 'Dermatology' ? 'selected' : '' ?>>Dermatology</option>
                <option value="Cardiology" <?= $doctor['department'] == 'Cardiology' ? 'selected' : '' ?>>Cardiology</option>
                <option value="Dental" <?= $doctor['department'] == 'Dental' ? 'selected' : '' ?>>Dental</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Doctor</button>
        <a href="/admin/admin_dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php
require_once(ROOT_DIR."/php/includes/footer.php");
?>
