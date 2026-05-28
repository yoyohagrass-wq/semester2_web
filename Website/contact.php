<?php
require_once 'functions.php'; 
pageHead(
    'Contact Us - Al Mesbah Al Modie Foundation',
    'Contact Al Mesbah Al Modie Foundation for inquiries, volunteering, donations, and general support.',
    'contact charity Egypt, nonprofit contact, Al Mesbah Al Modie Foundation'
); 
headerSection();
?>

<div class="about-container">
    <h1 class="about-title">Contact Al Mesbah Al Modie Foundation</h1>
    <p class="about-text">
        Reach out to Al Mesbah Al Modie Foundation for donation support, volunteering, branch details,
        or partnership opportunities. As a charity and humanitarian aid organization in Egypt, we help
        donors, volunteers, and families connect with the right team quickly.
    </p>
    <table class="about-table">
        <tr><th>Contact Method</th><th>Details</th></tr>
        <tr><td>Phone</td><td>16093</td></tr>
        <tr><td>Email</td><td>info@almesbah-almode.com</td></tr>
        <tr><td>Address</td><td>6 Atlas Buildings, Ahmed Fakhry St., Sixth District, Nasr City, Cairo</td></tr>
        <tr><td>WhatsApp</td><td>+20 121 001 2324</td></tr>
    </table>
</div>
<div class="contact-box">
    <div class="contact-text">
        <h2>Inquire</h2>
        <p>Our team will respond as soon as possible with help related to foundation services, donations, or humanitarian aid programs in Egypt.</p>
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
pageFooter();
pageClose();
?>
