<?php
session_start();

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_REQUEST["name"]);
    $email = trim($_REQUEST["email"]);
    $donationAmount = trim($_REQUEST["donation-amount"]);
    $donorMessage = trim($_REQUEST["donorMessage"]);

    if($username == "" || $email == "" || $donationAmount == "" || !is_numeric($donationAmount) || $donationAmount <= 0 ){
        $error = "Please fill all fields correctly";
    }
    else {

        $FileHandler = fopen("../semester2_web/Admin/donations.txt", "a+") or die("error opening file!");
        $newdata = $username . "~" . $email . "~" . $donationAmount . "~" . $donorMessage . "\n";

        fwrite($FileHandler, $newdata);
        fclose($FileHandler);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation Successful - Al Mesbah Al Modie Foundation</title>

  <meta name="description" content="Donation confirmation for Al Mesbah Al Modie Foundation, a charity and humanitarian aid organization in Egypt.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-light">

<?php if($error != ""){ ?>

<div class="min-vh-100 d-flex align-items-center justify-content-center">

    <div class="card shadow-lg border-0 rounded-4 p-5 text-center">

        <h2 class="text-danger mb-3">
            Error
        </h2>

        <p class="mb-4">
            <?php echo $error; ?>
        </p>

        <a href="javascript:history.back()" class="btn btn-danger">
            Go Back
        </a>

    </div>

</div>

<?php } else { ?>

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
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>