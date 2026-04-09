<?php
$page_title = "404 - Page Not Found | Manipur Chart";
$meta_description = "The page you are looking for has been moved or deleted. Access the fastest Manipur Satta Matka charts and live results here.";
include "includes/db.php";
include "includes/header.php";

// Set proper 404 status code (Critical for SEO)
http_response_code(404);
?>

<div class="error-container" style="text-align: center; padding: 60px 20px;">
    <h1 style="font-size: 80px; color: var(--accent-color); margin-bottom: 10px;">404</h1>
    <h2 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Oops! This Chart Has Moved</h2>
    <p style="color: var(--text-muted); font-size: 18px; max-width: 600px; margin: 0 auto 40px auto;">
        We recently updated our architectural database records. The link you used might be an old junk URL. Don't worry—your data still exists!
    </p>

    <div class="salvage-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; max-width: 800px; margin: 0 auto;">
        <a href="<?= $base_url ?>index" class="refresh-btn" style="text-decoration: none; padding: 20px;">Go to Live Home</a>
        <a href="<?= $base_url ?>panel-chart" class="refresh-btn" style="text-decoration: none; padding: 20px; background: #2980b9;">Panel Charts</a>
        <a href="<?= $base_url ?>jodi-chart" class="refresh-btn" style="text-decoration: none; padding: 20px; background: #27ae60;">Jodi Charts</a>
        <a href="<?= $base_url ?>all-pages" class="refresh-btn" style="text-decoration: none; padding: 20px; background: var(--bg-card); border: 1px solid var(--primary-color);">Browse All Pages</a>
    </div>

    <p style="margin-top: 50px; color: #555;">
        Still can't find what you need? <a href="<?= $base_url ?>contact">Contact our support center</a>.
    </p>
</div>

<?php include "includes/footer.php"; ?>
