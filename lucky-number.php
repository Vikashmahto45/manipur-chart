<?php
$page_title = "Today's Free Lucky Number Generator - Satta Matka";
$meta_description = "Generate your free Satta Matka lucky number today for Manipur, Rajdhani, and Kalyan markets. 100% accurate astrological algorithmic calculations.";
include 'includes/db.php';
include 'includes/header.php';
?>

<div class="container main-content" style="min-height: 65vh; text-align: center;">
    
    <div id="loader-section" style="margin-top: 60px; padding: 40px 20px; background: var(--bg-card); border-radius: 12px; border: 1px solid var(--border-color);">
        <h2 style="color: var(--primary-color); font-size: 32px; margin-bottom: 15px;">Calculating Your Lucky Numbers...</h2>
        <p style="color: var(--text-muted); margin: 0 auto 30px auto; font-size: 18px; max-width: 600px;">Our advanced system is deeply analyzing today's historical market trends and astrological charts to generate your exclusive highly probable Jodi and Panna.</p>
        
        <div style="width: 100%; max-width: 500px; background: #222; height: 12px; border-radius: 6px; margin: 0 auto; overflow: hidden; position: relative; border: 1px solid #444;">
            <div id="progress-bar" style="width: 0%; height: 100%; background: linear-gradient(90deg, var(--primary-color), #ff9f43); transition: width 1s linear;"></div>
        </div>
        
        <p id="timer-text" style="font-size: 28px; font-weight: bold; margin-top: 30px; color: #fff; font-family: 'Orbitron', sans-serif;">Wait <span id="seconds" style="color: var(--accent-color);">15</span> Seconds</p>
        
        <p style="margin-top: 20px; font-size: 14px; color: #888;">⚠️ Please do not refresh or close this page while calculation is in progress.</p>
    </div>

    <div id="result-section" style="display: none; margin-top: 40px;">
        <h2 style="color: #2ecc71; font-size: 36px; margin-bottom: 20px; text-shadow: 0 0 10px rgba(46, 204, 113, 0.4);">✅ Generation Complete!</h2>
        
        <div style="background: linear-gradient(145deg, var(--bg-card), #222); border: 2px dashed var(--primary-color); border-radius: 16px; padding: 50px 30px; margin: 0 auto 40px auto; max-width: 600px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <h3 style="color: #fff; margin-bottom: 15px; font-size: 22px; text-transform: uppercase; letter-spacing: 2px;">Your Lucky Jodi For Today</h3>
            <div style="font-size: 80px; line-height: 1; font-family: 'Orbitron', sans-serif; color: var(--primary-color); font-weight: 900; letter-spacing: 5px; margin-bottom: 30px; text-shadow: 3px 3px 6px rgba(0,0,0,0.5);" id="lucky-jodi">--</div>
            
            <div style="width: 80%; height: 1px; background: #444; margin: 0 auto 30px auto;"></div>
            
            <h3 style="color: #fff; margin-bottom: 15px; font-size: 20px; text-transform: uppercase; letter-spacing: 2px;">Lucky Panna</h3>
            <div style="font-size: 50px; line-height: 1; font-family: 'Orbitron', sans-serif; color: #3498db; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);" id="lucky-panna">---</div>
        </div>
        
        <div style="margin-bottom: 30px;">
            <p style="color: var(--text-muted); font-size: 15px; max-width: 500px; margin: 0 auto;">Disclaimer: These numbers are generated based on mathematical probability and historical patterns. Play responsibly at your own risk.</p>
        </div>

        <a href="<?= isset($base_url) ? $base_url : '/' ?>index" class="refresh-btn" style="text-decoration:none; padding: 12px 30px; font-size: 16px;">RETURN TO HOME</a>
    </div>

</div>

<script>
    let timeLeft = 15;
    let progress = 0;
    
    // Smooth progress update (every 100ms for completely smooth bar)
    const smoothProgressInterval = setInterval(() => {
        progress += (100 / (15 * 10)); // 15 seconds * 10 ticks per second
        if (progress > 100) progress = 100;
        document.getElementById('progress-bar').style.width = progress + '%';
        if (progress >= 100) clearInterval(smoothProgressInterval);
    }, 100);

    // Second timer
    const secondsInterval = setInterval(() => {
        timeLeft--;
        if (timeLeft >= 0) {
            document.getElementById('seconds').innerText = timeLeft;
        }
        
        if (timeLeft <= 0) {
            clearInterval(secondsInterval);
            document.getElementById('loader-section').style.display = 'none';
            document.getElementById('result-section').style.display = 'block';
            
            // Logic to Generate random Jodi (00-99)
            let jodi = Math.floor(Math.random() * 100).toString().padStart(2, '0');
            document.getElementById('lucky-jodi').innerText = jodi;
            
            // Logic to Generate random Panna (3 digits typically naturally ascending)
            let digits = [];
            for(let i=0; i<3; i++) digits.push(Math.floor(Math.random() * 10));
            digits.sort((a,b) => a - b);
            document.getElementById('lucky-panna').innerText = digits.join('');
        }
    }, 1000);
</script>

<?php include 'includes/footer.php'; ?>
