<?php
/**
 * DYNAMIC SITEMAP ENGINE - (REAL-TIME ONLY / NO CACHE)
 * Author: Antigravity AI
 * Logic: Scans the root directory for physical .php files and generates SEO-ready XML.
 */

// Force XML headers
header("Content-Type: application/xml; charset=utf-8");

$base_url = "https://manipurchart.in/";
$directory = __DIR__;

// Exclusions (Utility Scripts / System Files)
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
    'check_missing.php',
    'full_file_list.txt',
    'file_list_dump.txt',
    'file_list_utf8.txt'
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

// 1. Scanning ONLY the current root directory
$files = glob($directory . "/*.php");

foreach ($files as $file) {
    if (!is_file($file))
        continue; // REALITY CHECK: File must physically exist

    $filename = basename($file);

    // Ignore exclusions and hidden files
    if (in_array($filename, $exclusions) || $filename[0] === '.')
        continue;
    if (strpos($filename, 'process_') !== false)
        continue;

    $slug = str_replace('.php', '', $filename);

    // --- STRICT PROTOCOL FILTER ---
    // Reject any filename that contains 'http' (Strips junk mistake files)
    if (stripos($slug, 'http') !== false)
        continue;

    // Reject if slug contains dots (Protects against double extensions/routes)
    if (strpos($slug, '.') !== false)
        continue;

    // Sanity Check: Must be a string
    if (empty($slug))
        continue;

    // --- SITEMAP RECOVERY PRIORITIES ---
    $priority = "0.6";
    $changefreq = "weekly";

    $whitelist_slugs = ['index', 'manipur-chart-night', 'manipur-day-chart', 'panel-chart', 'jodi-chart', 'all-pages'];

    if ($slug == "index") {
        $url = $base_url;
        $priority = "1.0";
        $changefreq = "always";
    } elseif (in_array($slug, $whitelist_slugs)) {
        $url = $base_url . $slug;
        $priority = "0.9"; // Core Authority Pages
        $changefreq = "daily";
    } else {
        $url = $base_url . $slug;
        $priority = "0.4"; // Low priority during recovery
        $changefreq = "monthly";
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