<?php

function headerSection() {
?>
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
                <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
                <li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
}

function footerSection() {
?>
<div class="footer">
    <div class="footer-left">
        <h5>Quick Links</h5>
        <ul class="footer-links">
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="branches.php">Branches</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="faqs.php">FAQs</a></li>
        </ul>
    </div>

    <div class="footer-right">

        <a href="tel:16093" class="contact-item">
            <i class="fa-solid fa-phone"></i>
            <div>16093</div>
        </a>

        <a href="mailto:info@almesbah-almode.com" class="contact-item">
            <i class="fa-solid fa-envelope"></i>
            <div>info@almesbah-almode.com</div>
        </a>

        <div class="contact-item">
            <i class="fa-solid fa-location-dot"></i>
            <div>6 Atlas Buildings, Ahmed Fakhry St., <br> Sixth District, Nasr City, Cairo</div>
        </div>

        <div class="footer-right-icons">
            <a href="https://www.facebook.com/ElMesbah.ElModea" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-facebook-f" id="facebook-icon"></i>
            </a>
            <a href="https://www.instagram.com/elmesbaahelmodea/?igsh=MXJxYWFjazQwMjZiMw%3D%3D#" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-instagram" id="instagram-icon"></i>
            </a>
            <a href="https://wa.me/201210012324" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-whatsapp" id="whatsapp-icon"></i>
            </a>
        </div>

    </div>
</div>
<?php
}

function getHomePageData() {
    $impactStats = [
        ["value" => "16",    "label" => "Active programs"],
        ["value" => "3",     "label" => "Cairo branches"],
        ["value" => "100K+", "label" => "EGP monthly goal"],
    ];

    $supportPillars = [
        ["icon" => "fa-solid fa-bowl-food",          "title" => "Food Security",    "text" => "Hot meals, Ramadan tables, and grocery support that help families manage daily needs."],
        ["icon" => "fa-solid fa-heart-pulse",        "title" => "Medical Support",  "text" => "Dialysis, cancer care, hearing aids, and prosthetic support for vulnerable patients."],
        ["icon" => "fa-solid fa-hand-holding-heart", "title" => "Emergency Relief", "text" => "Winter blankets, relief bags, debt support, and home renovation for families under pressure."],
    ];

    $featuredPrograms = [
        ["image" => "images/project1.jpg",  "title" => "Maedet El Rahman",             "tag" => "Seasonal relief",  "description" => "Public iftar tables during Ramadan that provide dependable daily meals for families in need."],
        ["image" => "images/project3.jpg",  "title" => "Ramadan Food Boxes",           "tag" => "Family support",   "description" => "Essential food boxes that help households prepare meals at home with dignity and stability."],
        ["image" => "images/project7.jpg",  "title" => "Prosthetic Limbs Support",     "tag" => "Healthcare",       "description" => "Artificial limbs and practical support that help amputees regain movement and independence."],
        ["image" => "images/project8.jpg",  "title" => "Water Connection Projects",    "tag" => "Infrastructure",   "description" => "Clean water access for rural families through direct connection and improvement projects."],
        ["image" => "images/project11.jpg", "title" => "Home Renovation in Upper Egypt","tag" => "Housing",         "description" => "Repairing and rebuilding homes for families living in unsafe or unstable conditions."],
        ["image" => "images/project14.jpg", "title" => "Cancer Patient Care",          "tag" => "Medical care",     "description" => "Treatment assistance and regular checkups that reduce pressure on patients and caregivers."],
        ["image" => "images/project15.jpg", "title" => "Dialysis Unit Support",        "tag" => "Hospital support", "description" => "Funding equipment and treatment capacity so kidney patients receive care safely and consistently."],
        ["image" => "images/project16.jpg", "title" => "Relief Bag Distribution",      "tag" => "Rapid response",   "description" => "Large-scale campaigns delivering basic essentials to families during difficult periods."],
    ];

    return [$impactStats, $supportPillars, $featuredPrograms];
}
?>