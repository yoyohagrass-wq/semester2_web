<?php

function pageHead($title, $description, $keywords) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css?v=20260317f">
    <script src="script.js?v=20260317f" defer></script>
</head>
<body>
<?php
}

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
                <li class="nav-item"><a class="btn btn-outline-light" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
}

function newsletterBox($description = '') {
?>
<div class="newsletter-box">
    <div class="newsletter-text">
        <h2>Sign Up for Our Newsletter</h2>
        <p><?= $description ?></p>
    </div>
    <form id="newsletterForm" action="subscription-confirmation.php" method="post" onsubmit="return validateNewsletterForm();">
        <input type="text" id="newsletterFirstName" name="first_name" placeholder="First Name">
        <input type="text" id="newsletterLastName" name="last_name" placeholder="Last Name">
        <input type="text" id="newsletterEmail" name="email" placeholder="Email">
        <button type="submit">Subscribe</button>
    </form>
</div>
<?php
}

function inquiryForm($heading = 'Inquire', $intro = '') {
?>
<div class="contact-box">
    <div class="contact-text">
        <h2><?= $heading ?></h2>
        <p><?= $intro ?></p>
    </div>
    <form id="inquireForm" action="feedback-confirmation.php" method="post" onsubmit="return validateInquireForm();">
        <input type="text" id="inquireName" name="inquireName" placeholder="Your Name">
        <input type="text" id="inquireEmail" name="inquireEmail" placeholder="Your Email">
        <input type="text" id="inquirePhone" name="inquirePhone" placeholder="Your Phone">
        <textarea id="inquireMessage" name="inquireMessage" rows="4" placeholder="Your Message"></textarea>
        <button type="submit">Send Inquiry</button>
    </form>
</div>
<?php
}

function pageFooter() {
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
            <a href="https://www.facebook.com/ElMesbah.ElModea" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f" id="facebook-icon"></i></a>
            <a href="https://www.instagram.com/elmesbaahelmodea/?igsh=MXJxYWFjazQwMjZiMw%3D%3D#" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram" id="instagram-icon"></i></a>
            <a href="https://wa.me/201210012324" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp" id="whatsapp-icon"></i></a>
        </div>
    </div>
</div>
<?php
}

function pageClose() {
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}

function loadPipedFile($filePath) {
    $rows = [];
    if (!file_exists($filePath)) return $rows;
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) return $rows;
    foreach ($lines as $line) {
        $parts = explode('|', $line, 2);
        $value = trim($parts[0] ?? '');
        $label = trim($parts[1] ?? '');
        if ($value !== '' && $label !== '') {
            $rows[] = ['value' => $value, 'label' => $label];
        }
    }
    return $rows;
}

function loadServicesData() {
    $rows = [];
    $file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Admin' . DIRECTORY_SEPARATOR . 'services-data.txt';
    if (!file_exists($file)) return $rows;
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) return $rows;
    foreach ($lines as $line) {
        $parts = explode('~', $line, 3);
        $id = intval(trim($parts[0] ?? '0'));
        $name = trim($parts[1] ?? '');
        $description = trim($parts[2] ?? '');
        if ($id > 0 && $name !== '') {
            $rows[] = ['id' => $id, 'name' => $name, 'description' => $description];
        }
    }
    return $rows;
}

