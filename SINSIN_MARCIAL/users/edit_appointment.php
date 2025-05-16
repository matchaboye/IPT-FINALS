<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");
require_once(ROOT_DIR."/php/includes/header.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Get appointment ID from query
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid appointment ID.");
}

$appointment_id = (int) $_GET['id'];

// Handle POST form submission to update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields (you can expand validation)
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $contactno = $_POST['contactno'] ?? '';
    $appointment_date = $_POST['appointment_date'] ?? '';
    $message = $_POST['message'] ?? '';

    // Simple validation check
    if (!$fullname || !$email || !$contactno || !$appointment_date) {
        $error = "Please fill in all required fields.";
    } else {
        // Update appointment only if it belongs to logged user
        $stmt = $conn->prepare("UPDATE appointments SET fullname = ?, email = ?, contactno = ?, appointment_date = ?, message = ? WHERE appointment_id = ? AND user_id = ?");
        $stmt->bind_param("sssssii", $fullname, $email, $contactno, $appointment_date, $message, $appointment_id, $user_id);
        if ($stmt->execute()) {
            header("Location: user_portal.php?msg=updated");
            exit;
        } else {
            $error = "Failed to update appointment.";
        }
    }
}

// Fetch current appointment info to populate the form
$stmt = $conn->prepare("SELECT fullname, email, contactno, appointment_date, message FROM appointments WHERE appointment_id = ? AND user_id = ?");
$stmt->bind_param("ii", $appointment_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$appointment = $result->fetch_assoc();
$stmt->close();

if (!$appointment) {
    die("Appointment not found or access denied.");
}
?>

<div class="container mt-4">
    <h2>Edit Appointment</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name *</label>
            <input type="text" id="fullname" name="fullname" class="form-control" required value="<?= htmlspecialchars($appointment['fullname']) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email *</label>
            <input type="email" id="email" name="email" class="form-control" required value="<?= htmlspecialchars($appointment['email']) ?>">
        </div>
        <div class="mb-3">
            <label for="contactno" class="form-label">Contact Number *</label>
            <input type="tel" id="contactno" name="contactno" class="form-control" required value="<?= htmlspecialchars($appointment['contactno']) ?>">
        </div>
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date *</label>
            <input type="date" id="appointment_date" name="appointment_date" class="form-control" required value="<?= htmlspecialchars($appointment['appointment_date']) ?>">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Additional Message</label>
            <textarea id="message" name="message" class="form-control" rows="3"><?= htmlspecialchars($appointment['message']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Appointment</button>
        <a href="user_portal.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php
require_once(ROOT_DIR."/php/includes/footer.php");
?>
