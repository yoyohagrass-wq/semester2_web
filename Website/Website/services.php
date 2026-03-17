<?php
require_once 'functions.php';
$services  = getServicesData();
$serviceRows = loadServicesData();
?>
<?php pageHead(
    'Our Services - Al Mesbah Al Modie Foundation',
    'Explore the humanitarian and social services provided by Al Mesbah Al Modie Foundation, including food distribution, medical support, water projects, and community assistance across Egypt.',
    'charity services Egypt, humanitarian projects, food distribution, medical aid, water projects, nonprofit services'
); ?>
<?php navBar('services'); ?>

<div class="services-container">
    <h1 class="services-title">Our Services</h1>
    <p class="page-intro">Al Mesbah Al Modie Foundation provides charity and humanitarian aid in Egypt through food security, medical support, housing assistance, seasonal campaigns, and direct help for families facing hardship.</p>

    <div class="services-grid">
        <?php foreach ($services as $service): ?>
            <a href="donate.php" class="project-link service-link">
                <div class="service-card">
                    <img src="<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['name']) ?>" class="service-img">
                    <div class="service-copy">
                        <h3 class="service-name"><?= htmlspecialchars($service['name']) ?></h3>
                        <p class="service-desc"><?= htmlspecialchars($service['desc']) ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <h2 class="services-subtitle">Service Summary (From Admin Data)</h2>
    <table class="services-table">
        <tr><th>ID</th><th>Service</th><th>Description</th></tr>
        <?php if (!empty($serviceRows)): ?>
            <?php foreach ($serviceRows as $row): ?>
                <tr>
                    <td><?= htmlspecialchars((string)$row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3">No services available. Add services from the admin dashboard.</td></tr>
        <?php endif; ?>
    </table>
</div>

<?php newsletterBox('Receive updates from Al Mesbah Al Modie Foundation about charity programs and humanitarian aid projects across Egypt.'); ?>
<?php pageFooter(); ?>
<?php pageClose(); ?>