function getServicesData() {
    return [
        ['image' => 'images/project1.jpg',  'name' => "Ma'edet El Rahman",                  'desc' => 'Organizing free iftar tables during Ramadan to serve daily meals for families in need.'],
        ['image' => 'images/project2.jpg',  'name' => "Orphan's Day Celebration",           'desc' => 'We organize special events for orphans filled with joy, games, and gifts to bring happiness and a sense of belonging.'],
        ['image' => 'images/project3.jpg',  'name' => 'Ramadan Food Boxes',                 'desc' => 'During Ramadan, we distribute essential food boxes to families, helping them prepare their daily meals with ease.'],
        ['image' => 'images/project4.jpg',  'name' => "Mother's Day Celebration",           'desc' => 'We honor mothers with gifts and gatherings to appreciate their efforts and spread love and gratitude in the community.'],
        ['image' => 'images/project5.jpg',  'name' => 'Paying Debts for the Needy',        'desc' => 'Our initiative helps families and individuals who are unable to repay their debts, relieving them from financial burdens.'],
        ['image' => 'images/project6.jpg',  'name' => 'Meat Distribution',                  'desc' => 'Each Eid Al-Adha, we distribute fresh sacrificial meat to underprivileged families across various regions of Egypt.'],
        ['image' => 'images/project7.jpg',  'name' => 'Prosthetic Limbs Support',           'desc' => 'We provide artificial limbs and medical support to amputees, helping them regain independence and confidence.'],
        ['image' => 'images/project8.jpg',  'name' => 'Water Connection Projects',          'desc' => 'We work to supply clean and safe water to families in rural and underserved areas, improving their health and living conditions.'],
        ['image' => 'images/project9.jpg',  'name' => 'Distribution of Blankets',           'desc' => 'We distribute blankets and winter supplies to protect families from the cold during harsh winter months.'],
        ['image' => 'images/project10.jpg', 'name' => 'Bride Preparation Support',          'desc' => 'We assist brides from low-income families by providing essential home furnishings and wedding needs.'],
        ['image' => 'images/project11.jpg', 'name' => 'Home Renovation in Upper Egypt',     'desc' => 'We repair and rebuild homes for families living in poor conditions across Upper Egypt villages.'],
        ['image' => 'images/project12.jpg', 'name' => 'Water Purification Stations',        'desc' => 'We establish purification stations to provide clean, filtered water to rural communities lacking access to safe drinking water.'],
        ['image' => 'images/project13.jpg', 'name' => 'Hearing Aid Installation for Children', 'desc' => 'We provide hearing aids and medical support to children with hearing difficulties, helping them reconnect in their communities.'],
        ['image' => 'images/project14.jpg', 'name' => 'Cancer Patient Care',                'desc' => 'We offer support to cancer patients through treatment assistance and regular medical checkups to ease their journey toward recovery.'],
        ['image' => 'images/project15.jpg', 'name' => 'Dialysis Unit Support',              'desc' => 'We fund and equip dialysis units to ensure that patients with kidney failure receive the necessary treatment in a safe environment.'],
    ];
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
        ["image" => "images/project1.jpg",  "title" => "Maedet El Rahman",              "tag" => "Seasonal relief",  "description" => "Public iftar tables during Ramadan that provide dependable daily meals for families in need."],
        ["image" => "images/project3.jpg",  "title" => "Ramadan Food Boxes",            "tag" => "Family support",   "description" => "Essential food boxes that help households prepare meals at home with dignity and stability."],
        ["image" => "images/project7.jpg",  "title" => "Prosthetic Limbs Support",      "tag" => "Healthcare",       "description" => "Artificial limbs and practical support that help amputees regain movement and independence."],
        ["image" => "images/project8.jpg",  "title" => "Water Connection Projects",     "tag" => "Infrastructure",   "description" => "Clean water access for rural families through direct connection and improvement projects."],
        ["image" => "images/project11.jpg", "title" => "Home Renovation in Upper Egypt","tag" => "Housing",          "description" => "Repairing and rebuilding homes for families living in unsafe or unstable conditions."],
        ["image" => "images/project14.jpg", "title" => "Cancer Patient Care",           "tag" => "Medical care",     "description" => "Treatment assistance and regular checkups that reduce pressure on patients and caregivers."],
        ["image" => "images/project15.jpg", "title" => "Dialysis Unit Support",         "tag" => "Hospital support", "description" => "Funding equipment and treatment capacity so kidney patients receive care safely and consistently."],
        ["image" => "images/project16.jpg", "title" => "Relief Bag Distribution",       "tag" => "Rapid response",   "description" => "Large-scale campaigns delivering basic essentials to families during difficult periods."],
    ];

    return [$impactStats, $supportPillars, $featuredPrograms];
}
