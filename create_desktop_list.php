<?php
/**
 * Script to generate bulk URL list and save to Desktop
 */
$keywordFile = 'c:/xampp/htdocs/manipur chart/keyword.txt';
if (!file_exists($keywordFile)) {
    die("Error: keyword.txt not found.");
}

$keywords = file($keywordFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$baseUrl = "https://manipurchart.in/";
$outputFile = 'C:/Users/vikash/Desktop/bulk_urls_for_indexing.txt';

$content = $baseUrl . "\n"; // Home page

foreach ($keywords as $kw) {
    $kw = trim($kw);
    if (empty($kw)) continue;

    $slug = str_replace(' ', '-', strtolower($kw));
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug); 
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    if (empty($slug)) $slug = "satta-result-" . md5($kw);

    $content .= $baseUrl . $slug . "\n";
}

file_put_contents($outputFile, $content);
echo "Successfully created $outputFile with " . (count($keywords) + 1) . " URLs.\n";
?>
