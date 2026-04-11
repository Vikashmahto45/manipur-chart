<!DOCTYPE html>
<?php
// --- SILENT ROBOT TRIGGER: HANDS-OFF AUTOMATION ---
if (isset($conn) && !($conn->connect_error)) {
    require_once __DIR__ . '/harvester.php';
    syncLiveResults($conn);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Manipur Chart Satta Matka Result' ?></title>
    <meta name="description"
        content="<?= isset($meta_description) ? $meta_description : 'Get the fastest and most accurate Manipur Chart and Satta Matka results online.' ?>">
    <meta name="keywords"
        content="<?= isset($main_keyword) ? $main_keyword : 'manipur chart' ?>, satta matka, manipur day, manipur night, kalyan result, matka guessing">

    <!-- OpenGraph / Social Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://manipurchart.in/">
    <meta property="og:site_name" content="Manipur Chart Official">
    <meta property="og:locale" content="en_IN">
    <meta property="og:title" content="<?= isset($page_title) ? $page_title : 'Manipur Chart Official' ?>">
    <meta property="og:description"
        content="<?= isset($meta_description) ? $meta_description : 'The fastest source for Manipur Chart and Satta results.' ?>">
    <meta property="og:image" content="https://manipurchart.in/assets/images/icon-512.webp">
    <meta property="og:image:width" content="512">
    <meta property="og:image:height" content="512">
    <meta property="og:image:type" content="image/webp">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= isset($page_title) ? $page_title : 'Manipur Chart Official' ?>">
    <meta name="twitter:description"
        content="<?= isset($meta_description) ? $meta_description : 'The fastest source for Manipur Chart and Satta results.' ?>">
    <meta name="twitter:image" content="https://manipurchart.in/assets/images/icon-512.webp">

    <?php
    $base_url = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/manipur chart/' : '/';
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    // Strip query strings and .php extension for canonical
    $clean_uri = preg_replace('/\.php$/', '', explode('?', $uri)[0]);
    $canonical_url = "https://manipurchart.in" . $clean_uri;

    // --- EMERGENCY SEO RECOVERY: AUTHORITY CONSOLIDATION ---
    // We are pointing the 750+ template pages back to the Home Page to reclaim lost ranking power.
    $recovery_whitelist = [
        '/',
        '/index',
        '/manipur-chart-night',
        '/manipur-day-chart',
        '/panel-chart',
        '/jodi-chart',
        '/all-pages'
    ];

    if (in_array($clean_uri, $recovery_whitelist)) {
        // High-Value Core Pages: Keep self-referencing to rank individually
        if ($clean_uri == "/index" || $clean_uri == "/") {
            $canonical_url = "https://manipurchart.in/";
        } else {
            $canonical_url = "https://manipurchart.in" . $clean_uri;
        }
    } else {
        // Template/Duplicate Pages: Consolidate authority back to Home to stop the penalty
        $canonical_url = "https://manipurchart.in/";
    }
    // --- END RECOVERY LOGIC ---
    ?>

    <!-- Resource Hints: Optimized for Core Web Vitals (INP/LCP/FCP) -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://www.highperformanceformat.com">
    <link rel="dns-prefetch" href="https://t.me">
    <link rel="dns-prefetch" href="https://youtube.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://www.highperformanceformat.com" crossorigin>

    <!-- Performance: Preload Critical Assets -->
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Orbitron:wght@500;700;900&display=swap"
        as="style">
    <link rel="preload" href="<?= $base_url ?>assets/css/style.css" as="style">

    <!-- Predictive Prefetch: Speed up next user navigation -->
    <link rel="prefetch" href="<?= $base_url ?>manipur-chart-night">

    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Orbitron:wght@500;700;900&display=swap"
        rel="stylesheet">

    <link rel="icon" type="image/png" href="<?= $base_url ?>assets/images/download.png?v=4.0">
    <link rel="shortcut icon" href="<?= $base_url ?>assets/images/download.png?v=4.0">
    <link rel="apple-touch-icon" href="<?= $base_url ?>assets/images/download.png?v=4.0">
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css?v=3.0">

    <!-- PWA & Mobile Optimization -->
    <meta name="theme-color" content="#1e1e1e">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Manipur Chart">
    <link rel="manifest" href="<?= $base_url ?>manifest.json">

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('<?= $base_url ?>sw.js')
                    .then(reg => console.log('Service Worker Registered'))
                    .catch(err => console.log('Service Worker Failed', err));
            });
        }
    </script>

    <!-- JSON-LD Core Schemas -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "speakable": {
        "@type": "SpeakableSpecification",
        "cssSelector": [".live-result-board h3", ".live-numbers"]
      },
      "name": "Manipur Chart Live Results",
      "description": "Here is the latest Manipur Chart result for today..."
    }
    </script>

    <?php
    // --- SERP NINJA: SpecialAnnouncement Schema ---
    // This forces Google to see live results in a machine-readable format for Rich Snippets.
    if (isset($conn) && !($conn->connect_error)) {
        $recent_res = $conn->query("SELECT * FROM live_results ORDER BY id DESC LIMIT 1");
        if ($recent_res && $recent_res->num_rows > 0) {
            $r = $recent_res->fetch_assoc();
            $full_res = $r['open_panna'] . "-" . $r['jodi'] . "-" . $r['close_panna'];
            $update_date = date('c');
            ?>
            <script type="application/ld+json">
                            {
                              "@context": "https://schema.org",
                              "@type": "SpecialAnnouncement",
                              "name": "<?= $r['market_name'] ?> Live Result",
                              "text": "Latest Result: <?= $full_res ?>",
                              "datePosted": "<?= $update_date ?>",
                              "announcementLocation": {
                                "@type": "Place",
                                "name": "Manipur Chart Official"
                              }
                            }
                            </script>
            <?php
        }
    }

    // --- ELITE SEO: FAQ Schema (Homepage Only) ---
    // This allows your site to take up 2x more space in Google Search with expandable questions.
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page == 'index.php') {
        ?>
        <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "FAQPage",
                  "mainEntity": [
                    {
                      "@type": "Question",
                      "name": "How often are Manipur Chart results updated?",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Results are updated instantly every time a market opens or closes. We provide 24/7 automated updates for Manipur Day and Night sessions."
                      }
                    },
                    {
                      "@type": "Question",
                      "name": "Is the Manipur Night chart 100% accurate?",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Yes, our Manipur Night records and Panel Charts are verified against official records to ensure 100% historical accuracy for all players."
                      }
                    }
                  ]
                }
                </script>
        <?php
    }
    ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Manipur Chart Official",
      "url": "https://manipurchart.in/",
      "logo": "https://manipurchart.in/assets/images/download.png",
      "sameAs": [
        "https://t.me/manipurchart",
        "https://youtube.com/@manipurchart"
      ]
    }
    </script>
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
                    <img src="<?= $base_url ?>assets/images/download.png" alt="Manipur Chart Logo"
                        style="height: 50px; width: auto; margin-right: 15px;">
                    <div>
                        <div class="site-title"
                            style="margin: 0; font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 24px; color: #fff;">
                            <span class="highlight">MANIPUR</span> CHART
                        </div>
                        <span class="tagline">India's Fastest Satta Result</span>
                    </div>
                </a>
            </div>
            <nav class="navbar" aria-label="Main Navigation">
                <ul class="nav-links">
                    <li><a href="<?= $base_url ?>index">Home</a></li>
                    <li><a href="<?= $base_url ?>panel-chart">Panel Chart</a></li>
                    <li><a href="<?= $base_url ?>jodi-chart">Jodi Chart</a></li>
                    <li><a href="<?= $base_url ?>contact">Contact</a></li>
                    <li><a href="<?= $base_url ?>category/manipur-updates">Manipur Updates</a></li>
                    <li><a href="<?= $base_url ?>manipur-day-chart">Day Result</a></li>
                    <li><a href="<?= $base_url ?>manipur-night-chart">Night Result</a></li>
                </ul>
                <div class="mobile-toggle" aria-label="Toggle Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>

    <!-- Visual Breadcrumbs for UX and SEO Dwell Time -->
    <nav class="breadcrumb-container" aria-label="Breadcrumb">
        <div class="container">
            <ul class="breadcrumb-list">
                <li><a href="<?= $base_url ?>index">Home</a></li>
                <?php if ($clean_uri != "/index" && $clean_uri != "/"): ?>
                    <li><span class="separator">/</span></li>
                    <li><a href="<?= $base_url ?>all-pages">Archive</a></li>
                    <li><span class="separator">/</span></li>
                    <li class="active">
                        <?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Current Chart' ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container">
            <?php if ($clean_uri == "/index" || $clean_uri == "/"): ?>
                <h1 class="dynamic-heading">
                    <?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Manipur Chart' ?>
                </h1>
            <?php else: ?>
                <h2 class="dynamic-heading">
                    <?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Manipur Chart' ?>
                </h2>
            <?php endif; ?>
            <p class="hero-subtext">Check live, accurate, and fastest updates for
                <?= isset($main_keyword) ? ucwords(str_replace('-', ' ', $main_keyword)) : 'Manipur Chart' ?> right
                here!
            </p>

            <div class="lucky-number-banner container"
                style="text-align: center; margin: 15px auto; padding: 15px; background: linear-gradient(135deg, #1e1e1e 0%, #2f3640 100%); border: 2px dashed var(--primary-color); border-radius: 12px; box-shadow: 0 5px 20px rgba(247,183,49,0.15); max-width: 600px;">
                <h3 style="color: #fff; margin-bottom: 8px; font-size: 16px;">🔥 <span id="luckyCounter">15,482</span>
                    People Checking Lucky Numbers Live</h3>
                <p style="color: var(--text-muted); margin-bottom: 15px; font-size: 13px;">Get today's 100% free
                    guaranteed passing Panna and Jodi.</p>
                <a href="<?= $base_url ?>lucky-number.php#loader-section" class="refresh-btn pulse-glow"
                    style="display: inline-block; text-decoration: none; font-size: 14px; padding: 10px 25px; border-radius: 30px;">GENERATE
                    MY LUCKY NUMBER</a>
                <script>
                    setInterval(function () {
                        let count = parseInt(document.getElementById('luckyCounter').innerText.replace(/,/g, ''));
                        count += Math.floor(Math.random() * 7) - 2;
                        document.getElementById('luckyCounter').innerText = count.toLocaleString();
                    }, 3500);
                </script>
            </div>

        </div>
    </div>

    <!-- Live Result Section: Fetches Latest Result for "Freshness" Signal -->
    <section class="live-result-board">
        <div class="container">
            <?php
            $live_data = null;
            if (isset($conn) && !($conn->connect_error)) {
                try {
                    // Logic: Get the MOST RECENT updated market to signal freshness to Googlebot
                    $q = $conn->query("SELECT * FROM live_results ORDER BY id DESC LIMIT 1");
                    if ($q && $q->num_rows > 0) {
                        $live_data = $q->fetch_assoc();
                    }
                } catch (Exception $e) {
                    $live_data = null;
                }
            }
            ?>
            <div class="result-card pulse-glow">
                <h3><?= $live_data ? $live_data['market_name'] . ' LATEST' : 'LIVE UPDATES' ?></h3>
                <div class="live-numbers">
                    <span class="panel"><?= $live_data ? $live_data['open_panna'] : '---' ?></span>-
                    <span class="jodi"><?= $live_data ? $live_data['jodi'] : '--' ?></span>-
                    <span class="panel"><?= $live_data ? $live_data['close_panna'] : '---' ?></span>
                </div>
                <button class="refresh-btn" onclick="window.location.reload();">Refresh Result ↻</button>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">