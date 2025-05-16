<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");
require_once(ROOT_DIR."/php/includes/header.php");

// Page guard: user must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user info for sidebar display
$stmtUser = $conn->prepare("SELECT fullname, username FROM users WHERE user_id = ?");
$stmtUser->bind_param("i", $user_id);
$stmtUser->execute();
$stmtUser->bind_result($fullname, $username);
$stmtUser->fetch();
$stmtUser->close();

// Fetch user's appointments
$appointments = [];
$stmt = $conn->prepare("SELECT appointment_id, fullname, email, contactno, appointment_date, message, created_at, status FROM appointments WHERE user_id = ? ORDER BY appointment_date, created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}
$stmt->close();
?>


<style>
    body {
      line-height: 1.6;
      overflow-x: hidden;
      background-image: url('img/Akso_Hospital.png'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    body::before {
        content: "";
        position: fixed; 
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
        z-index: -1; 
    }
</style>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- User Profile (beside sidebar) -->
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h5>User Profile</h5>
                </div>
                <div class="card-body">
                    <p><?= htmlspecialchars($fullname) ?></p>
                    <p><?= htmlspecialchars($username) ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5>Your Appointments</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($appointments)): ?>
                        <div class="alert alert-info">You have no appointments booked.</div>
                    <?php else: ?>
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Date &amp; Time</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Message</th>
                                    <th>Booked On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointments as $index => $appt): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($appt['fullname']) ?></td>
                                        <td><?= htmlspecialchars($appt['appointment_date']) ?></td>
                                        <td><?= htmlspecialchars($appt['email']) ?></td>
                                        <td><?= htmlspecialchars($appt['contactno']) ?></td>
                                        <td><?= htmlspecialchars($appt['message']) ?></td>
                                        <td><?= htmlspecialchars($appt['created_at']) ?></td>
                                        <td>
                                            <a href="users/edit_appointment.php?id=<?= $appt['appointment_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="users/delete_appointment.php?id=<?= $appt['appointment_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(ROOT_DIR."/php/includes/footer.php");
?>
