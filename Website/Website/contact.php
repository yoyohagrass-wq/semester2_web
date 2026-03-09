<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Al Mesbah Al Modie Foundation</title>

    <meta name="description" content="Contact Al Mesbah Al Modie Foundation for inquiries, volunteering, donations, and general support.">
    <meta name="keywords" content="contact charity Egypt, nonprofit contact, Al Mesbah Al Modie Foundation">
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
        <h1 class="about-title">Contact Us</h1>
        <p class="about-text">
            Reach out to Al Mesbah Al Modie Foundation for general inquiries, partnership opportunities,
            volunteering information, or donation support. Our team is available to help and will respond
            as soon as possible.
        </p>

        <table class="about-table">
            <tr>
                <th>Contact Method</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Phone</td>
                <td>16093</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>info@almesbah-almode.com</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>6 Atlas Buildings, Ahmed Fakhry St., Sixth District, Nasr City, Cairo</td>
            </tr>
            <tr>
                <td>WhatsApp</td>
                <td>+20 121 001 2324</td>
            </tr>
        </table>
    </div>


    <div class="contact-box">
        <div class="contact-text">
            <h2>Send an Inquiry</h2>
            <p>Use the form to contact our team about donations, volunteering, or general questions.</p>
        </div>

        <form id="inquireForm" action="feedback-confirmation.php" method="get" onsubmit="return validateInquireForm();">
            <input type="text" id="inquireName" placeholder="Your Name: ">
            <input type="text" id="inquireEmail" placeholder="Your Email: ">
            <input type="text" id="inquirePhone" placeholder="Your Phone: ">
            <textarea id="inquireMessage" rows="4" placeholder="Your Message: "></textarea>
            <button type="submit">Send Inquiry</button>
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


</body>
</html>