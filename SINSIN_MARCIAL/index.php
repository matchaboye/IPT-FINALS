<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/php/app/config/Directories.php");
    require_once(ROOT_DIR."php/includes/navbar.php");
    require_once(ROOT_DIR."/php/includes/header.php");
?>

<!-- Page Header -->
<div class="container-fluid text-white text-center py-4" id="headerrr">
    <h1 class="display-2">KATSEYE</h1>
    <p class="lead">Welcome to KATSEYE's All-In-One Fanclub Website!</p>
</div>

<script>
    function centerBackgroundImage() {
        const header = document.getElementById('headerrr');
        
        header.style.background = 'linear-gradient(rgba(200, 155, 241, 0.48), rgba(200, 155, 241, 0.48)), url(https://64.media.tumblr.com/2898bb83573aa02f623d960b8b22f57e/3ec5f56ee5904178-f6/s540x810/b22568947be51ac1345bc29da646f50fcfe00be1.gifv) center/cover no-repeat';
        
        header.style.height = '300px';
        header.style.width = '100%';
    }

    centerBackgroundImage();
    window.addEventListener('resize', centerBackgroundImage);
</script>

 <!-- 3 Column Section -->
<div class="container my-5 py-4" id="contentdiv">
    <h2 class="section-heading" id="sectheading"><b>WHAT'S POPPIN' WITH KATSEYE?</b></h2>
    <div class="row g-4">
        <!-- Column 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="column-card" id="content1">
                <h3>About Us</h3>
                <p>Learn more about Sophia, Manon, Daniela, Lara, Megan, and Yoonchae! Discover each member's unique personality and talents.</p>
                <a href="#" class="btn">Read More</a>
            </div>
        </div>
        
        <!-- Column 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="column-card" id="content2">
                <h3>Latest News</h3>
                <p>Stay updated with KATSEYE's recent activities, music releases, and announcements. Never miss any updates from your favorite group!</p>
                <a href="#" class="btn">View News</a>
            </div>
        </div>
        
        <!-- Column 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="column-card" id="content3">
                <h3>Events</h3>
                <p>Join our upcoming fan meetings, concerts, and special events. Get tickets and exclusive merchandise for KATSEYE members!</p>
                <a href="#" class="btn">See Events</a>
            </div>
        </div>
    </div>
</div>

<?php
    require_once(ROOT_DIR."/php/includes/footer.php");
?>