<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - Al Mesbah Al Modie Foundation</title>

    <meta name="description" content="Learn about Al Mesbah Al Modie Foundation, our mission, values, and commitment to humanitarian and social development in Egypt.">
    <meta name="keywords" content="about charity Egypt, nonprofit mission, humanitarian organization Egypt">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">

    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

    <!-- Start Header -->

    <div class="header">
        <a href="index.php">
            <img src="images/logo.png" alt=" Logo" class="logo">
        </a>
        <h1>Al Mesbah Al Modie Foundation</h1>
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="volunteer.php">Volunteer</a>
            <a href="donate.php">Donate</a>
        </div>
    </div>

    <!-- End Header -->


  <div class="about-container">
    <h1 class="about-title">About Al Mesbah Al Modie Foundation</h1>
    <p class="about-text">
      Al Mesbah Al Modie Foundation is a nonprofit organization dedicated to providing support
      to underprivileged families and communities throughout Egypt. Our mission is to spread kindness
      and hope through initiatives such as <em>Ma’edet El Rahman</em> during Ramadan, where free meals
      are served to those in need. We also organize food aid drives, healthcare campaigns, and
      educational programs to improve the quality of life for all Egyptians. With the help of our
      volunteers and donors, we continue to light the path toward a brighter, more compassionate future.
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
        <td>Charity meals, Ramadan iftars, food distribution, education aid</td>
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





  <!-- Newsletter Signup Form -->
  <div class="newsletter-box">
      <div class="newsletter-text">
          <h2>Sign Up for Our Newsletter</h2>
          <p>Stay updated on our projects and events by subscribing to our newsletter.</p>
      </div>

      <form id="newsletterForm" action="subscription-confirmation.php" method="get" onsubmit="return validateNewsletterForm();">
          <input type="text" id="newsletterFirstName" placeholder="First Name">
          <input type="text" id="newsletterLastName" placeholder="Last Name">
          <input type="text" id="newsletterEmail" placeholder="Email">
          <button type="submit">Subscribe</button>
      </form>
  </div>





  <!-- Start Footer -->
  <div class="footer">
    <!-- LEFT SIDE -->
    <div class="footer-left">
      <h5>Quick Links</h5>
      <ul class="footer-links">
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="branches.php">Branches</a></li>
        <li><a href="contact.php">Contact Us</a></li>
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


</body>
</html>
