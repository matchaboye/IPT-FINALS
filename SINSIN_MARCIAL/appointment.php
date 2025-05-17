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

        
    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 1rem;
        transition: 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    }

    .service-icon {
        font-size: 2.5rem;
        color: #0d6efd;
    }
    }
</style>

<div class="container-fluid text-center py-4" id="headerrr" style="color: white; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
  <h1 class="display-2" style="color: #6abcff; font-weight: bold;">SERVICES</h1>
  <p class="lead" style="color: white;">Akso Hospital offers the following medical services</p>
</div>
 <br>
<div class="container py-5">
  <div class="row align-items-start">

       <div class="row">
    <?php
    $services = [
        [
            "title" => "Emergency Care",
            "desc" => "24/7 emergency support with trauma and life-saving interventions.",
            "img" => "img/services_emergency.jpg"
        ],
        [
            "title" => "Outpatient Services",
            "desc" => "Consultations, diagnostics, and minor procedures with no overnight stay.",
            "img" => "img/services_outpatient.jpg"
        ],
        [
            "title" => "Inpatient Services",
            "desc" => "Comfortable wards and intensive care units with 24/7 monitoring.",
            "img" => "img/services_inpatient.jpg"
        ],
        [
            "title" => "Surgical Services",
            "desc" => "General, orthopedic, and advanced surgical operations.",
            "img" => "img/services_surgery.jpg"
        ],
        [
            "title" => "Diagnostic Imaging",
            "desc" => "X-ray, MRI, CT, and ultrasound imaging for accurate diagnoses.",
            "img" => "img/services_xray.jpg"
        ],
        [
            "title" => "Laboratory Services",
            "desc" => "Advanced lab testing for pathology, microbiology, and more.",
            "img" => "img/services_lab.jpg"
        ],
        [
            "title" => "Pharmacy",
            "desc" => "On-site pharmacy with essential and specialized medications.",
            "img" => "img/services_pharmacy.jpg"
        ],
        [
            "title" => "Specialty Clinics",
            "desc" => "Focused care in cardiology, pediatrics, oncology, and more.",
            "img" => "img/Akso_hallway.jpg"
        ],
        [
            "title" => "Telemedicine",
            "desc" => "Remote consultations and follow-ups through secure video calls, bringing healthcare to your home.",
            "img" => "img/services_telemedicine.jpg"
        ],
    ];

    foreach ($services as $service) {
        echo '
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm p-3">
                <img src="' . $service["img"] . '" class="card-img-top rounded" alt="' . $service["title"] . '" style="height: 180px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">' . $service["title"] . '</h5>
                    <p class="card-text text-muted">' . $service["desc"] . '</p>
                </div>
            </div>
        </div>';
    }
    ?>
</div>
  </div>
</div>
<br>

<?php
    require_once(ROOT_DIR."/php/includes/footer.php");
?>