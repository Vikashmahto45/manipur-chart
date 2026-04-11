<?php
$page_title = "Panna to Jodi Converter | Matka Family Calculator";
$meta_description = "Use our premium Panna to Jodi converter to calculate your Matka families and Jodi pairs instantly. A must-have tool for professional Matka guessing.";
include '../includes/db.php';
include '../includes/header.php';
?>

<div class="tool-page-container" style="max-width: 800px; margin: 50px auto; padding: 20px; text-align: center;">
    <h1 style="color: var(--accent); font-family: 'Orbitron', sans-serif;">Panna To Jodi Converter</h1>
    <p style="opacity: 0.8; margin-bottom: 30px;">Professional Matka Family & Jodi Calculator</p>

    <div class="converter-card"
        style="background: rgba(43, 84, 126, 0.1); border: 1px solid rgba(138, 175, 206, 0.2); border-radius: 12px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <form method="POST">
            <input type="number" name="panna" placeholder="Enter 3-Digit Panna (Ex: 123)" required
                style="background: #1e1e1e; border: 1px solid var(--accent); color: #fff; padding: 15px; width: 80%; border-radius: 8px; font-size: 18px; text-align: center; margin-bottom: 20px;">
            <br>
            <button type="submit" class="refresh-btn" style="padding: 15px 40px; font-size: 16px;">CALCULATE
                JODI</button>
        </form>

        <?php
        if (isset($_POST['panna'])) {
            $panna = $_POST['panna'];
            if (strlen($panna) == 3) {
                $digits = str_split($panna);
                $sum = array_sum($digits) % 10;
                $jodi = $sum . (($sum + 5) % 10);
                ?>
                <div class="result-box"
                    style="margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px;">
                    <h2 style="color: #fff;">Calculated Jodi: <span
                            style="color: var(--accent); font-size: 48px; display: block; margin-top: 10px;">
                            <?= $jodi ?>
                        </span></h2>
                    <p style="color: #ccc; font-size: 14px; margin-top: 20px;">Family Numbers:
                        <span style="display: block; font-weight: bold; margin-top: 10px; font-size: 18px; color: #fff;">
                            <?= $jodi[0] . $jodi[1] ?> |
                            <?= $jodi[1] . $jodi[0] ?> |
                            <?= ($jodi[0] + 5) % 10 . $jodi[1] ?> |
                            <?= $jodi[0] . ($jodi[1] + 5) % 10 ?>
                        </span>
                    </p>
                </div>
                <?php
            } else {
                echo "<p style='color: #ff4444; margin-top: 20px;'>Please enter a valid 3-digit number.</p>";
            }
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>