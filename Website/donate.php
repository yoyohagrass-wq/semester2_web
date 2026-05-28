<?php
require_once 'functions.php';
pageHead(
    'Donate - Al Mesbah Al Modie Foundation',
    'Support Al Mesbah Al Modie Foundation by donating to help families in need through humanitarian and social projects in Egypt.',
    'donate Egypt, charity donation, nonprofit support, humanitarian aid Egypt'
);
headerSection();
?>

<div class="donation-container">
    <h1 class="donation-title">Make a Donation</h1>
    <p class="page-intro">Support Al Mesbah Al Modie Foundation, a charity and humanitarian aid organization in Egypt, by funding food assistance, medical care, emergency relief, and community support for families in need.</p>
    <div class="donation-box">
        <form id="donateForm" class="donation-form" action="donation-confirmation.php" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" class="donation-input" placeholder="Enter your full name">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="donation-input" placeholder="Enter your email">
            <label for="amount">Donation Amount:</label>
            <input type="text" id="donation-amount" name="Donation-Amount" placeholder="EGP">
            <label for="message">Message (Optional):</label>
            <textarea id="donorMessage" name="message" class="donation-textarea" rows="4" placeholder="Add a message..."></textarea>
            <button type="submit" class="donation-btn">Donate Now</button>
        </form>
        <h3 class="donation-prog-title">Donation Progress</h3>
        <div class="progress-container"><div id="progressBar"></div></div>
        <p id="progressText"></p>
    </div>
</div>

<?php
pageFooter();
pageClose();
?>
