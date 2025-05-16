<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");
    require_once(ROOT_DIR."/php/includes/header.php");
?>

<?php
$stmt = $conn->prepare("SELECT fullname, username, department FROM doctors WHERE doctor_id = ?");
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$stmt->bind_result($fullname, $username, $department);
$stmt->fetch();
$stmt->close();

$appointments = [];
$stmt = $conn->prepare("SELECT fullname, email, contactno, appointment_date, message, created_at, status FROM appointments WHERE department = ? ORDER BY appointment_date, created_at");
$stmt->bind_param("s", $department);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}
$stmt->close();
?>

<!-- da html -->
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Doctor Profile (beside sidebar) -->
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Doctor Profile</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?= htmlspecialchars($fullname) ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
                    <p><strong>Department:</strong> <?= htmlspecialchars($department) ?></p>
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
    require_once(ROOT_DIR."/php/includes/footer.php");
?>