<?php
/**
 * EMERGENCY GHOST PURGE TOOL
 * This script physically deletes any orphaned "junk" files from the server disk.
 * Run this ONCE in your browser, then DELETE this file for security.
 */

$directory = __DIR__;
$deleted_count = 0;
$log = [];

echo "<h1>Starting Emergency Disk Cleanup...</h1><hr>";

// 1. Delete the rogue sitemap.xml if it exists
if (file_exists('sitemap.xml')) {
    if (unlink('sitemap.xml')) {
        $log[] = "SUCCESS: Deleted physical sitemap.xml (This was blocking the new code)";
        $deleted_count++;
    }
}

// 2. Scan for physical junk files (names starting with http or containing domain)
$files = scandir($directory);

foreach ($files as $file) {
    // Only target .php files that shouldn't be there
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        
        $should_delete = false;
        
        // Pattern A: Filename starts with 'http' or 'https'
        if (stripos($file, 'http') === 0) $should_delete = true;
        
        // Pattern B: Filename contains the site domain (indicates a scrape error)
        if (stripos($file, 'manipurchart') !== false && $file !== 'sitemap.php') {
            // Only delete if it looks like a junk name (too long or contains dots)
            if (strlen($file) > 50 || strpos($file, 'https') !== false) {
                $should_delete = true;
            }
        }

        if ($should_delete) {
            if (unlink($file)) {
                $log[] = "DELETED JUNK: $file";
                $deleted_count++;
            } else {
                $log[] = "FAILED TO DELETE: $file (Check permissions)";
            }
        }
    }
}

echo "<h3>Cleanup Finished!</h3>";
echo "<b>Total Files Purged: $deleted_count</b><br><br>";
echo "<ul>";
foreach ($log as $entry) {
    echo "<li>$entry</li>";
}
echo "</ul>";

if ($deleted_count === 0) {
    echo "<p>No physical junk files found. Your disk is already clean.</p>";
}

echo "<hr><p style='color:red;'><b>IMPORTANT: Now delete this file (purge_ghosts.php) from your server for security.</b></p>";
?>
