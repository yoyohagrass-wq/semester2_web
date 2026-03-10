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

    <link rel="stylesheet" href="style.css?v=20260310e">
    <script src="script.js?v=20260310e"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>


<body>


    <!-- Start Header -->

    <div class="header">
        <a href="index.php">
            <img src="images/logo.png" alt=" Logo" class="logo">
        </a>
        <div class="header-brand">
            <h1>Al Mesbah Al Modie Foundation</h1>
            <p class="header-tagline">Charity and humanitarian aid in Egypt</p>
        </div>
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="volunteer.php">Volunteer</a>
            <a href="donate.php">Donate</a>
        </div>
    </div>
    
    <!-- End Header -->


    <!-- Start Body -->
    
    <div class="donation-container">
    <h1 class="donation-title">Become a Volunteer</h1>
    <p class="page-intro">Volunteer with Al Mesbah Al Modie Foundation and help deliver charity and humanitarian aid in Egypt through food distribution, healthcare support, events, and community outreach.</p>
    <div class="donation-box">
      <form id="volunteerForm" class="donation-form" action="volunteer-confirmation.php" method="get">
            <input type="text" id="name" class="donation-input" placeholder="Full Name" >
            <input type="text" id="email" class="donation-input" placeholder="Email" >
            <input type="text" id="phone" class="donation-input" placeholder="Phone Number" >
            <select id="area" class="donation-select" >
                <option value="">Preferred Volunteering Area</option>
                <option value="food-distribution">Food Distribution</option>
                <option value="events">Event Organization</option>
                <option value="medical-support">Medical Support</option>
                <option value="education">Education & Awareness</option>
            </select>
            <textarea id="message" class="donation-textarea" rows="4" placeholder="Message (Optional)"></textarea>
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
    


</body>
</html>
