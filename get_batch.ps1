$count = 0
foreach ($l in (Get-Content bulk_urls.txt)) {
    $s = $l.Trim().Replace('https://manipurchart.in/', '').Trim('/')
    if ($s -ne 'index' -and -not $s.Contains('/') -and $s.Length -gt 0) {
        if (-not (Test-Path "$s.php")) { 
            Write-Output $s
            $count++
            if ($count -ge 15) { break }
        }
    }
}
