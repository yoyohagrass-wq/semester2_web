<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>
    <section class="donations">
        <h1>Make a Donation</h1>
        <p>Your contributions help us continue our charitable activities and reach more people in need. Choose the type of donation that works best for you.</p>

        <div class="donation-options">
            <div class="card">
                <h3>Monetary Donation</h3>
                <p>Support our programs financially. Every contribution counts.</p>
                <a href="donations.php#money-form" class="btn">Donate Money</a>
            </div>
            <div class="card">
                <h3>Blood Donation</h3>
                <p>Join our blood donation drives to save lives in the community.</p>
                <a href="volunteer.php" class="btn">Donate Blood</a>
            </div>
            <div class="card">
                <h3>Clothes & Supplies</h3>
                <p>Donate items like clothes, school supplies, or food to help those in need.</p>
                <a href="volunteer.php" class="btn">Donate Items</a>
            </div>
        </div>

        <!-- Optional Monetary Donation Form -->
        <section id="money-form" class="money-donation-form">
            <h2>Donate Money Online</h2>
            <form action="includes/functions.php" method="post">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" required>

                <label for="amount">Donation Amount ($):</label>
                <input type="number" name="amount" id="amount" min="1" required>

                <button type="submit" name="donate" class="btn">Donate</button>
            </form>
        </section>
    </section>
</main>

<?php include 'includes/footer.php'; ?>