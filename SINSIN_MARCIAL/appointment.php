<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
    require_once(ROOT_DIR."/php/includes/header.php");
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

<div class="container-fluid">
  <div class="row min-vh-100">

    <!-- Sidebar (Left Half) -->
    <div class="col-md-6 p-0">
      <?php require_once(ROOT_DIR."/php/includes/sidebar.php"); ?>
    </div>

   
    <div class="col-md-6 d-flex justify-content-center align-items-center bg-white">
      <div class="appointment-form" style="width: 100%; max-width: 500px;">
        <h2 class="text-center mb-4">Book an Appointment</h2>
        <br>
        <br>
        <form action="php/app/config/Appointment.php" method="POST">
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
          </div>

          <div class="mb-3">
            <label for="date" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>

          <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select" id="department" name="department" required>
              <option selected disabled value="">Choose...</option>
              <option>General Medicine</option>
              <option>Pediatrics</option>
              <option>Dermatology</option>
              <option>Cardiology</option>
              <option>Dental</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="message" class="form-label">Additional Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Book Appointment</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

