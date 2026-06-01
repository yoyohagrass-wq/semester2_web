<?php
$filehandler = fopen("../Admin/feedbackoptions.txt", "r");
$data = array();

while (!feof($filehandler)) {
    $line = fgets($filehandler);
    $line = trim($line);
    if(!empty($line)) {
        $data[] = $line;
    }
}

fclose($filehandler);
?>

<div class="donation-container">
    <h1 class="donation-title">Submit Your Feedback</h1>
    <p class="page-intro">Your comments help Al Mesbah Al Modie Foundation improve how it delivers charity and humanitarian aid in Egypt through responsive services, better communication, and stronger community support.</p>
    <div class="donation-box">
        <form id="feedbackForm" class="donation-form" action="feedback-confirmation.php" method="post">
            <input type="text" id="name" name="name" class="donation-input" placeholder="Full Name">
            <input type="text" id="email" name="email" class="donation-input" placeholder="Email">
            <input type="text" id="phone" name="phone" class="donation-input" placeholder="Phone Number (Optional)">

            <select name="mycombobox" class="donation-input">
                <?php
                foreach ($data as $value) {
                    echo "<option value='$value'>$value</option>";
                }
                ?>
            </select>

            <textarea id="message" name="message" class="donation-textarea" rows="4" placeholder="Write your feedback here..."></textarea>

            <button type="submit" class="donation-btn">Submit Feedback</button>
        </form>
    </div>
</div>
