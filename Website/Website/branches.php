<?php require_once 'functions.php'; ?>
<?php pageHead(
    'Branches - Al Mesbah Al Modie Foundation',
    'Find all Al Mesbah Al Modie Foundation branches across Egypt, including Rehab City, Nasr City, and the 5th Settlement.',
    'Al Mesbah Al Modie Foundation branches, Egypt charity locations, Rehab City branch, Nasr City branch, 5th Settlement branch'
); ?>
<?php navBar(); ?>

<div class="branches-container">
    <h1 class="branches-title">Our Branches</h1>
    <p class="branches-subtitle">Find the Al Mesbah Al Modie Foundation branch network that supports charity and humanitarian aid work in Egypt, including donation coordination, volunteering, and direct family support.</p>

    <div class="branches-grid">
        <a href="https://www.google.com/maps?q=Administrative%20Building%2C%20Office%20No.%2014%2C%20Al%20Rehab%20City%2C%20Cairo" class="branch-card" target="_blank" rel="noopener noreferrer">
            <h2>Rehab City Branch</h2>
            <p>Located in the heart of Rehab City, serving the surrounding communities with dedication and care.<br>Administrative Building, Office No. 14, Al Rehab City, Cairo</p>
        </a>
        <a href="https://www.google.com/maps?q=6%20Atlas%20Buildings%2C%20Ahmed%20Fakhry%20St.%2C%20Sixth%20District%2C%20Nasr%20City%2C%20Cairo" class="branch-card" target="_blank" rel="noopener noreferrer">
            <h2>Nasr City Branch</h2>
            <p>Our central branch that manages donations, community events, and volunteer coordination.<br>6 Atlas Buildings, Ahmed Fakhry St., Sixth District, Nasr City, Cairo</p>
        </a>
        <a href="https://www.google.com/maps?q=Southern%20Investors%20District%2C%20Street%2090%2C%20Family%20Housing%203%2C%20New%20Cairo" class="branch-card" target="_blank" rel="noopener noreferrer">
            <h2>The 5th Settlement Branch</h2>
            <p>Supporting families in the eastern Cairo region with ongoing relief and educational programs.<br>Southern Investors District, Street 90, Family Housing 3, New Cairo</p>
        </a>
    </div>
</div>

<?php pageFooter(); ?>
<?php pageClose(); ?>
