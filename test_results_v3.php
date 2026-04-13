<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Try 127.0.0.1 for local connection
$host = '127.0.0.1'; $user = 'root'; $pass = ''; $db = 'manipur_chart_live'; 
$conn = @new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo "Connection failed (127.0.0.1): " . $conn->connect_error . "\n";
    // Try localhost
    $host = 'localhost';
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed (localhost): " . $conn->connect_error);
    }
}

echo "Connection Success!\n";

$q = $conn->query("SELECT * FROM live_results");
if (!$q) {
    die("Query failed: " . $conn->error);
}

echo "TOTAL MARKETS IN DB: " . $q->num_rows . "\n";
while($r = $q->fetch_assoc()) {
    echo "Market: " . $r['market_name'] . " | Result: " . $r['open_panna'] . "-" . $r['jodi'] . "-" . $r['close_panna'] . "\n";
}
?>
