<?php
// Force local connection for debug
$host = 'localhost'; $user = 'root'; $pass = ''; $db = 'manipur_chart_live'; 
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = $conn->query("SELECT * FROM live_results");
echo "TOTAL MARKETS IN DB: " . ($q ? $q->num_rows : 0) . "\n";
while($r = $q->fetch_assoc()) {
    echo "Market: " . $r['market_name'] . " | Result: " . $r['open_panna'] . "-" . $r['jodi'] . "-" . $r['close_panna'] . " | Time: " . $r['result_time'] . "\n";
}
?>
