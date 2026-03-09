<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Resala Charity</h1>
        <p>Join us in making a difference in the lives of those in need.</p>
        <a href="donations.php" class="btn">Donate Now</a>
        <a href="volunteer.php" class="btn">Volunteer</a>
    </section>

    <!-- About Section -->
    <section class="about-preview">
        <h2>About Us</h2>
        <p>Resala Charity is dedicated to helping communities through various charitable activities, including donations, volunteering, and educational support.</p>
        <a href="about.php" class="btn">Learn More</a>
    </section>

    <!-- Activities Preview -->
    <section class="activities-preview">
        <h2>Our Activities</h2>
        <div class="activities-cards">
            <div class="card">
                <h3>Blood Donation</h3>
                <p>Help save lives by donating blood at our local drives.</p>
                <a href="activities.php" class="btn">View Activities</a>
            </div>
            <div class="card">
                <h3>Food Distribution</h3>
                <p>Provide meals to families in need across the community.</p>
                <a href="activities.php" class="btn">View Activities</a>
            </div>
            <div class="card">
                <h3>Education Support</h3>
                <p>Help children with school supplies and tutoring programs.</p>
                <a href="activities.php" class="btn">View Activities</a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <h2>Get Involved Today!</h2>
        <a href="volunteer.php" class="btn">Become a Volunteer</a>
        <a href="donations.php" class="btn">Make a Donation</a>
    </section>
</main>

<?php include 'includes/footer.php'; ?>