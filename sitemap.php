<?php
header("Content-Type: application/xml; charset=utf-8");

$base_url = "https://manipurchart.in/";
$directory = __DIR__;

// 1. Scan all PHP files in the root directory
$files = glob($directory . "/*.php");

// 2. Define Exclusions (Utility Scripts / System Files)
$exclusions = [
    'sitemap.php',
    'db.php',
    'header.php',
    'footer.php',
    'seo_content.php',
    'batch_processor_safe.php',
    'mass_gen_to_100.php',
    'delete_mistake_batch.php',
    'create_desktop_list.php',
    'temp_get_urls.php',
    'update_batch.php',
    'test_db.php',
    'check_missing.php'
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

foreach ($files as $file) {
    $filename = basename($file);
    
    // Skip exclusions
    if (in_array($filename, $exclusions)) continue;
    
    // Skip secondary result files that might be thin
    if (strpos($filename, 'process_') !== false) continue;

    // Build the URL slug
    $slug = str_replace('.php', '', $filename);
    
    // Priority Logic
    $priority = "0.6";
    $changefreq = "weekly";
    
    if ($slug == "index") {
        $url = $base_url;
        $priority = "1.0";
        $changefreq = "always";
    } else {
        $url = $base_url . $slug;
        
        // High-value chart pages get higher priority
        if (strpos($slug, 'chart') !== false || strpos($slug, 'result') !== false) {
            $priority = "0.8";
            $changefreq = "daily";
        }
    }

    echo "  <url>" . PHP_EOL;
    echo "    <loc>" . htmlspecialchars($url) . "</loc>" . PHP_EOL;
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>" . PHP_EOL;
    echo "    <changefreq>" . $changefreq . "</changefreq>" . PHP_EOL;
    echo "    <priority>" . $priority . "</priority>" . PHP_EOL;
    echo "  </url>" . PHP_EOL;
}

echo '</urlset>';
?>
