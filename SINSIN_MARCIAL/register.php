<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
    require_once(ROOT_DIR."/php/includes/header.php");
    require_once(ROOT_DIR."php/includes/sidebar.php");
?>

<style>
    .register-wrapper {
        display: flex;
        min-height: 100vh;
    }
    .register-left {
        flex: 1;
        background: url('/path/to/your/background.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
    }
    .register-right {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        background-color: #f8f9fa;
    }
    .register-card {
        width: 100%;
        max-width: 500px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .register-card h4 {
        font-weight: bold;
        margin-bottom: 25px;
        text-align: center;
    }
</style>

<div class="register-wrapper">
    <div class="register-left">
        <!-- You can leave this empty or add your logo etc. -->
    </div>

    <div class="register-right">
        <div class="register-card">
            <h4>Register</h4>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <div><?= htmlspecialchars($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            <div class="text-center mt-3">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </div>
    </div>
</div>

