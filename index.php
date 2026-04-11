<?php
$main_keyword = "manipur chart official";
$page_title = "Manipur Chart | Madhur Matka | Manipur Satta Matka | Kalyan Result";
$meta_description = "Manipur Chart Official - Get live results for Madhur Matka, Manipur Satta Matka, and Kalyan Result. Verified daily and night charts with the fastest online updates.";

include 'includes/db.php';
include 'includes/header.php';
?>

<!-- DEPLOYMENT TEST: VERIFY CONNECTION -->
<div
    style="background: red; color: white; padding: 10px; text-align: center; font-weight: bold; position: fixed; top: 0; width: 100%; z-index: 9999;">
    DEPLOYMENT TEST ACTIVE - VERSION 5.0
</div>

<section class="market-results-section">
    <!-- ELITE SEO: Live Countdown Timer (Increases Dwell Time) -->
    <div class="countdown-container"
        style="background: rgba(43, 84, 126, 0.1); border-left: 4px solid var(--accent); padding: 15px; margin-bottom: 20px; border-radius: 8px;">
        <h3 style="margin: 0; font-size: 16px; color: var(--accent);">NEXT MARKET DRAW</h3>
        <div id="market-timer"
            style="font-family: 'Orbitron', sans-serif; font-size: 24px; font-weight: 700; color: #fff; margin-top: 5px;">
            00:00:00</div>
        <p id="timer-label" style="margin: 5px 0 0 0; font-size: 12px; opacity: 0.8;">Manipur Day update in progress...
        </p>
    </div>

    <script>
        function updateCountdown() {
            // Target Times (Indian Standard Time)
            const targets = [
                { name: "Manipur Day", hour: 12, min: 0 },
                { name: "Manipur Night", hour: 20, min: 0 }
            ];

            const now = new Date();
            let next = null;
            let minDiff = Infinity;

            targets.forEach(t => {
                let targetDate = new Date(now);
                targetDate.setHours(t.hour, t.min, 0, 0);

                if (targetDate < now) {
                    targetDate.setDate(targetDate.getDate() + 1);
                }

                let diff = targetDate - now;
                if (diff < minDiff) {
                    minDiff = diff;
                    next = t;
                }
            });

            if (next) {
                const h = Math.floor(minDiff / (1000 * 60 * 60));
                const m = Math.floor((minDiff % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((minDiff % (1000 * 60)) / 1000);

                document.getElementById('market-timer').innerText =
                    String(h).padStart(2, '0') + ":" +
                    String(m).padStart(2, '0') + ":" +
                    String(s).padStart(2, '0');
                document.getElementById('timer-label').innerText = "Next Update: " + next.name;
            }
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>

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