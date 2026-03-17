<?php 
require_once 'functions.php'; 
pageHead(
    'About Us - Al Mesbah Al Modie Foundation',
    'Learn about Al Mesbah Al Modie Foundation, our mission, values, and commitment to charity and humanitarian aid in Egypt.',
    'about charity Egypt, nonprofit mission, humanitarian organization Egypt'
);
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
        <tr><th>Category</th><th>Details</th></tr>
        <tr><td>Founded</td><td>2010</td></tr>
        <tr><td>Main Activities</td><td>Charity meals, Ramadan iftars, food distribution, medical aid, and education support</td></tr>
        <tr><td>Headquarters</td><td>6 Atlas Buildings, Ahmed Fakhry St., Sixth District, Nasr City, Cairo</td></tr>
        <tr><td>Volunteers</td><td>Over 50 active volunteers nationwide</td></tr>
        <tr><td>Contact</td><td>info@almesbah-almode.com</td></tr>
    </table>
</div>
<div class="newsletter-box">
    <div class="newsletter-text">
        <h2>Sign Up for Our Newsletter</h2>
        <p>Receive updates from Al Mesbah Al Modie Foundation about charity programs and humanitarian aid projects across Egypt.</p>
    </div>
    <form id="newsletterForm" action="subscription-confirmation.php" method="post">
        <input type="text" id="newsletterFirstName" name="firstname" placeholder="First Name">
        <input type="text" id="newsletterLastName" name="lastname" placeholder="Last Name">
        <input type="text" id="newsletterEmail" name="email" placeholder="Email">
        <button type="submit">Subscribe</button>
    </form>
</div>
<?php 
pageFooter();
pageClose();
?>
