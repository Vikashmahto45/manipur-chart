<?php
$lines = file('bulk_urls.txt', FILE_IGNORE_NEW_LINES);
$c=0;
$out = [];
foreach($lines as $l){
    $s=trim(str_replace('https://manipurchart.in/', '', $l), '/');
    if(!empty($s) && $s !== 'index' && strpos($s, '/')===false && !file_exists($s.'.php')){ 
        $out[] = $s; 
        $c++; 
        if($c>=25) break; 
    }
}
file_put_contents('temp_missing_urls.txt', implode("\n", $out));
?>
