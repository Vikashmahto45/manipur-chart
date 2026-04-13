<?php
include "includes/db.php";
$q = $conn->query("SELECT * FROM live_results");
echo "DEBUG RESULTS:\n";
while($r = $q->fetch_assoc()) {
    print_r($r);
}
?>
