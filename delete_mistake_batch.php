<?php
$keywordFile = 'bulk_urls.txt';
$urls = file($keywordFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$deleted_count = 0;

$time_threshold = strtotime('-30 minutes'); // Only delete files created in the last 30 mins

foreach ($urls as $url) {
    if (empty(trim($url))) continue;
    $slug = rtrim(str_replace("https://manipurchart.in/", "", trim($url)), '/');
    if (empty($slug) || $slug === "index") continue;
    
    $file = $slug . '.php';
    if (file_exists($file)) {
        $mtime = filemtime($file);
        // If modified in the last 30 mins, delete it (this wipes batch 16-100)
        if ($mtime >= $time_threshold) {
            unlink($file);
            $deleted_count++;
            echo "Deleted $file\n";
        }
    }
}
echo "Total deleted: $deleted_count files.\n";
?>
