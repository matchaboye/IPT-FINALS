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

<div class="container-fluid text-center py-4" id="headerrr" style="color: white; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
  <h1 class="display-2" style="color: #6abcff; font-weight: bold;">ABOUT</h1>
</div>
 <br>
<div class="container py-5">
  <div class="row align-items-start">

    <div class="col-md-4">
      <h1 class="section-title" style="color: white; font-weight: bold;">HISTORY</h1>
    </div>

    <div class="col-md-8">
      <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
        Founded in 2005, Linkon City’s municipal hospital is a distinguished healthcare institution located in the heart of downtown. Established to meet the growing medical needs of the community, Akso Hospital has grown into a world-renowned center dedicated to medicine, research, and education.
      </p>
      <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
        Over the time since its founding, Akso Hospital has significantly expanded its capabilities, becoming a leading hub for advanced treatment and clinical innovation. Its specialized divisions—such as the Division of Cardiac Surgery and the Division of General Surgery—are widely respected for their expert teams, state-of-the-art facilities, and consistent delivery of high-quality care.
      </p>
      <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
        Today, more than a decade since its founding, Akso Hospital continues to uphold its mission of compassionate care, medical excellence, and continuous innovation, earning the trust of patients locally and internationally.
      </p>
    </div>
  </div>
</div>
<br>

<div class="text-center mb-5">
      <h1 class="section-title" style="color: white; font-weight: bold;">OUR RENOWNED MEDICAL TEAM</h1>
    </div>

<div class="container py-5">
  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="img/Zayne_Icon.png" class="card-img-top" alt="Zayne" style="aspect-ratio: 1/1; object-fit: cover;">
        <div class="card-body">
          <p class="card-text small">Dr. Zayne Li</p>
          <p class="card-text small">Cardiac Surgeon</p>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="img/Greyson_Icon.png" class="card-img-top" alt="Greyson" style="aspect-ratio: 1/1; object-fit: cover;">
        <div class="card-body">
          <p class="card-text small">Dr. Greyson</p>
          <p class="card-text small">Cardiac Surgeon</p>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="img/Dr.Noah_Icon.png" class="card-img-top" alt="Noah" style="aspect-ratio: 1/1; object-fit: cover;">
        <div class="card-body">
          <p class="card-text small">Dr. Noah</p>
          <p class="card-text small">General Medicine</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="img/Carter_Icon.png" class="card-img-top" alt="Carter" style="aspect-ratio: 1/1; object-fit: cover;">
        <div class="card-body">
          <p class="card-text small">Dr. Carter</p>
          <p class="card-text small">Pediatrician</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="img/Yvonne_Icon.png" class="card-img-top" alt="Yvonne" style="aspect-ratio: 1/1; object-fit: cover;">
        <div class="card-body">
          <p class="card-text small">Yvonne, RN</p>
          <p class="card-text small">Head Nurse</p>
        </div>
      </div>
    </div>
    
  </div>
</div>

<br>

<div style="display: flex; flex-direction: column; align-items: center; gap: 30px;">
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d225952.6944722536!2d121.4487420401547!3d31.217368774995727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35b264f604b3f2a9%3A0x701cdee4032735cc!2sShanghai%20Jiahui%20International%20Hospital!5e1!3m2!1sen!2sph!4v1747406898091!5m2!1sen!2sph" 
    width="1300" 
    height="450" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>

  <div style="max-width: 600px; text-align: center;">
    <h1 style="color: #6abcff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">VISIT US</h1>
    <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">We're located in the heart of Shanghai, providing world-class healthcare with state-of-the-art facilities.</p>
    <p style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Open 24/7. Walk-ins and appointments welcome.</p>
  </div>
</div>

<br>
<br>

<?php
    require_once(ROOT_DIR."/php/includes/footer.php");
?>