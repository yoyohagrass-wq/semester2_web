<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <ul>
        <li><a href="index.php" <?php if($currentPage=="index.php") echo 'class="active"'; ?>>Home</a></li>
        <li><a href="about.php" <?php if($currentPage=="about.php") echo 'class="active"'; ?>>About</a></li>
        <li><a href="activities.php" <?php if($currentPage=="activities.php") echo 'class="active"'; ?>>Activities</a></li>
        <li><a href="donations.php" <?php if($currentPage=="donations.php") echo 'class="active"'; ?>>Donations</a></li>
        <li><a href="volunteer.php" <?php if($currentPage=="volunteer.php") echo 'class="active"'; ?>>Volunteer</a></li>
        <li><a href="contact.php" <?php if($currentPage=="contact.php") echo 'class="active"'; ?>>Contact</a></li>
        <li><a href="login.php">Admin</a></li>
    </ul>
</nav>