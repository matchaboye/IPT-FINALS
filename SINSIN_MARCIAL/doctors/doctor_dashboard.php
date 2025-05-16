<?php
session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: /login.php");
    exit;
}

require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");  // Should create $conn as PDO

$doctor_id = $_SESSION['doctor_id'];

// Fetch doctor info
$stmt = $conn->prepare("SELECT fullname, username, department FROM doctor WHERE doctor_id = ?");
$stmt->execute([$doctor_id]);
$doctor = $stmt->fetch();

if (!$doctor) {
    // Doctor not found, force logout
    session_destroy();
    header("Location: /login.php");
    exit;
}

$department = $doctor['department'];

// Fetch appointments for doctor's department
$stmt = $conn->prepare("SELECT fullname, email, contactno, appointment_date, message, created_at, status FROM appointments WHERE department = ? ORDER BY appointment_date, created_at");
$stmt->execute([$department]);
$appointments = $stmt->fetchAll();

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
        <!-- Doctor Profile (beside sidebar) -->
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Doctor Profile</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?= htmlspecialchars($doctor['fullname']) ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($doctor['username']) ?></p>
                    <p><strong>Department:</strong> <?= htmlspecialchars($doctor['department']) ?></p>
                </div>
            </div>
        </div>

        <!-- Appointments Section -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5>Appointments for <?= htmlspecialchars($department) ?> Department</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($appointments)): ?>
                        <div class="alert alert-info">No appointments scheduled for your department.</div>
                    <?php else: ?>
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Date &amp; Time</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Message</th>
                                    <th>Appointment Made</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointments as $appt): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($appt['fullname']) ?></td>
                                        <td><?= htmlspecialchars($appt['appointment_date']) ?></td>
                                        <td><?= htmlspecialchars($appt['email']) ?></td>
                                        <td><?= htmlspecialchars($appt['contactno']) ?></td>
                                        <td><?= htmlspecialchars($appt['message']) ?></td>
                                        <td><?= htmlspecialchars($appt['created_at']) ?></td>
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
require_once($_SERVER["DOCUMENT_ROOT"]."/php/includes/footer.php");
?>
