<?php
$serviceRows = [];
$servicesFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Admin' . DIRECTORY_SEPARATOR . 'services-data.txt';

if (file_exists($servicesFile)) {
  $lines = file($servicesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  if ($lines !== false) {
    foreach ($lines as $line) {
      $parts = explode('~', $line, 3);
      $id = intval(trim($parts[0] ?? '0'));
      $name = trim($parts[1] ?? '');
      $description = trim($parts[2] ?? '');

      if ($id > 0 && $name !== '') {
        $serviceRows[] = [
          'id' => $id,
          'name' => $name,
          'description' => $description
        ];
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Our Services - Al Mesbah Al Modie Foundation</title>

    <meta name="description" content="Explore the humanitarian and social services provided by Al Mesbah Al Modie Foundation, including food distribution, medical support, water projects, and community assistance across Egypt.">
    <meta name="keywords" content="charity services Egypt, humanitarian projects, food distribution, medical aid, water projects, nonprofit services">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <meta name="robots" content="index, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css?v=20260310e">
    <script src="script.js?v=20260310e"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

    <!-- Start Header -->
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
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
            <li class="nav-item"><a class="btn btn-warning ms-lg-3 px-4 fw-semibold" href="donate.php">Donate</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Header -->


<!-- Start Body -->


<!-- Start Services provided -->

    <div class="services-container">
    <h1 class="services-title">Our Services</h1>
    <p class="page-intro">Al Mesbah Al Modie Foundation provides charity and humanitarian aid in Egypt through food security, medical support, housing assistance, seasonal campaigns, and direct help for families facing hardship.</p>

    <div class="services-grid">

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project1.jpg" alt="Ma’edet El Rahman" class="service-img">
          <h3 class="service-name">Ma’edet El Rahman</h3>
          <p class="service-desc">
            Organizing free iftar tables during Ramadan to serve daily meals for families in need.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project2.jpg" alt="Orphan’s Day Celebration" class="service-img">
          <h3 class="service-name">Orphan’s Day Celebration</h3>
          <p class="service-desc">We organize special events for orphans filled with joy, games, and gifts to bring happiness and a sense of belonging.</p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project3.jpg" alt="Ramadan Food Boxes" class="service-img">
          <h3 class="service-name">Ramadan Food Boxes</h3>
          <p class="service-desc">
          During Ramadan, we distribute essential food boxes to families, helping them prepare their daily meals with ease.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project4.jpg" alt="Mother’s Day Celebration" class="service-img">
          <h3 class="service-name">Mother’s Day Celebration</h3>
          <p class="service-desc">
            We honor mothers with gifts and gatherings to appreciate their efforts and spread love and gratitude in the community.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project5.jpg" alt="Paying Debts for the Needy" class="service-img">
          <h3 class="service-name">Paying Debts for the Needy</h3>
          <p class="service-desc">
            Our initiative helps families and individuals who are unable to repay their debts, relieving them from financial burdens.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project6.jpg" alt="Meat Distribution" class="service-img">
          <h3 class="service-name">Meat Distribution</h3>
          <p class="service-desc">
            Each Eid Al-Adha, we distribute fresh sacrificial meat to underprivileged families across various regions of Egypt.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project7.jpg" alt="Prosthetic Limbs Support" class="service-img">
          <h3 class="service-name">Prosthetic Limbs Support</h3>
          <p class="service-desc">
            We provide artificial limbs and medical support to amputees, helping them regain independence and confidence.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project8.jpg" alt="Water Connection Projects" class="service-img">
          <h3 class="service-name">Water Connection Projects</h3>
          <p class="service-desc">
            We work to supply clean and safe water to families in rural and underserved areas, improving their health and living conditions.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project9.jpg" alt="Distribution of Blankets" class="service-img">
          <h3 class="service-name">Distribution of Blankets</h3>
          <p class="service-desc">
            We distribute blankets and winter supplies to protect families from the cold during harsh winter months.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project10.jpg" alt="Bride Preparation Support" class="service-img">
          <h3 class="service-name">Bride Preparation Support</h3>
          <p class="service-desc">
            We assist brides from low-income families by providing essential home furnishings and wedding needs.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project11.jpg" alt="Home Renovation in Upper Egypt" class="service-img">
          <h3 class="service-name">Home Renovation in Upper Egypt</h3>
          <p class="service-desc">
            We repair and rebuild homes for families living in poor conditions across Upper Egypt villages.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project12.jpg" alt="Water Purification Stations" class="service-img">
          <h3 class="service-name">Water Purification Stations</h3>
          <p class="service-desc">
            We establish purification stations to provide clean, filtered water to rural communities lacking access to safe drinking water.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project13.jpg" alt="Home Renovation in Upper Egypt" class="service-img">
          <h3 class="service-name">Hearing Aid Installation for Children</h3>
          <p class="service-desc">
            We provide hearing aids and medical support to children with hearing difficulties, helping them reconnect, in their communities.
          </p>
        </div>
      </a>

      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project14.jpg" alt="Water Purification Stations" class="service-img">
          <h3 class="service-name">Cancer Patient Care</h3>
          <p class="service-desc">
            We offer support to cancer patients through treatment assistance and regular medical checkups to ease their journey toward recovery.
          </p>
        </div>
      </a>


      <a href="donate.php" class="project-link">
        <div class="service-card">
          <img src="images/project15.jpg" alt="Home Renovation in Upper Egypt" class="service-img">
          <h3 class="service-name">Dialysis Unit Support</h3>
          <p class="service-desc">
            We fund and equip dialysis units to ensure that patients with kidney failure receive the necessary treatment in a safe environment.
          </p>
        </div>
      </a>



    </div>
<!-- End Services provided -->




    <h2 class="services-subtitle">Service Summary (From Admin Data)</h2>

    <table class="services-table">
      <tr>
        <th>ID</th>
        <th>Service</th>
        <th>Description</th>
      </tr>
      <?php if (!empty($serviceRows)): ?>
        <?php foreach ($serviceRows as $serviceRow): ?>
          <tr>
            <td><?php echo htmlspecialchars((string) $serviceRow['id']); ?></td>
            <td><?php echo htmlspecialchars($serviceRow['name']); ?></td>
            <td><?php echo htmlspecialchars($serviceRow['description']); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">No services available. Add services from the admin dashboard.</td>
        </tr>
      <?php endif; ?>

    </table>
  </div>
  <!-- End Body -->


    <!-- Newsletter Signup Form -->
  <div class="newsletter-box">
      <div class="newsletter-text">
          <h2>Sign Up for Our Newsletter</h2>
          <p>Receive updates from Al Mesbah Al Modie Foundation about charity programs and humanitarian aid projects across Egypt.</p>
      </div>

      <form id="newsletterForm" action="subscription-confirmation.php" method="get" onsubmit="return validateNewsletterForm();">
          <input type="text" id="newsletterFirstName" name="first_name" placeholder="First Name">
          <input type="text" id="newsletterLastName" name="last_name" placeholder="Last Name">
          <input type="text" id="newsletterEmail" name="email" placeholder="Email">
          <button type="submit">Subscribe</button>
      </form>
  </div>



  <!-- Start Footer -->
  <div class="footer">
    <!-- LEFT SIDE -->
    <div class="footer-left">
      <h5>Quick Links</h5>
      <ul class="footer-links">
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="branches.php">Branches</a></li>
        <li><a href="faqs.php">FAQs</a></li>
      </ul>
    </div>

    <!-- RIGHT SIDE -->
    <div class="footer-right">
      <div class="contact-item">
        <i class="fa-solid fa-phone"></i>
        <div>16093</div>
      </div>

      <div class="contact-item">
        <i class="fa-solid fa-envelope"></i>
        <div>info@almesbah-almode.com</div>
      </div>

      <div class="contact-item">
        <i class="fa-solid fa-location-dot"></i>
        <div>6 Atlas Buildings, Ahmed Fakhry St., <br> Sixth District, Nasr City, Cairo</div>
      </div>

      <div class="footer-right-icons">
        <a href="https://www.facebook.com/ElMesbah.ElModea" target="_blank"><i class="fa-brands fa-facebook-f" id="facebook-icon"></i></a>
        <a href="https://www.instagram.com/elmesbaahelmodea/?igsh=MXJxYWFjazQwMjZiMw%3D%3D#" target="_blank"><i class="fa-brands fa-instagram" id="instagram-icon"></i></a>
        <a href="https://wa.me/201210012324" target="_blank"><i class="fa-brands fa-whatsapp" id="whatsapp-icon"></i></a>
      </div>
    </div>
  </div>
  <!-- End Footer -->


<!-- End Content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
