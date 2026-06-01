<?php
session_start();

include "functions.php";

saveDonation();
?>

<body class="bg-light">

<div class="min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div class="container">

      <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

          <div class="card shadow-lg border-0 rounded-4 text-center">

            <div class="card-body p-5">

              <div class="mb-4">
                <i class="fas fa-check-circle text-success check-icon"></i>
              </div>

              <h6 class="text-muted mb-3 text-uppercase fw-semibold">
                Donation received
              </h6>

              <h2 class="mb-2 fw-bold">
                Al Mesbah Al Modie Foundation
              </h2>

              <p class="text-muted mb-4">
                Charity and humanitarian aid in Egypt
              </p>

              <h1 class="display-5 fw-bold mb-4">
                Thank You
              </h1>

              <p class="lead mb-3">
                Your donation has been received successfully.
              </p>

              <p class="text-muted mb-5">
                Your support helps Al Mesbah Al Modie Foundation deliver food,
                medical care, and emergency relief to families across Egypt.
              </p>

              <a href="index.php"
              class="btn btn-warning btn-lg px-5 fw-semibold">

                <i class="fas fa-home me-2"></i>
                Back to Home

              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>