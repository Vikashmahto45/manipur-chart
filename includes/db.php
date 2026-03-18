<?php
session_start();

$is_local = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['HTTP_HOST'] == 'localhost');

if ($is_local) {
    $host = 'localhost';
    $user = 'root';
    $pass = ''; 
    $db = 'manipur_chart_live'; 
} else {
    $host = 'localhost';
    $user = 'u823814640_manipurchart';
    $pass = 'Manipurchart1'; 
    $db = 'u823814640_manipurchart'; 
}

$conn = null;
try {
    $conn = @new mysqli($host, $user, $pass, $db);
    // Ignore error if DB doesn't exist yet, this is mostly for basic setup parity
} catch (Exception $e) {
    // Handling silently for static page setup
}

// Simulate "Live" updates by updating a random market result occasionally (10% chance per refresh)
if ($conn && !($conn->connect_error) && (rand(1, 10) == 5)) {
    $random_market_id = rand(1, 9);
    $new_jodi = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
    $conn->query("UPDATE live_results SET jodi = '$new_jodi' WHERE id = $random_market_id");
}
?>
