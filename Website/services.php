<?php
require_once 'functions.php';

$allServices = getAllServices();

pageHead(
    'Our Services - Al Mesbah Al Modie Foundation',
    'Explore the humanitarian and social services provided by Al Mesbah Al Modie Foundation, including food distribution, medical support, water projects, and community assistance across Egypt.',
    'charity services Egypt, humanitarian projects, food distribution, medical aid, water projects, nonprofit services'
);
headerSection();
?>

<div class="services-container">
    <h1 class="services-title">Our Services</h1>

    <div class="services-grid">

      <?php
        for($i = 0; $i < count($allServices); $i++)
      {
      ?>
        <div class="service-card">
         <img src="images/project<?php echo $allServices[$i]["Id"]; ?>.jpg"
             alt="<?php echo $allServices[$i]["Name"]; ?>"
             class="service-img">

          <div class="service-copy">
            <h3 class="service-name">
                <?php echo $allServices[$i]["Name"]; ?>
            </h3>

            <p class="service-desc">
                <?php echo $allServices[$i]["Description"]; ?>
            </p>
          </div>
        </div>
      <?php
      }
      ?>

    </div>

    <h2 class="services-subtitle">Service Summary</h2>

    <table class="services-table">
      <tr>
        <th>Service</th>
        <th>Region</th>
        <th>Beneficiaries</th>
      </tr>
      <tr>
        <td>Ma’edet El Rahman</td>
        <td>Cairo</td>
        <td>300 families</td>
      </tr>
      <tr>
        <td>Distribution of Blankets</td>
        <td>Fayoum</td>
        <td>150 families</td>
      </tr>
      <tr>
        <td>Prostethic limbs</td>
        <td>Assiout</td>
        <td>10 individuals</td>
      </tr>
      <tr>
        <td>Homes renovated</td>
        <td>Sohag</td>
        <td>50 families</td>
      </tr>
      <tr>
        <td>Brides prepared</td>
        <td>Luxor</td>
        <td>50 individuals</td>
      </tr>

    </table>
</div>
<?php
pageFooter();
pageClose();
?>