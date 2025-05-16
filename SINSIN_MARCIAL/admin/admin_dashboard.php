<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/DatabaseConnect.php");
require_once(ROOT_DIR."/php/includes/header.php");

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: /login.php");
    exit;
}

// fetch
$doctors = [];
$sql = "SELECT doctor_id, fullname, username, department FROM doctors ORDER BY fullname";
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
    $result->free();
}
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
        
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Admin Dashboard</h5>
                </div>
                <div class="card-body">
                    <p><strong>Welcome, <?= htmlspecialchars($_SESSION['fullname'] ?? 'Admin') ?></strong></p>
                    <p>Manage doctors below.</p>
                </div>
            </div>
        </div>

        <!-- doc  -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5>All Doctors</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($doctors)): ?>
                        <div class="alert alert-info">No doctors found.</div>
                    <?php else: ?>
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors as $index => $doctor): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($doctor['fullname']) ?></td>
                                        <td><?= htmlspecialchars($doctor['username']) ?></td>
                                        <td><?= htmlspecialchars($doctor['department']) ?></td>
                                        <td>
                                            <a href="admin/edit_doc.php?id=<?= $doctor['doctor_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="admin/delete_doc.php?id=<?= $doctor['doctor_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</a>
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
