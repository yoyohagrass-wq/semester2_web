<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: register.php");
    exit;
}

$impactStats = [
["value"=>"16","label"=>"Active programs"],
["value"=>"3","label"=>"Cairo branches"],
["value"=>"100K+","label"=>"EGP monthly goal"],
];

$supportPillars = [
["icon"=>"fa-solid fa-bowl-food","title"=>"Food Security","text"=>"Hot meals, Ramadan tables, and grocery support that help families manage daily needs."],
["icon"=>"fa-solid fa-heart-pulse","title"=>"Medical Support","text"=>"Dialysis, cancer care, hearing aids, and prosthetic support for vulnerable patients."],
["icon"=>"fa-solid fa-hand-holding-heart","title"=>"Emergency Relief","text"=>"Winter blankets, relief bags, debt support, and home renovation for families under pressure."],
];

$featuredPrograms = [
["image"=>"images/project1.jpg","title"=>"Maedet El Rahman","tag"=>"Seasonal relief","description"=>"Public iftar tables during Ramadan that provide dependable daily meals for families in need."],
["image"=>"images/project3.jpg","title"=>"Ramadan Food Boxes","tag"=>"Family support","description"=>"Essential food boxes that help households prepare meals at home with dignity and stability."],
["image"=>"images/project7.jpg","title"=>"Prosthetic Limbs Support","tag"=>"Healthcare","description"=>"Artificial limbs and practical support that help amputees regain movement and independence."],
["image"=>"images/project8.jpg","title"=>"Water Connection Projects","tag"=>"Infrastructure","description"=>"Clean water access for rural families through direct connection and improvement projects."],
["image"=>"images/project11.jpg","title"=>"Home Renovation in Upper Egypt","tag"=>"Housing","description"=>"Repairing and rebuilding homes for families living in unsafe or unstable conditions."],
["image"=>"images/project14.jpg","title"=>"Cancer Patient Care","tag"=>"Medical care","description"=>"Treatment assistance and regular checkups that reduce pressure on patients and caregivers."],
["image"=>"images/project15.jpg","title"=>"Dialysis Unit Support","tag"=>"Hospital support","description"=>"Funding equipment and treatment capacity so kidney patients receive care safely and consistently."],
["image"=>"images/project16.jpg","title"=>"Relief Bag Distribution","tag"=>"Rapid response","description"=>"Large-scale campaigns delivering basic essentials to families during difficult periods."],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Al Mesbah Al Modie Foundation</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="style.css?v=20260310e">
<link rel="stylesheet" href="home.css?v=20260310e">
</head>

<body class="home-page">

<nav class="navbar navbar-expand-lg navbar-dark home-navbar sticky-top py-3">
<div class="container">

<a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
<img src="images/logo.png" class="home-logo" width="84" height="84">
<span>
<span class="brand-name">Al Mesbah Al Modie Foundation</span><br>
<small>Charity and humanitarian aid in Egypt</small>
</span>
</a>

<button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#homeNavbar">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="homeNavbar">
<ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
<li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
<li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
<li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
<li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
<li class="nav-item"><a class="btn btn-outline-light ms-lg-2 px-4" href="logout.php">Logout</a></li>
</ul>
</div>

</div>
</nav>

<main>

<section class="hero-section">
<div class="container py-5">

<h1 class="display-4 fw-bold text-white">Supporting families with food, healthcare, and emergency relief.</h1>

<div class="row row-cols-1 row-cols-sm-3 g-3 mt-4">

<div class="col">
<div class="impact-stat-card fade-in delay-1">
<strong><?= htmlspecialchars($impactStats[0]["value"]) ?></strong>
<span><?= htmlspecialchars($impactStats[0]["label"]) ?></span>
</div>
</div>

<div class="col">
<div class="impact-stat-card fade-in delay-2">
<strong><?= htmlspecialchars($impactStats[1]["value"]) ?></strong>
<span><?= htmlspecialchars($impactStats[1]["label"]) ?></span>
</div>
</div>

<div class="col">
<div class="impact-stat-card fade-in delay-3">
<strong><?= htmlspecialchars($impactStats[2]["value"]) ?></strong>
<span><?= htmlspecialchars($impactStats[2]["label"]) ?></span>
</div>
</div>

</div>
</div>
</section>

<section class="support-section py-5">
<div class="container">
<div class="row g-4">

<div class="col-md-4">
<div class="pillar-card h-100">
<i class="<?= htmlspecialchars($supportPillars[0]["icon"]) ?>"></i>
<h2><?= htmlspecialchars($supportPillars[0]["title"]) ?></h2>
<p><?= htmlspecialchars($supportPillars[0]["text"]) ?></p>
</div>
</div>

<div class="col-md-4">
<div class="pillar-card h-100">
<i class="<?= htmlspecialchars($supportPillars[1]["icon"]) ?>"></i>
<h2><?= htmlspecialchars($supportPillars[1]["title"]) ?></h2>
<p><?= htmlspecialchars($supportPillars[1]["text"]) ?></p>
</div>
</div>

<div class="col-md-4">
<div class="pillar-card h-100">
<i class="<?= htmlspecialchars($supportPillars[2]["icon"]) ?>"></i>
<h2><?= htmlspecialchars($supportPillars[2]["title"]) ?></h2>
<p><?= htmlspecialchars($supportPillars[2]["text"]) ?></p>
</div>
</div>

</div>
</div>
</section>

<section class="featured-section py-5">
<div class="container">
<div class="row g-4">

<?php for($i=0;$i<8;$i++): ?>

<div class="col-md-6 col-xl-3">
<a href="donate.php" class="program-link">

<article class="card border-0 h-100 program-card">

<img src="<?= htmlspecialchars($featuredPrograms[$i]["image"]) ?>" class="card-img-top program-image">

<div class="card-body d-flex flex-column p-4">

<span class="program-tag"><?= htmlspecialchars($featuredPrograms[$i]["tag"]) ?></span>

<h3 class="program-title mt-3">
<?= htmlspecialchars($featuredPrograms[$i]["title"]) ?>
</h3>

<p class="program-description">
<?= htmlspecialchars($featuredPrograms[$i]["description"]) ?>
</p>

<span class="program-cta mt-auto">
Support this program
<i class="fa-solid fa-arrow-right ms-2"></i>
</span>

</div>

</article>
</a>
</div>

<?php endfor; ?>

</div>
</div>
</section>

</main>

<footer class="home-footer py-4">
<div class="container text-center">

<strong>Al Mesbah Al Modie Foundation</strong>
<p>Charity and humanitarian aid in Egypt.</p>

<div>
<a href="about.php">About</a> |
<a href="services.php">Services</a> |
<a href="volunteer.php">Volunteer</a> |
<a href="donate.php">Donate</a>
</div>

</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js?v=20260310e"></script>

</body>
</html>