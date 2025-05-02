<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
    require_once(ROOT_DIR."php/includes/navbar.php");
    require_once(ROOT_DIR."/php/includes/header.php");
?>

<!-- Page Header -->
<div class="container-fluid text-white text-center py-4" id="headerrr">
    <h1 class="display-2">AKSO HOSPITAL</h1>
    <p class="lead">Welcome to Linkon City's world-renowned medical institution.</p>
</div>

<div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="section-title">What is Akso Hospital?</h1>
            <p class="lead text-muted">Discover the excellence of Akso Hospital.</p>
        </div>
        
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3>Advanced Medical Facility</h3>
                    <p class="text-muted">Akso Hospital is a state-of-the-art healthcare institution equipped with cutting-edge medical technology and modern infrastructure to provide comprehensive care.</p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Expert Medical Team</h3>
                    <p class="text-muted">Our hospital boasts a team of highly skilled specialists and healthcare professionals dedicated to delivering exceptional patient care and treatment.</p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3>Patient-Centered Care</h3>
                    <p class="text-muted">At Akso Hospital, we prioritize patient wellbeing with personalized treatment plans and compassionate care tailored to individual needs.</p>
                </div>
            </div>
            
            <!-- Feature 4 -->
            <div class="col-md-6 col-lg-4" style="align-items: center;">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3>Research & Innovation</h3>
                    <p class="text-muted">We're committed to medical research and innovation, continuously improving treatments and implementing the latest medical breakthroughs.</p>
                </div>
            </div>
            
            <!-- Feature 5 -->
            <div class="col-md-6 col-lg-4" style="align-items:center;">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Comprehensive Services</h3>
                    <p class="text-muted">Akso Hospital offers a wide range of medical services from emergency care to specialized treatments, serving as a complete healthcare destination.</p>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once(ROOT_DIR."/php/includes/footer.php");
?>