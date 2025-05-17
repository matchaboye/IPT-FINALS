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
<div class="container-fluid text-center py-4" id="headerrr" style="color: white; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
  <h1 class="display-2" style="color: #6abcff; font-weight: bold;">AKSO HOSPITAL</h1>
  <p class="lead" style="color: white;">Welcome to Linkon City's world-renowned medical institution</p>
</div>


<div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title" style="color: white; font-weight: bold;">Discover the excellence of Akso Hospital</h2>
        </div>
        
        <div class="row g-4">
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
            <div class="col-md-6 col-lg-4" style="align-items:center;">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Comprehensive Services</h3>
                    <p class="text-muted">Akso Hospital offers a wide range of medical services from emergency care to specialized treatments, serving as a complete healthcare destination.</p>
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
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Patient-Centered Care</h3>
                    <p class="text-muted">At Akso Hospital, we prioritize patient wellbeing with personalized treatment plans and compassionate care tailored to individual needs.</p>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="feature-card card shadow-sm p-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 style="color: #326faf; font-weight: bold;">Community Outreach</h3>
                    <p class="text-muted">Akso Hospital conducts events such as blood donation drives and dental missions, bringing the hospital and the community closer.</p>
                </div>
            </div>
        </div>

        <br>
        <br>

        <!--Carousel-->
    <div id="aksoCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#aksoCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#aksoCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#aksoCarousel" data-bs-slide-to="2"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/Akso_office.jpg" class="d-block w-100" alt="Slide 1" style="height: 400px; object-fit: cover;">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">World-Class Facility</h5>
            <p style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Providing cutting-edge healthcare solutions.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="img/hospital_staff.png" class="d-block w-100" alt="Slide 3" style="height: 400px; object-fit: cover;">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Expert Medical Team</h5>
            <p style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Meet our board-certified professionals.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="img/baby1.jpg" class="d-block w-100" alt="Slide 3" style="height: 400px; object-fit: cover;">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Compassionate Care</h5>
            <p style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Putting patients at the center of everything we do.</p>
        </div>
        </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#aksoCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#aksoCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
<br>
<br>

<div style="display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d225952.6944722536!2d121.4487420401547!3d31.217368774995727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35b264f604b3f2a9%3A0x701cdee4032735cc!2sShanghai%20Jiahui%20International%20Hospital!5e1!3m2!1sen!2sph!4v1747406898091!5m2!1sen!2sph" 
    width="800" 
    height="450" 
    style="border:0; flex-shrink: 0;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
<br>
  <div style="max-width: 400px;">
    <h1 style="color: #6abcff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">VISIT US</h1>
    <br>
    <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">We're located in the heart of Shanghai, providing world-class healthcare with state-of-the-art facilities.</p>
    <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Open 24/7. Walk-ins and appointments are welcome.</p>
  </div>
</div>

    </div>
<br>
<?php
    require_once(ROOT_DIR."/php/includes/footer.php");
?>