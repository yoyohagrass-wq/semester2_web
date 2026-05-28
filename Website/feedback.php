<?php
require_once 'functions.php';
pageHead(
    'Feedback - Al Mesbah Al Modie Foundation',
    'Share your feedback and suggestions to help Al Mesbah Al Modie Foundation improve its services and activities.',
    'feedback Egypt, suggestions, nonprofit feedback, Al Mesbah Al Modie Foundation'
);
headerSection();
?>

<div class="donation-container">
    <h1 class="donation-title">Submit Your Feedback</h1>
    <p class="page-intro">Your comments help Al Mesbah Al Modie Foundation improve how it delivers charity and humanitarian aid in Egypt through responsive services, better communication, and stronger community support.</p>
    <div class="donation-box">
        <form id="feedbackForm" class="donation-form" action="feedback-confirmation.php" method="post">
            <input type="text" id="name" name="name" class="donation-input" placeholder="Full Name">
            <input type="text" id="email" name="email" class="donation-input" placeholder="Email">
            <input type="text" id="phone" name="phone" class="donation-input" placeholder="Phone Number (Optional)">
            <textarea id="message" name="message" class="donation-textarea" rows="4" placeholder="Write your feedback here..."></textarea>
            <button type="submit" class="donation-btn">Submit Feedback</button>
        </form>
    </div>
</div>

<?php
pageFooter();
pageClose();
?>
