<?php
// generate-report.php

$cacheFile = __DIR__ . '/cache/report.html';
$cacheTime = 600; // 10 minutes in seconds

// Check if a valid cache file exists
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    // Serve from cache
    echo "<!-- Served from file cache -->\n";
    readfile($cacheFile);
    exit;
}

// --- Simulate long report generation ---
sleep(3);

ob_start(); // Start output buffering

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generated Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Generated Report - <?php echo date('Y-m-d H:i:s'); ?></h1>
    <p>This report was generated on the server.</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 1000; $i++): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>Name-<?php echo substr(md5(rand()), 0, 10); ?></td>
                <td>$<?php echo rand(100, 5000); ?>.<?php echo rand(10, 99); ?></td>
                <td><?php echo date('Y-m-d', time() - rand(0, 31536000)); ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>
</html>
<?php

$reportContent = ob_get_clean(); // Get content from buffer and clean it

// Save the generated content to the cache file
file_put_contents($cacheFile, $reportContent);

// Send the content to the browser
echo "<!-- Report newly generated -->\n";
echo $reportContent;
