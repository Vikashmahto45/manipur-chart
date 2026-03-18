<?php
$page_title = "Satta Matka Master Index - All Manipur Charts";
$meta_description = "Browse our complete archive of 100+ Satta Matka charts and Manipur result records. All historical data in one place.";
include 'includes/db.php';
include 'includes/header.php';
?>

<div class="index-container">
    <h1 style="text-align:center; color: #333; margin-bottom: 30px;">Premium Satta Matka Archive</h1>
    <p style="text-align:center; color: #666; max-width: 800px; margin: 0 auto 40px;">Explore our officially verified 100+ high-quality Satta Matka charts and Manipur result records. All historical data has been manually verified for 100% accuracy.</p>
    
    <div class="link-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px; padding: 20px;">
        <!-- Ranking Pages -->
        <a href="panel-chart" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Manipur Panel Chart</a>
        <a href="jodi-chart" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Manipur Jodi Chart</a>
        <a href="old-record" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Manipur Old Records</a>
        <a href="how-to-check-manipur-night-result" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Manipur Night Result Guide</a>
        <a href="fastest-manipur-result-website" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Fastest Manipur Website</a>
        <a href="manipur-satta-result-today" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Manipur Result Today</a>
        <a href="category/manipur-updates" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Manipur News Updates</a>
        <a href="contact" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02); font-weight: bold; border-left: 4px solid #c5a059;">Contact Official Team</a>

        <?php
        $keywords = file('keyword.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($keywords as $kw) {
            $kw = trim($kw);
            if ($kw === 'URL') continue;
            
            // Extract slug from URL: https://manipurchart.in/slug
            if (preg_match('/https:\/\/manipurchart\.in\/(.*)/', $kw, $matches)) {
                $slug = $matches[1];
                $linkText = str_replace('-', ' ', $slug);
                
                // Only show links for files that currently exist to avoid 404s
                if (file_exists("$slug.php")) {
                    echo '<a href="' . $slug . '" class="keyword-link" style="display: block; padding: 12px 20px; background: #fff; border: 1px solid #eee; border-radius: 8px; text-decoration: none; color: #444; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">' . ucwords($linkText) . '</a>';
                }
            }
        }
        ?>
    </div>
</div>

<style>
.keyword-link:hover {
    background: #f8f9fa !important;
    border-color: #007bff !important;
    color: #007bff !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
}
.index-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
}
</style>

<?php 
include 'includes/footer.php'; 
?>
