<?php


function saveDonation() {

  $error = "";

  $username = trim($_REQUEST["name"]);
  $email = trim($_REQUEST["email"]);
  $donationAmount = trim($_REQUEST["donation-amount"]);
  $donorMessage = trim($_REQUEST["donorMessage"]);

  if($username == "" || $email == "" || $donationAmount == "" || !is_numeric($donationAmount) || $donationAmount <= 0 ){
      echo "Please fill all fields correctly";
  }
  else {

      $FileHandler = fopen("../Admin/donations.txt", "a+") or die("error opening file!");
      $newdata = $username . "~" . $email . "~" . $donationAmount . "~" . $donorMessage . "\n";

      fwrite($FileHandler, $newdata);
      fclose($FileHandler);
  }

}

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

    <script src="script.js" defer></script>
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

            <img src="images/logo.png"
            alt="Logo"
            class="home-logo"
            width="84"
            height="84">

            <span class="brand-copy">

                <span class="brand-name">
                    Al Mesbah Al Modie Foundation
                </span>

                <span class="brand-subtitle">
                    Charity and humanitarian aid in Egypt
                </span>

            </span>

        </a>

        <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#homeNavbar">

            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="homeNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
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

function pageFooter()
{
?>
<div class="footer">

    <div class="footer-left">

        <h5>Quick Links</h5>

        <ul class="footer-links">

            <li>
                <a href="feedback.php">Feedback</a>
            </li>

            <li>
                <a href="branches.php">Branches</a>
            </li>

            <li>
                <a href="contact.php">Contact Us</a>
            </li>

            <li>
                <a href="faqs.php">FAQs</a>
            </li>

        </ul>

    </div>

    <div class="footer-right">

        <a href="tel:16093" class="contact-item">
            <i class="fa-solid fa-phone"></i>
            16093
        </a>

        <a href="mailto:info@almesbah-almode.com"
        class="contact-item">

            <i class="fa-solid fa-envelope"></i>
            info@almesbah-almode.com

        </a>

        <div class="contact-item">

            <i class="fa-solid fa-location-dot"></i>

            6 Atlas Buildings, Ahmed Fakhry St.<br>
            Sixth District, Nasr City, Cairo

        </div>

        <div class="footer-right-icons">

            <a href="https://www.facebook.com/ElMesbah.ElModea">
                <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a href="https://www.instagram.com/elmesbaahelmodea/">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="https://wa.me/201210012324">
                <i class="fa-brands fa-whatsapp"></i>
            </a>

        </div>

    </div>

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