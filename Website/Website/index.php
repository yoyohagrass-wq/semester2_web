<?php
require_once 'functions.php'; 
pageHead(
    'Al Mesbah Al Modie Foundation',
    'Learn about Al Mesbah Al Modie Foundation, our mission, values, and commitment to charity and humanitarian aid in Egypt.',
    'about charity Egypt, nonprofit mission, humanitarian organization Egypt'
);
headerSection();
?>


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
                            <div class="col">
                                <div class="impact-stat-card fade-in delay-1">
                                    <strong>16</strong>
                                    <span>Active programs</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="impact-stat-card fade-in delay-2">
                                    <strong>3</strong>
                                    <span>Cairo branches</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="impact-stat-card fade-in delay-3">
                                    <strong>100K+</strong>
                                    <span>EGP monthly goal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-in delay-2">
                        <div class="hero-showcase">
                            <div class="hero-main-panel float-card">
                                <img src="images/project11.jpg" alt="Volunteers renovating a home" class="img-fluid">
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
                    <div class="col-md-4">
                        <div class="pillar-card h-100 fade-in delay-1">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-bowl-food"></i>
                            </div>
                            <h2>Food Security</h2>
                            <p>Hot meals, Ramadan tables, and grocery support that help families manage daily needs.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pillar-card h-100 fade-in delay-2">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <h2>Medical Support</h2>
                            <p>Dialysis, cancer care, hearing aids, and prosthetic support for vulnerable patients.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pillar-card h-100 fade-in delay-3">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-hand-holding-heart"></i>
                            </div>
                            <h2>Emergency Relief</h2>
                            <p>Winter blankets, relief bags, debt support, and home renovation for families under pressure.</p>
                        </div>
                    </div>
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
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-1">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project1.jpg" alt="Maedet El Rahman" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Seasonal relief</span>
                            <h3 class="program-title mt-3">Maedet El Rahman</h3>
                            <p class="program-description">Public iftar tables during Ramadan that provide dependable daily meals for families in need.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-2">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project3.jpg" alt="Ramadan Food Boxes" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Family support</span>
                            <h3 class="program-title mt-3">Ramadan Food Boxes</h3>
                            <p class="program-description">Essential food boxes that help households prepare meals at home with dignity and stability.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-3">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project7.jpg" alt="Prosthetic Limbs Support" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Healthcare</span>
                            <h3 class="program-title mt-3">Prosthetic Limbs Support</h3>
                            <p class="program-description">Artificial limbs and practical support that help amputees regain movement and independence.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-4">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project8.jpg" alt="Water Connection Projects" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Infrastructure</span>
                            <h3 class="program-title mt-3">Water Connection Projects</h3>
                            <p class="program-description">Clean water access for rural families through direct connection and improvement projects.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-1">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project11.jpg" alt="Home Renovation in Upper Egypt" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Housing</span>
                            <h3 class="program-title mt-3">Home Renovation in Upper Egypt</h3>
                            <p class="program-description">Repairing and rebuilding homes for families living in unsafe or unstable conditions.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-2">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project14.jpg" alt="Cancer Patient Care" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Medical care</span>
                            <h3 class="program-title mt-3">Cancer Patient Care</h3>
                            <p class="program-description">Treatment assistance and regular checkups that reduce pressure on patients and caregivers.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-3">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project15.jpg" alt="Dialysis Unit Support" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Hospital support</span>
                            <h3 class="program-title mt-3">Dialysis Unit Support</h3>
                            <p class="program-description">Funding equipment and treatment capacity so kidney patients receive care safely and consistently.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="donate.php" class="program-link fade-in delay-4">
                    <article class="card border-0 h-100 program-card">
                        <img src="images/project16.jpg" alt="Relief Bag Distribution" class="card-img-top program-image">
                        <div class="card-body d-flex flex-column p-4">
                            <span class="program-tag">Rapid response</span>
                            <h3 class="program-title mt-3">Relief Bag Distribution</h3>
                            <p class="program-description">Large-scale campaigns delivering basic essentials to families during difficult periods.</p>
                            <span class="program-cta mt-auto">Support this program <i class="fa-solid fa-arrow-right ms-2"></i></span>
                        </div>
                    </article>
                </a>
            </div>
        </div>
    </div>
</section>
        <section class="inquiry-section py-5">
            <div class="container">
                <div class="row g-4 align-items-stretch">
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

<?php
pageFooter();
pageClose();
?>
