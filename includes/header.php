<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Manipur Chart Satta Matka Result' ?></title>
    <meta name="description" content="<?= isset($meta_description) ? $meta_description : 'Get the fastest and most accurate Manipur Chart and Satta Matka results online.' ?>">
    <meta name="keywords" content="<?= isset($main_keyword) ? $main_keyword : 'manipur chart' ?>, satta matka, manipur day, manipur night, kalyan result, matka guessing">
    <?php
    $base_url = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/manipur chart/' : '/';
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    // Strip query strings and .php extension for canonical
    $clean_uri = preg_replace('/\.php$/', '', explode('?', $uri)[0]);
    $canonical_url = "https://manipurchart.in" . $clean_uri;
    
    // Consolidation Strategy: Point all Manipur-related sub-pages to the Home Page
    // to build 'Super Authority' on the main domain.
    if (isset($main_keyword) && (strpos(strtolower($main_keyword), 'manipur') !== false) && $clean_uri != "/index" && $clean_uri != "/") {
        $canonical_url = "https://manipurchart.in/";
    }
    
    // Special case for home page root
    if ($clean_uri == "/index" || $clean_uri == "/") { $canonical_url = "https://manipurchart.in/"; }
    ?>
    <!-- Premium Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <!-- Site Icon -->
    <link rel="icon" type="image/png" href="<?= $base_url ?>assets/images/download.png">
    <link rel="shortcut icon" href="<?= $base_url ?>assets/images/download.png">
    <link rel="apple-touch-icon" href="<?= $base_url ?>assets/images/download.png">
    <!-- Canonical URL for SEO -->
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
    
    <!-- JSON-LD Schema for Google -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Manipur Chart Official",
      "url": "https://manipurchart.in/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://manipurchart.in/all-pages?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://manipurchart.in/"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "<?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Manipur Chart' ?>",
        "item": "<?= $canonical_url ?>"
      }]
    }
    </script>

</head>
<body>
    
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <a href="<?= $base_url ?>index" style="display: flex; align-items: center; text-decoration: none;">
                    <img src="<?= $base_url ?>assets/images/download.png" alt="Manipur Chart Logo" style="height: 50px; width: auto; margin-right: 15px;">
                    <div>
                        <div class="site-title" style="margin: 0; font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 24px; color: #fff;"><span class="highlight">MANIPUR</span> CHART</div>
                        <span class="tagline">India's Fastest Satta Result</span>
                    </div>
                </a>
            </div>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="<?= $base_url ?>index">Home</a></li>
                    <li><a href="<?= $base_url ?>panel-chart">Panel Chart</a></li>
                    <li><a href="<?= $base_url ?>jodi-chart">Jodi Chart</a></li>
                    <li><a href="<?= $base_url ?>contact">Contact</a></li>
                    <li><a href="<?= $base_url ?>category/manipur-updates">Manipur Updates</a></li>
                    <li><a href="<?= $base_url ?>manipur-day-chart">Day Result</a></li>
                    <li><a href="<?= $base_url ?>manipur-night-chart">Night Result</a></li>
                </ul>
                <div class="mobile-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>

    <div class="hero-section">
        <div class="container">
            <h1 class="dynamic-heading"><?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Manipur Chart' ?></h1>
            <p class="hero-subtext">Check live, accurate, and fastest updates for <?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Manipur Chart' ?> right here!</p>
            
            <!-- Lucky Number Hook -->
            <div class="lucky-number-banner container" style="text-align: center; margin: 15px auto; padding: 15px; background: linear-gradient(135deg, #1e1e1e 0%, #2f3640 100%); border: 2px dashed var(--primary-color); border-radius: 12px; box-shadow: 0 5px 20px rgba(247,183,49,0.15); max-width: 600px;">
                <h3 style="color: #fff; margin-bottom: 8px; font-size: 16px;">🔥 <span id="luckyCounter">15,482</span> People Checking Lucky Numbers Live</h3>
                <p style="color: var(--text-muted); margin-bottom: 15px; font-size: 13px;">Get today's 100% free guaranteed passing Panna and Jodi.</p>
                <a href="<?= $base_url ?>lucky-number.php#loader-section" class="refresh-btn pulse-glow" style="display: inline-block; text-decoration: none; font-size: 14px; padding: 10px 25px; border-radius: 30px;">GENERATE MY LUCKY NUMBER</a>
                <script>
                    setInterval(function() {
                        let count = parseInt(document.getElementById('luckyCounter').innerText.replace(/,/g, ''));
                        count += Math.floor(Math.random() * 7) - 2;
                        document.getElementById('luckyCounter').innerText = count.toLocaleString();
                    }, 3500);
                </script>
            </div>

            </div>
        </div>
    </div>

    <!-- Live Result Section -->
    <section class="live-result-board">
        <div class="container">
            <?php
            // Fetch live result from database
            $live_data = null;
            if (isset($conn) && !($conn->connect_error)) {
                try {
                    // Pick a random market to show in the live board to make it feel dynamic
                    $q = $conn->query("SELECT * FROM live_results ORDER BY RAND() LIMIT 1");
                    if ($q && $q->num_rows > 0) {
                        $live_data = $q->fetch_assoc();
                    }
                } catch (Exception $e) { $live_data = null; }
            }
            ?>
            <div class="result-card pulse-glow">
                <h3><?= $live_data ? $live_data['market_name'] . ' LIVE' : 'MANIPUR DAY LIVE' ?></h3>
                <div class="live-numbers">
                    <span class="panel"><?= $live_data ? $live_data['open_panna'] : '346' ?></span>-
                    <span class="jodi"><?= $live_data ? $live_data['jodi'] : '38' ?></span>-
                    <span class="panel"><?= $live_data ? $live_data['close_panna'] : '279' ?></span>
                </div>
                <button class="refresh-btn" onclick="window.location.reload();">Refresh Result ↻</button>
            </div>
        </div>
    </section>
    
    </section>
    
    <main class="main-content">
        <div class="container">
