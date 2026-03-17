<!DOCTYPE html>
<html lang="en">
    <?php include_once 'functions.php'; ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - Al Mesbah Al Modie Foundation</title>

    <meta name="description" content="Learn about Al Mesbah Al Modie Foundation, our mission, values, and commitment to charity and humanitarian aid in Egypt.">
    <meta name="keywords" content="about charity Egypt, nonprofit mission, humanitarian organization Egypt">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=20260310e">
    <script src="script.js?v=20260310e"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<?php
headerSection();
?>

    <div class="about-container">
        <h1 class="about-title">About Al Mesbah Al Modie Foundation</h1>
        <p class="about-text">
            Al Mesbah Al Modie Foundation is a charity and humanitarian aid organization in Egypt focused on
            helping vulnerable families with food support, medical care, seasonal campaigns, and community
            development. From Maedet El Rahman during Ramadan to year-round relief, healthcare, and education
            support, the foundation works to deliver practical help with dignity. With the support of donors
            and volunteers, we continue expanding trusted services that strengthen communities across Egypt.
        </p>

        <h2 class="about-subtitle">Quick Facts</h2>

        <table class="about-table">
            <tr>
                <th>Category</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Founded</td>
                <td>2010</td>
            </tr>
            <tr>
                <td>Main Activities</td>
                <td>Charity meals, Ramadan iftars, food distribution, medical aid, and education support</td>
            </tr>
            <tr>
                <td>Headquarters</td>
                <td>6 Atlas Buildings, Ahmed Fakhry St., Sixth District, Nasr City, Cairo</td>
            </tr>
            <tr>
                <td>Volunteers</td>
                <td>Over 50 active volunteers nationwide</td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>info@almesbah-almode.com</td>
            </tr>
        </table>
    </div>

    <div class="newsletter-box">
        <div class="newsletter-text">
            <h2>Sign Up for Our Newsletter</h2>
            <p>Stay updated on how Al Mesbah Al Modie Foundation delivers charity and humanitarian aid in Egypt.</p>
        </div>

        <form id="newsletterForm" action="subscription-confirmation.php" method="get" onsubmit="return validateNewsletterForm();">
            <input type="text" id="newsletterFirstName" placeholder="First Name">
            <input type="text" id="newsletterLastName" placeholder="Last Name">
            <input type="text" id="newsletterEmail" placeholder="Email">
            <button type="submit">Subscribe</button>
        </form>
    </div>

<?php
footerSection();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
