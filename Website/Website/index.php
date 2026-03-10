<?php
$impactStats = [
    ["value" => "16", "label" => "Active programs"],
    ["value" => "3", "label" => "Cairo branches"],
    ["value" => "100K+", "label" => "EGP monthly goal"],
];

$supportPillars = [
    [
        "icon" => "fa-solid fa-bowl-food",
        "title" => "Food Security",
        "text" => "Hot meals, Ramadan tables, and grocery support that help families manage daily needs.",
    ],
    [
        "icon" => "fa-solid fa-heart-pulse",
        "title" => "Medical Support",
        "text" => "Dialysis, cancer care, hearing aids, and prosthetic support for vulnerable patients.",
    ],
    [
        "icon" => "fa-solid fa-hand-holding-heart",
        "title" => "Emergency Relief",
        "text" => "Winter blankets, relief bags, debt support, and home renovation for families under pressure.",
    ],
];

$featuredPrograms = [
    [
        "image" => "images/project1.jpg",
        "title" => "Maedet El Rahman",
        "tag" => "Seasonal relief",
        "description" => "Public iftar tables during Ramadan that provide dependable daily meals for families in need.",
    ],
    [
        "image" => "images/project3.jpg",
        "title" => "Ramadan Food Boxes",
        "tag" => "Family support",
        "description" => "Essential food boxes that help households prepare meals at home with dignity and stability.",
    ],
    [
        "image" => "images/project7.jpg",
        "title" => "Prosthetic Limbs Support",
        "tag" => "Healthcare",
        "description" => "Artificial limbs and practical support that help amputees regain movement and independence.",
    ],
    [
        "image" => "images/project8.jpg",
        "title" => "Water Connection Projects",
        "tag" => "Infrastructure",
        "description" => "Clean water access for rural families through direct connection and improvement projects.",
    ],
    [
        "image" => "images/project11.jpg",
        "title" => "Home Renovation in Upper Egypt",
        "tag" => "Housing",
        "description" => "Repairing and rebuilding homes for families living in unsafe or unstable conditions.",
    ],
    [
        "image" => "images/project14.jpg",
        "title" => "Cancer Patient Care",
        "tag" => "Medical care",
        "description" => "Treatment assistance and regular checkups that reduce pressure on patients and caregivers.",
    ],
    [
        "image" => "images/project15.jpg",
        "title" => "Dialysis Unit Support",
        "tag" => "Hospital support",
        "description" => "Funding equipment and treatment capacity so kidney patients receive care safely and consistently.",
    ],
    [
        "image" => "images/project16.jpg",
        "title" => "Relief Bag Distribution",
        "tag" => "Rapid response",
        "description" => "Large-scale campaigns delivering basic essentials to families during difficult periods.",
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Al Mesbah Al Modie Foundation</title>
    <meta name="description" content="Al Mesbah Al Modie Foundation is a nonprofit charity in Egypt supporting needy families through humanitarian, social, and community projects." />
    <meta name="keywords" content="charity Egypt, nonprofit foundation, humanitarian aid, community support" />
    <meta name="author" content="Al Mesbah Al Modie Foundation" />
    <meta name="robots" content="index, follow" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css?v=20260310e">
    <link rel="stylesheet" href="home.css?v=20260310e">
</head>
<body class="home-page">
    <nav class="navbar navbar-expand-lg navbar-dark home-navbar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
                <img src="images/logo.png" alt="Al Mesbah Al Modie Foundation logo" class="home-logo" width="84" height="84">
                <span class="brand-copy">
                    <span class="brand-name">Al Mesbah Al Modie Foundation</span>
                    <span class="brand-subtitle">Charity and humanitarian aid in Egypt</span>
                </span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#homeNavbar" aria-controls="homeNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="homeNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
                    <li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero-section">
            <div class="hero-orb hero-orb-one"></div>
            <div class="hero-orb hero-orb-two"></div>
            <div class="hero-orb hero-orb-three"></div>
            <div class="container py-5">
                <div id="welcomeMessage" class="home-welcome fade-in">Supporting families across Egypt.</div>
                <div class="row align-items-center g-5 py-lg-4">
                    <div class="col-lg-6 fade-in">
                        <span class="hero-kicker">Direct help. Real outcomes.</span>
                        <h1 class="display-4 fw-bold text-white mt-3">Supporting families with food, healthcare, and emergency relief.</h1>
                        <p class="hero-lead mt-4">
                            Al Mesbah Al Modie Foundation works across Egypt to deliver practical support through trusted community programs, branch coordination, and donor-backed campaigns.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="donate.php" class="btn btn-warning btn-lg px-4 fw-semibold">Donate now</a>
                            <a href="volunteer.php" class="btn btn-outline-light btn-lg px-4">Join as a volunteer</a>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-3 g-3 mt-4">
                            <?php foreach ($impactStats as $index => $stat): ?>
                                <div class="col">
                                    <div class="impact-stat-card fade-in delay-<?= $index + 1 ?>">
                                        <strong><?= htmlspecialchars($stat["value"]) ?></strong>
                                        <span><?= htmlspecialchars($stat["label"]) ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-in delay-2">
                        <div class="hero-showcase">
                            <div class="hero-main-panel float-card">
                                <img src="images/project11.jpg" alt="Volunteers renovating a home" class="img-fluid">
                                <div class="hero-main-caption">
                                    <span>Current focus</span>
                                    <h2>Fast support for families facing housing and medical pressure.</h2>
                                </div>
                            </div>
                            <div class="hero-side-stack">
                                <div class="hero-mini-panel float-card delay-float">
                                    <img src="images/project1.jpg" alt="Food relief initiative" class="img-fluid">
                                </div>
                                <div class="hero-mini-panel hero-note float-card">
                                    <p class="mb-1 text-uppercase small fw-semibold">What donations fund</p>
                                    <strong>Meals, treatment, winter aid, and safer homes.</strong>
                                    <p class="mb-0 mt-2">Every contribution is routed into practical community support.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="support-section py-5">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center fade-in">
                        <span class="section-tag section-tag-dark">Core support</span>
                        <h2 class="section-title mt-3">Three ways the foundation shows up fast.</h2>
                        <p class="section-copy mb-0">Food, treatment, and urgent relief programs are designed to turn donations into direct support without delay.</p>
                    </div>
                </div>
                <div class="row g-4">
                    <?php foreach ($supportPillars as $index => $pillar): ?>
                        <div class="col-md-4">
                            <div class="pillar-card h-100 fade-in delay-<?= $index + 1 ?>">
                                <div class="pillar-icon">
                                    <i class="<?= htmlspecialchars($pillar["icon"]) ?>"></i>
                                </div>
                                <h2><?= htmlspecialchars($pillar["title"]) ?></h2>
                                <p><?= htmlspecialchars($pillar["text"]) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="featured-section py-5">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-4 fade-in">
                    <div>
                        <span class="section-tag">Featured programs</span>
                        <h2 class="section-title mt-2">Where support turns into direct community impact.</h2>
                        <p class="section-copy mb-0">A selection of the programs donors and volunteers help sustain across the year.</p>
                    </div>
                    <a href="services.php" class="btn btn-outline-dark px-4">View all services</a>
                </div>
                <div class="row g-4">
                    <?php foreach ($featuredPrograms as $index => $program): ?>
                        <div class="col-md-6 col-xl-3">
                            <a href="donate.php" class="program-link fade-in delay-<?= ($index % 4) + 1 ?>">
                                <article class="card border-0 h-100 program-card">
                                    <img src="<?= htmlspecialchars($program["image"]) ?>" alt="<?= htmlspecialchars($program["title"]) ?>" class="card-img-top program-image">
                                    <div class="card-body d-flex flex-column p-4">
                                        <span class="program-tag"><?= htmlspecialchars($program["tag"]) ?></span>
                                        <h3 class="program-title mt-3"><?= htmlspecialchars($program["title"]) ?></h3>
                                        <p class="program-description"><?= htmlspecialchars($program["description"]) ?></p>
                                        <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="inquiry-section py-5">
            <div class="container">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-5">
                        <div class="inquiry-panel h-100 fade-in">
                            <span class="section-tag">Reach out</span>
                            <h2 class="section-title mt-2">Ask a question or connect with the team.</h2>
                            <p class="section-copy">We respond to inquiries about donations, volunteering, branch support, and ongoing programs.</p>
                            <div class="contact-stack mt-4">
                                <div class="contact-chip">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>16093</span>
                                </div>
                                <div class="contact-chip">
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>info@almesbah-almode.com</span>
                                </div>
                                <div class="contact-chip align-items-start">
                                    <i class="fa-solid fa-location-dot mt-1"></i>
                                    <span>6 Atlas Buildings, Ahmed Fakhry St., Sixth District, Nasr City, Cairo</span>
                                </div>
                            </div>
                            <div class="quick-links-box mt-4">
                                <a href="feedback.php">Feedback</a>
                                <a href="branches.php">Branches</a>
                                <a href="faqs.php">FAQs</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-panel h-100 fade-in delay-2">
                            <form id="inquireForm" action="feedback-confirmation.php" method="get" onsubmit="return validateInquireForm();">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="inquireName" name="inquireName" placeholder="Your Name" required>
                                            <label for="inquireName">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="inquireEmail" name="inquireEmail" placeholder="Your Email" required>
                                            <label for="inquireEmail">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="inquirePhone" name="inquirePhone" placeholder="Your Phone" required>
                                            <label for="inquirePhone">Your Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control inquiry-textarea" id="inquireMessage" name="inquireMessage" placeholder="Your Message" required></textarea>
                                            <label for="inquireMessage">Your Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 pt-2">
                                        <p class="small text-muted mb-0">Our team will respond as soon as possible.</p>
                                        <button type="submit" class="btn btn-dark px-4">Send inquiry</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="home-footer py-4">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 fade-in">
            <div>
                <strong class="d-block">Al Mesbah Al Modie Foundation</strong>
                <span class="footer-copy">Charity and humanitarian aid in Egypt.</span>
            </div>
            <div class="footer-links-row d-flex flex-wrap gap-3">
                <a href="about.php">About</a>
                <a href="services.php">Services</a>
                <a href="volunteer.php">Volunteer</a>
                <a href="donate.php">Donate</a>
            </div>
            <div class="footer-social d-flex align-items-center gap-3">
                <a href="https://www.facebook.com/ElMesbah.ElModea" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/elmesbaahelmodea/?igsh=MXJxYWFjazQwMjZiMw%3D%3D#" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://wa.me/201210012324" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js?v=20260310e"></script>
</body>
</html>
