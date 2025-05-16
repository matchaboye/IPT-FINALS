<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
    require_once(ROOT_DIR."/php/includes/header.php");
?>

<?php  require_once(ROOT_DIR."php/includes/navbar.php"); ?>

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

<body>

<!-- Page Header -->
<div class="container-fluid text-center py-4" id="headerrr" style="background-color: white;">
    <br>
    <h1 class="display-2" style="color: #326faf; font-weight: bold;">AKSO HOSPITAL</h1>
    <p class="lead" style="color: #326faf;">Welcome to Linkon City's world-renowned medical institution.</p>
    <br>
</div>



<div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="section-title" style="color: white; font-weight: bold;">What is Akso Hospital?</h1>
            <p class="lead" style="color: white;">Discover the excellence of Akso Hospital.</p>
        </div>
        
        <div class="row g-4" style="align-items: center">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Advanced Medical Facility</h3>
                    <p class="text-muted">Akso Hospital is a state-of-the-art healthcare institution equipped with cutting-edge medical technology and modern infrastructure to provide comprehensive care.</p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Expert Medical Team</h3>
                    <p class="text-muted">Our hospital boasts a team of highly skilled specialists and healthcare professionals dedicated to delivering exceptional patient care and treatment.</p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Patient-Centered Care</h3>
                    <p class="text-muted">At Akso Hospital, we prioritize patient wellbeing with personalized treatment plans and compassionate care tailored to individual needs.</p>
                </div>
            </div>
            
            <!-- Feature 4 -->
            <div class="col-md-6 col-lg-4" style="align-items: center;">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Research & Innovation</h3>
                    <p class="text-muted">We're committed to medical research and innovation, continuously improving treatments and implementing the latest medical breakthroughs.</p>
                </div>
            </div>
            
            <!-- Feature 5 -->
            <div class="col-md-6 col-lg-4" style="align-items:center;">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Comprehensive Services</h3>
                    <p class="text-muted">Akso Hospital offers a wide range of medical services from emergency care to specialized treatments, serving as a complete healthcare destination.</p>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once(ROOT_DIR."/php/includes/footer.php");
?>