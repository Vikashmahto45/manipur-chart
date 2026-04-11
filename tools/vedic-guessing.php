<?php
$page_title = "Vedic Guessing Engine | Astrology Matka Predictor";
$meta_description = "Discover your Vedic lucky numbers for today's Matka draw. Our engine uses name and birth numerology to predict Manipur Day and Night numbers.";
include '../includes/db.php';
include '../includes/header.php';
?>

<div class="tool-page-container" style="max-width: 800px; margin: 50px auto; padding: 20px; text-align: center;">
    <h1 style="color: var(--accent); font-family: 'Orbitron', sans-serif;">Vedic Guessing Engine</h1>
    <p style="opacity: 0.8; margin-bottom: 30px;">Personalized Numerology-Based Matka Prediction</p>

    <div class="converter-card"
        style="background: rgba(43, 84, 126, 0.1); border: 1px solid rgba(138, 175, 206, 0.2); border-radius: 12px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <form method="POST">
            <input type="text" name="name" placeholder="Enter Your Name" required
                style="background: #1e1e1e; border: 1px solid rgba(255,255,255,0.2); color: #fff; padding: 15px; width: 80%; border-radius: 8px; font-size: 16px; margin-bottom: 15px;">
            <br>
            <input type="date" name="dob" required
                style="background: #1e1e1e; border: 1px solid rgba(255,255,255,0.2); color: #fff; padding: 15px; width: 80%; border-radius: 8px; font-size: 16px; margin-bottom: 20px;">
            <br>
            <button type="submit" class="refresh-btn" style="padding: 15px 40px; font-size: 16px;">GENERATE VEDIC
                GUESS</button>
        </form>

        <?php
        if (isset($_POST['name']) && isset($_POST['dob'])) {
            $name_val = strlen($_POST['name']);
            $date_val = str_replace('-', '', $_POST['dob']);
            $seed = $name_val + array_sum(str_split($date_val));

            srand($seed);
            $open = rand(100, 999);
            $jodi = rand(10, 99);
            $close = rand(100, 999);
            ?>
            <div class="result-box"
                style="margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px;">
                <h3 style="color: var(--accent);">Your Personalized Vedic Numbers</h3>
                <div style="display: flex; justify-content: space-around; margin-top: 25px;">
                    <div>
                        <span style="display: block; font-size: 12px; opacity: 0.7;">OPEN</span>
                        <span style="font-size: 28px; font-weight: bold;">
                            <?= $open ?>
                        </span>
                    </div>
                    <div>
                        <span style="display: block; font-size: 12px; opacity: 0.7;">JODI</span>
                        <span style="font-size: 42px; font-weight: bold; color: var(--accent);">
                            <?= $jodi ?>
                        </span>
                    </div>
                    <div>
                        <span style="display: block; font-size: 12px; opacity: 0.7;">CLOSE</span>
                        <span style="font-size: 28px; font-weight: bold;">
                            <?= $close ?>
                        </span>
                    </div>
                </div>
                <p style="margin-top: 30px; font-size: 13px; opacity: 0.6; font-style: italic;">Note: These are
                    numerological predictions for entertainment purposes only.</p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>