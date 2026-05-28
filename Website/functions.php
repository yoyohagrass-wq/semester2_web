<?php

function pageHead($title, $description, $keywords)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">

    <script src="script.js"></script>
</head>
<body>
<?php
}

function headerSection()
{
?>
<nav class="navbar navbar-expand-lg navbar-dark home-navbar sticky-top py-3">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
            <img src="images/logo.png" width="84" height="84">
            <span class="brand-copy">
                <span class="brand-name">Al Mesbah Al Modie Foundation</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#homeNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="homeNavbar">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="volunteer.php">Volunteer</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="donate.php">Donate</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

            </ul>
        </div>

    </div>
</nav>
<?php
}

function pageFooter()
{
?>
<div class="footer">

    <h5>Quick Links</h5>

    <a href="feedback.php">Feedback</a><br>
    <a href="branches.php">Branches</a><br>
    <a href="contact.php">Contact Us</a><br>
    <a href="faqs.php">FAQs</a><br>

    <br>

    <p>Phone: 16093</p>
    <p>Email: info@almesbah-almode.com</p>
    <p>
        6 Atlas Buildings, Ahmed Fakhry St.,
        Sixth District, Nasr City, Cairo
    </p>

    <a href="https://www.facebook.com/ElMesbah.ElModea">Facebook</a>
    <a href="https://www.instagram.com/elmesbaahelmodea/">Instagram</a>
    <a href="https://wa.me/201210012324">WhatsApp</a>

</div>
<?php
}

function pageClose()
{
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>