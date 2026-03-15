<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate - Al Mesbah Al Modie Foundation</title>

    <meta name="description" content="Support Al Mesbah Al Modie Foundation by donating to help families in need through humanitarian and social projects in Egypt.">
    <meta name="keywords" content="donate Egypt, charity donation, nonprofit support, humanitarian aid Egypt">
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
                    <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
                    <li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- End Header -->


    <!-- Start Body -->
    
    <div class="donation-container">
        <h1 class="donation-title">Make a Donation</h1>
        <p class="page-intro">Support Al Mesbah Al Modie Foundation, a charity and humanitarian aid organization in Egypt, by funding food assistance, medical care, emergency relief, and community support for families in need.</p>
        <div class="donation-box">
            <form id="donateForm" class="donation-form" action="donation-confirmation.php" method="get">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" class="donation-input" placeholder="Enter your full name">

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="donation-input" placeholder="Enter your email" >

                <label for="amount">Donation Amount:</label>
                <input type="text" id="donation-amount" name="Donation-Amount" placeholder="EGP">

                <label for="message">Message (Optional):</label>
                <textarea id="donorMessage" name="message" class="donation-textarea" rows="4" placeholder="Add a message..."></textarea>
                <button type="submit" class="donation-btn">Donate Now</button>
            </form>

            <h3 class="donation-prog-title">Donation Progress</h3>
            <div class="progress-container">
                <div id="progressBar"></div>
            </div>
            <p id="progressText"></p>

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
