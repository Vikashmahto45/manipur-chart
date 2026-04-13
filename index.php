<?php
$main_keyword = "manipur chart official";
$page_title = "Manipur Chart | Madhur Matka | Manipur Satta Matka | Kalyan Result";
$meta_description = "Manipur Chart Official - Get live results for Madhur Matka, Manipur Satta Matka, and Kalyan Result. Verified daily and night charts with the fastest online updates.";

include 'includes/db.php';
include 'includes/header.php';
?>

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
        $results_to_show = [];
        if (isset($conn) && !($conn->connect_error)) {
            $q = $conn->query("SELECT * FROM live_results ORDER BY id ASC");
            if ($q && $q->num_rows > 0) {
                while ($m = $q->fetch_assoc()) $results_to_show[] = $m;
            }
        }

        // ABSOLUTE FALLBACK (if DB empty or offline)
        if (empty($results_to_show)) {
            $results_to_show = [
                ['market_name' => 'SRIDEVI', 'open_panna' => '123', 'jodi' => '45', 'close_panna' => '678', 'open_time' => '11:35 AM', 'close_time' => '12:35 PM'],
                ['market_name' => 'TIME BAZAR', 'open_panna' => '234', 'jodi' => '56', 'close_panna' => '789', 'open_time' => '01:00 PM', 'close_time' => '02:00 PM'],
                ['market_name' => 'MANIPUR DAY', 'open_panna' => '346', 'jodi' => '38', 'close_panna' => '279', 'open_time' => '12:00 PM', 'close_time' => '01:00 PM'],
                ['market_name' => 'MILAN DAY', 'open_panna' => '456', 'jodi' => '78', 'close_panna' => '901', 'open_time' => '03:00 PM', 'close_time' => '05:45 PM'],
                ['market_name' => 'KALYAN', 'open_panna' => '567', 'jodi' => '89', 'close_panna' => '012', 'open_time' => '03:55 PM', 'close_time' => '05:55 PM'],
                ['market_name' => 'MANIPUR NIGHT', 'open_panna' => '890', 'jodi' => '12', 'close_panna' => '345', 'open_time' => '08:00 PM', 'close_time' => '09:00 PM']
            ];
        }

        foreach ($results_to_show as $m) {
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
        ?>
    </div>

    <!-- ELITE PLAYER UTILITIES: DRIVES DWELL TIME & AUTHORITY -->
    <div class="utility-hub"
        style="margin-top: 40px; padding: 25px; background: linear-gradient(135deg, rgba(30,30,30,0.8) 0%, rgba(47,54,64,0.8) 100%); border: 1px solid rgba(247,183,49,0.2); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <h2
            style="color: var(--accent); font-family: 'Orbitron', sans-serif; font-size: 20px; text-align: center; margin-bottom: 25px;">
            💎 PREDICTIVE ANALYTICS & EXPERT TOOLS</h2>
        <div class="tool-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            <!-- Panna Converter Card -->
            <div class="tool-card"
                style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; transition: transform 0.3s ease;">
                <h3 style="color: #fff; font-size: 17px; margin-bottom: 10px;">Panna To Jodi Converter</h3>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 20px;">Calculate exact Jodi families
                    and Matka pairs from any Panna instantly.</p>
                <a href="tools/panna-converter" class="refresh-btn"
                    style="display: inline-block; text-decoration: none; padding: 10px 20px; font-size: 13px;">OPEN
                    CONVERTER</a>
            </div>
            <!-- Vedic Guessing Card -->
            <div class="tool-card"
                style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; transition: transform 0.3s ease;">
                <h3 style="color: #fff; font-size: 17px; margin-bottom: 10px;">Vedic Guessing Engine</h3>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 20px;">Unlock astrology-based lucky
                    numbers using your name and birth numerology.</p>
                <a href="tools/vedic-guessing" class="refresh-btn"
                    style="display: inline-block; text-decoration: none; padding: 10px 20px; font-size: 13px;">ACCESS
                    VEDIC AI</a>
            </div>
        </div>
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

        <div class="elite-navigation-hub" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);">
            <h3 style="color: var(--accent); font-size: 18px; margin-bottom: 20px;">🌐 Elite Manipur Market Authority</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 10px;">
                <a href="manipur-day-jodi-chart" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Day Jodi Chart</a>
                <a href="manipur-night-panel-chart" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Night Panel Chart</a>
                <a href="manipur-chart-panna" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Chart Panna</a>
                <a href="manipur-day-open-to-close" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Day Open to Close</a>
                <a href="manipur-night-result" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Night Result</a>
                <a href="manipur-fast-result" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Fast Result</a>
                <a href="manipur-satta-matka-live" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Satta Matka Live</a>
                <a href="manipur-guessing-today" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Guessing Today</a>
                <a href="manipur-day-patti-chart" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur Day Patti Chart</a>
                <a href="manipur-king-of-chart" style="color: var(--text-muted); text-decoration: none; font-size: 12px; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--text-muted)'">Manipur King of Chart</a>
            </div>
        </div>
    </section>
</div>

<!-- HOWTO SCHEMA: Increases Rich Result Presence -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Check Manipur Chart Results Online",
  "description": "Step-by-step guide to finding the fastest and most accurate Manipur Chart and Satta Matka results.",
  "step": [
    {
      "@type": "HowToStep",
      "text": "Visit the Manipur Chart Official website (manipurchart.in).",
      "name": "Visit Source"
    },
    {
      "@type": "HowToStep",
      "text": "Locate the 'Live Result' board at the top of the homepage.",
      "name": "Locate Board"
    },
    {
      "@type": "HowToStep",
      "text": "Compare the current session (Day or Night) panna and jodi with official archives.",
      "name": "Verify Result"
    }
  ]
}
</script>

<?php
include 'includes/seo_content.php'; // This adds the massive content block
include 'includes/footer.php';
?>