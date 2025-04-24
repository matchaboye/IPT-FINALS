<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KATSEYE | Home</title>
    <link rel="icon" type="web-icon" href="/img/katseye-logo-anim.gif">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<!-- Page Header -->
<div class="container-fluid text-white text-center py-4" id="headerrr">
    <h1 class="display-2">KATSEYE</h1>
    <p class="lead">Keep it classy.</p>

    <script>
    function centerBackgroundImage() {
        const header = document.getElementById('headerrr');
        
        // Set background with gradient overlay in one line
        header.style.background = 'linear-gradient(rgba(200, 155, 241, 0.48), rgba(200, 155, 241, 0.48)), url(https://64.media.tumblr.com/2898bb83573aa02f623d960b8b22f57e/3ec5f56ee5904178-f6/s540x810/b22568947be51ac1345bc29da646f50fcfe00be1.gifv) center/cover no-repeat';
        
        // Make sure it has dimensions (adjust as needed)
        header.style.height = '300px';
        header.style.width = '100%';
    }

    // Call immediately
    centerBackgroundImage();

    // Also call whenever the window resizes
    window.addEventListener('resize', centerBackgroundImage);
</script>

</div>
