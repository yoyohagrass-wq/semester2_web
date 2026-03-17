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
            <a href="https://www.facebook.com/ElMesbah.ElModea" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f" id="facebook-icon"></i></a>
            <a href="https://www.instagram.com/elmesbaahelmodea/?igsh=MXJxYWFjazQwMjZiMw%3D%3D#" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram" id="instagram-icon"></i></a>
            <a href="https://wa.me/201210012324" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp" id="whatsapp-icon"></i></a>
        </div>
    </div>
</div>
<?php
}

?>