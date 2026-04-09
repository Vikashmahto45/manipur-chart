<?php
/**
 * Professional Satta Matka Automation Engine
 * Version: 2.0.0
 * Logic: Deterministic Time-Based Result Declaration
 */

session_start();
date_default_timezone_set('Asia/Kolkata');

$is_local = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['HTTP_HOST'] == 'localhost');

if ($is_local) {
    $host = 'localhost'; $user = 'root'; $pass = ''; $db = 'manipur_chart_live'; 
} else {
    $host = 'localhost'; $user = 'u823814640_manipurchart'; $pass = 'Manipurchart1'; $db = 'u823814640_manipurchart'; 
}

$conn = null;
try {
    $conn = @new mysqli($host, $user, $pass, $db);
} catch (Exception $e) { /* Fail silently to maintain UI stability */ }

/**
 * AUTOMATION ENGINE:
 * Triggers results 5 minutes after Market Close Time.
 * Logic ensures exactly ONE update per day per market.
 */
if ($conn && !$conn->connect_error) {
    $now_ts = time();
    $today_date = date('Y-m-d');
    
    // Process all markets
    $markets = $conn->query("SELECT id, market_name, close_time, result_time FROM live_results");
    
    if ($markets && $markets->num_rows > 0) {
        while ($m = $markets->fetch_assoc()) {
            $last_update_date = date('Y-m-d', strtotime($m['result_time']));
            
            // Step 1: Check if market is already updated for today
            if ($last_update_date !== $today_date) {
                
                // Step 2: Calculate the Trigger Time (Close Time + 5 Minutes)
                $close_ts = strtotime($today_date . ' ' . $m['close_time']);
                $trigger_ts = $close_ts + (5 * 60); // 5 minute delay
                
                if ($now_ts >= $trigger_ts) {
                    // Step 3: Generate Mathematically Believable Satta Numbers
                    // Panna (3 digits): Random but logical
                    $open_panna = str_pad(rand(1, 9).rand(0, 9).rand(0, 9), 3, '0', STR_PAD_LEFT);
                    $close_panna = str_pad(rand(1, 9).rand(0, 9).rand(0, 9), 3, '0', STR_PAD_LEFT);
                    
                    // Jodi: 2 digits
                    $jodi = str_pad(rand(0, 9).rand(0, 9), 2, '0', STR_PAD_LEFT);
                    
                    // Step 4: Atomic Update
                    $stmt = $conn->prepare("UPDATE live_results SET open_panna=?, jodi=?, close_panna=?, result_time=NOW() WHERE id=?");
                    $stmt->bind_param("sssi", $open_panna, $jodi, $close_panna, $m['id']);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
    }
}
?>

