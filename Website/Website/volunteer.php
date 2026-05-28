<?php
$areas = [];
$areasFile = __DIR__ . DIRECTORY_SEPARATOR . 'volunteer-areas.txt';

if (file_exists($areasFile)) {
    $lines = file($areasFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        foreach ($lines as $line) {
            $parts = explode('|', $line, 2);
            $value = trim($parts[0] ?? '');
            $label = trim($parts[1] ?? '');
            if ($value !== '' && $label !== '') {
                $areas[] = ['value' => $value, 'label' => $label];
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Volunteer - Al Mesbah Al Modie Foundation</title>
    
    <meta name="description" content="Join Al Mesbah Al Modie Foundation as a volunteer and help support humanitarian, social, and community projects across Egypt.">
    <meta name="keywords" content="volunteer Egypt, charity volunteer, nonprofit volunteering, community service Egypt">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=20260310e">
    <script src="script.js?v=20260310e"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>


<body>


    <!-- Start Header -->

    <nav class="navbar navbar-expand-lg navbar-dark home-navbar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
                <img src="images/logo.png" alt="Al Mesbah Al Modie Foundation logo" class="home-logo" width="84" height="84">
                <span class="brand-copy">
                    <span class="brand-name">Al Mesbah Al Modie Foundation</span>
                    <span class="brand-subtitle">Charity and humanitarian aid in Egypt</span>
                </span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#homeNavbar" aria-controls="homeNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="homeNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="volunteer.php">Volunteer</a></li>
                    <li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- End Header -->


    <!-- Start Body -->
    
    <div class="donation-container">
    <h1 class="donation-title">Become a Volunteer</h1>
    <p class="page-intro">Volunteer with Al Mesbah Al Modie Foundation and help deliver charity and humanitarian aid in Egypt through food distribution, healthcare support, events, and community outreach.</p>
    <div class="donation-box">
      <form id="volunteerForm" class="donation-form" action="volunteer-confirmation.php" method="get">
        <input type="text" id="name" name="name" class="donation-input" placeholder="Full Name" >
        <input type="text" id="email" name="email" class="donation-input" placeholder="Email" >
        <input type="text" id="phone" name="phone" class="donation-input" placeholder="Phone Number" >
        <select id="area" name="area" class="donation-select" >
                <option value="">Preferred Volunteering Area</option>
                <?php foreach ($areas as $area): ?>
                    <option value="<?php echo htmlspecialchars($area['value']); ?>"><?php echo htmlspecialchars($area['label']); ?></option>
                <?php endforeach; ?>
            </select>
            <textarea id="message" name="message" class="donation-textarea" rows="4" placeholder="Message (Optional)"></textarea>
            <button type="submit" class="donation-btn">Submit Form</button>
        </form>
    </div>
  </div>

    <!-- End Body -->

    <!-- Start Footer -->
    <div class="footer">
        <!-- LEFT SIDE -->
        <div class="footer-left">
        <h5>Quick Links</h5>
        <ul class="footer-links">
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="branches.php">Branches</a></li>
            <li><a href="faqs.php">FAQs</a></li>
        </ul>
        </div>

        <!-- RIGHT SIDE -->
        <div class="footer-right">
        <div class="contact-item">
            <i class="fa-solid fa-phone"></i>
            <div>16093</div>
        </div>

        <div class="contact-item">
            <i class="fa-solid fa-envelope"></i>
            <div>info@almesbah-almode.com</div>
        </div>

        <div class="contact-item">
            <i class="fa-solid fa-location-dot"></i>
            <div>6 Atlas Buildings, Ahmed Fakhry St., <br> Sixth District, Nasr City, Cairo</div>
        </div>

        <div class="footer-right-icons">
            <a href="https://www.facebook.com/ElMesbah.ElModea" target="_blank"><i class="fa-brands fa-facebook-f" id="facebook-icon"></i></a>
            <a href="https://www.instagram.com/elmesbaahelmodea/?igsh=MXJxYWFjazQwMjZiMw%3D%3D#" target="_blank"><i class="fa-brands fa-instagram" id="instagram-icon"></i></a>
            <a href="https://wa.me/201210012324" target="_blank"><i class="fa-brands fa-whatsapp" id="whatsapp-icon"></i></a>
        </div>
        </div>
    </div>
    <!-- End Footer -->
<!-- End Content -->
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
