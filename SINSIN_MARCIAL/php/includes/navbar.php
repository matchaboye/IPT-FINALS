<nav class="navbar navbar-expand-lg custom-nav">

<style>
  .custom-nav-links li a {
    text-decoration: none;
    color: white !important;
    font-weight: bold;
    transition: color 0.3s;
  }
  
  .custom-nav-links li a:hover {
    color: rgb(106, 188, 255) !important;
  }
</style>

        <div class="container-fluid">
        <a href="index.php">
        <img src="img/AKSOhospital_logo.png" alt="Akso Hospital logo" style="width: 150px; height: auto; margin-right: 10px;">
        </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" href="index.php"><b>HOME</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'active'; ?>" href="about.php"><b>ABOUT</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'http://akso-hospital-news.test:81/') echo 'active'; ?>" href="http://akso-hospital-news.test:81/"><b>NEWS</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'appointment.php') echo 'active'; ?>" href="appointment.php"><b>APPOINTMENT</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'http://localhost:81/aksohospitalevents/') echo 'active'; ?>" href="http://localhost:81/aksohospitalevents/"><b>EVENTS</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>