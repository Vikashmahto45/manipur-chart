<?php
/**
 * Controlled Batch Generator (Batch 1: 1-50)
 * This script generates only the first 50 pages from keyword.txt
 */

$keywordFile = 'keyword.txt';
$keywords = file($keywordFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$batch_size = 50;
$count = 0;

foreach ($keywords as $kw) {
    if ($count >= $batch_size) break;
    
    $kw = trim($kw);
    $slug = str_replace(' ', '-', strtolower($kw));
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug); 
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    if (empty($slug)) $slug = "satta-result-" . md5($kw);

    $filename = $slug . ".php";
    
    // Check if it's already a protected file (though we cleaned up, safety first)
    $protected = ['index.php', 'about-us.php', 'privacy-policy.php', 'disclaimer.php', 'contact-us.php', 'manipur-night-chart.php', 'manipur-day-chart.php', 'panel-chart.php', 'jodi-chart.php', 'old-record.php'];
    if (in_array($filename, $protected)) {
        continue;
    }

    $content = "<?php
\$main_keyword = \"$kw\";
\$page_title = \"" . ucwords($kw) . " - Fastest Satta Matka Results\";
\$meta_description = \"Check live $kw results online. We provide the fastest and most accurate $kw charts and panel records for all Matka players.\";
include \"includes/db.php\";
include \"includes/header.php\";
include \"includes/seo_content.php\";
include \"includes/footer.php\";
?>";

    file_put_contents($filename, $content);
    $count++;
}

echo "Batch 1 Complete: Generated $count high-quality pages.\n";
?>
