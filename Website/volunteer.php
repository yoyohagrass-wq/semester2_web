<?php
require_once 'functions.php';
pageHead(
    'Volunteer - Al Mesbah Al Modie Foundation',
    'Join Al Mesbah Al Modie Foundation as a volunteer and help support humanitarian, social, and community projects across Egypt.',
    'volunteer Egypt, charity volunteer, nonprofit volunteering, community service Egypt'
);
headerSection();
?>

<div class="donation-container">
    <h1 class="donation-title">Become a Volunteer</h1>
    <p class="page-intro">Volunteer with Al Mesbah Al Modie Foundation and help deliver charity and humanitarian aid in Egypt through food distribution, healthcare support, events, and community outreach.</p>
    <div class="donation-box">
        <form id="volunteerForm" class="donation-form" action="volunteer-confirmation.php" method="post">
            <input type="text" id="name" name="name" class="donation-input" placeholder="Full Name">
            <input type="text" id="email" name="email" class="donation-input" placeholder="Email">
            <input type="text" id="phone" name="phone" class="donation-input" placeholder="Phone Number">
            <textarea id="message" name="message" class="donation-textarea" rows="4" placeholder="Message (Optional)"></textarea>
            <button type="submit" class="donation-btn">Submit Form</button>
        </form>
    </div>
</div>

<?php pageFooter(); ?>
<?php pageClose(); ?>