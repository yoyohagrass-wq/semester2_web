<?php
$topics = [];
$topicsFile = __DIR__ . DIRECTORY_SEPARATOR . 'feedback-topics.txt';

if (file_exists($topicsFile)) {
    $lines = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        foreach ($lines as $line) {
            $parts = explode('|', $line, 2);
            $value = trim($parts[0] ?? '');
            $label = trim($parts[1] ?? '');
            if ($value !== '' && $label !== '') {
                $topics[] = ['value' => $value, 'label' => $label];
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
    <title>Feedback - Al Mesbah Al Modie Foundation</title>

    <meta name="description" content="Share your feedback and suggestions to help Al Mesbah Al Modie Foundation improve its services and activities.">
    <meta name="keywords" content="feedback Egypt, suggestions, nonprofit feedback, Al Mesbah Al Modie Foundation">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=20260310e">
    <script src="script.js?v=20260310e" defer></script>
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
                    <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
                    <li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- End Header -->


    <!-- Start Body -->
    
<div class="donation-container">
  <h1 class="donation-title">Submit Your Feedback</h1>
  <p class="page-intro">Your comments help Al Mesbah Al Modie Foundation improve how it delivers charity and humanitarian aid in Egypt through responsive services, better communication, and stronger community support.</p>

  <div class="donation-box">
    <form id="feedbackForm" class="donation-form" action="feedback-confirmation.php" method="get">
            <input type="text" id="name" name="name" class="donation-input" placeholder="Full Name">

            <input type="text" id="email" name="email" class="donation-input" placeholder="Email">

            <input type="text" id="phone" name="phone" class="donation-input" placeholder="Phone Number (Optional)">

            <select id="topic" name="topic" class="donation-select">
        <option value="">Feedback Type</option>
                <?php foreach ($topics as $topic): ?>
                    <option value="<?php echo htmlspecialchars($topic['value']); ?>"><?php echo htmlspecialchars($topic['label']); ?></option>
                <?php endforeach; ?>
      </select>

    <textarea id="message" name="message" class="donation-textarea" rows="4" placeholder="Write your feedback here..."></textarea>

      <button type="submit" class="donation-btn"> Submit Feedback </button>
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
