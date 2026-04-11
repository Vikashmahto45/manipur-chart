<?php
$main_keyword = "manipur chart official";
$page_title = "Manipur Chart | Madhur Matka | Manipur Satta Matka | Kalyan Result";
$meta_description = "The official Manipur Chart portal. Get the fastest live results for Manipur Day and Night, verified historical charts, and expert matka guessing tips online.";

include 'includes/db.php';
include 'includes/header.php';
?>

<section class="market-results-section">
    <div class="market-grid">
        <?php
        // Fetch all markets from database
        if (isset($conn) && !($conn->connect_error)) {
            $markets_query = $conn->query("SELECT * FROM live_results ORDER BY id ASC");
            if ($markets_query && $markets_query->num_rows > 0) {
                while ($m = $markets_query->fetch_assoc()) {
                    ?>
                    <div class="market-item">
                        <h4><?= $m['market_name'] ?></h4>
                        <span class="market-time"><?= $m['open_time'] ?> - <?= $m['close_time'] ?></span>
                        <div class="market-result">
                            <span><?= $m['open_panna'] ?></span>-
                            <span class="jodi"><?= $m['jodi'] ?></span>-
                            <span><?= $m['close_panna'] ?></span>
                        </div>
                    </div>
                    <?php
                }
            }
        } else {
            // Fallback if DB not set up
            echo "<p style='text-align:center;'>Please setup database to see all market results.</p>";
        }
        ?>
    </div>
</section>

<div class="home-intro-content" style="margin-top: 40px;">
    <section class="seo-article">
        <h2>Official Manipur Chart Hub</h2>
        <p>Welcome to the most trusted destination for **Manipur Chart**, **Manipur Day**, and **Manipur Night**
            results. We provide the fastest updates for all major Satta Matka markets across India. Our professional
            dashboard is designed to give you real-time data at your fingertips.</p>

        <h3>Why Our Results Are Better?</h3>
        <p>Unlike other platforms, we verify every number before publishing. Whether you are following **Sridevi**,
            **Kalyan**, or **Milan Day**, you can rely on our accurate panna and jodi records. Our extensive archive
            allows you to analyze historical patterns to improve your guessing game.</p>

        <div class="faq-wrap">
            <div class="faq-item">
                <h4>How often are results updated?</h4>
                <p>Results are updated instantly as soon as the official board declares the winning numbers for each
                    session.</p>
            </div>
            <div class="faq-item">
                <h4>Is the Manipur Night chart available here?</h4>
                <p>Yes, we provide full coverage for both Manipur Day and Manipur Night sessions with detailed panel
                    records.</p>
            </div>
        </div>

        <h3>Manipur Chart Quick Navigation</h3>
        <div class="keyword-grid"
            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; margin-top: 15px;">
            <a href="manipur-chart-night" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Chart Night</a>
            <a href="manipur-chart-result" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Chart Result</a>
            <a href="manipur-guessing-chart" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Guessing Chart</a>
            <a href="manipur-rajdhani-night-chart" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Rajdhani Night</a>
            <a href="manipur-day-chart-live" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Day Chart Live</a>
            <a href="manipur-live-chart" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Live Chart</a>
            <a href="manipur-open-to-close-chart" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Open to Close</a>
            <a href="manipur-satta-chart-today" class="refresh-btn"
                style="text-decoration:none; font-size: 13px; padding: 10px;">Manipur Satta Chart Today</a>
        </div>
    </section>
</div>

<?php
include 'includes/seo_content.php'; // This adds the massive content block
include 'includes/footer.php';
?>