<?php
/**
 * MANIPUR RAPID HARVESTER - (100% HANDS-OFF AUTOMATION)
 * Logic: Synchronizes local database with official result centers.
 */

function syncLiveResults($conn)
{
    if (!$conn || $conn->connect_error)
        return false;

    // 1. Throttle: Only run every 10 minutes to protect performance
    $throttle_file = __DIR__ . '/harvester_lock.txt';
    if (file_exists($throttle_file)) {
        if (time() - filemtime($throttle_file) < 600) {
            return false; // Too soon
        }
    }
    touch($throttle_file);

    // 2. Source Configuration (Using a reliable public mirror)
    // In a real environment, we'd use a rotating proxy or a dedicated API.
    // Here we implement the logic that targets industry-standard result layouts.
    $source_url = "https://satta1.net/"; // A lightweight mirror source

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $source_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $html = curl_exec($ch);

    if (!$html)
        return false;

    // 3. Extraction Patterns (Highly specialized regex for Matka result strings)
    // Structure: NAME [OPEN_PANNA-JODI-CLOSE_PANNA]
    // Example: MANIPUR DAY [123-45-678]

    $markets_to_sync = [
        'SRIDEVI',
        'TIME BAZAR',
        'SRIDEVI DAY',
        'MILAN DAY',
        'KALYAN',
        'MANIPUR DAY',
        'MILAN NIGHT',
        'KALYAN NIGHT',
        'MANIPUR NIGHT'
    ];

    foreach ($markets_to_sync as $m_name) {
        // Regex to find the result block for the specific market
        // Note: This pattern is optimized for common Matka landing page structures.
        $pattern = '/' . preg_quote($m_name) . '.*?(\d{3})-(\d{2})-(\d{3})/is';

        if (preg_match($pattern, $html, $matches)) {
            $open = $matches[1];
            $jodi = $matches[2];
            $close = $matches[3];

            // 4. Atomic Update: Only update if the result is NEW
            $stmt = $conn->prepare("UPDATE live_results SET open_panna = ?, jodi = ?, close_panna = ?, result_time = CURRENT_TIMESTAMP WHERE market_name = ? AND (open_panna != ? OR jodi != ? OR close_panna != ?)");
            $stmt->bind_param("sssssss", $open, $jodi, $close, $m_name, $open, $jodi, $close);
            $stmt->execute();
            $stmt->close();
        }
    }

    return true;
}
?>