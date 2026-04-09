<?php
$c = file_get_contents('http://localhost/manipur%20chart/sitemap.xml');
file_put_contents('scratch/count.txt', substr_count($c, '<url>'));
?>
