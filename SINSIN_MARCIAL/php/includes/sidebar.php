<div class="sidebar">
    <a href="index.php">
        <img src="img/AKSOhospital_logo.png" alt="Akso Hospital logo" style="width: 150px; height: auto; margin-right: 10px;">
    </a>
    <a href="index.php">Home</a>
    <a href="appointment.php">Appointment Form</a>

    <?php if (!isset($_SESSION['role'])): ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php else: ?>
        <?php
            // Role-based dashboard link
            switch ($_SESSION['role']) {
                case 'admin':
                    echo '<a href="admin/admin_dashboard.php">Admin Dashboard</a>';
                    break;
                case 'doctor':
                    echo '<a href="doctors/doctor_dashboard.php">Doctor Dashboard</a>';
                    break;
                case 'user':
                    echo '<a href="users/user_portal.php">User Portal</a>';
                    break;
            }
        ?>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</div>
