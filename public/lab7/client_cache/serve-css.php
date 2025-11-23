<?php
// serve-css.php

$filePath = __DIR__ . '/style.css';

if (!file_exists($filePath)) {
    http_response_code(404);
    echo "File not found.";
    exit;
}

$fileModTime = filemtime($filePath);
$etag = md5_file($filePath);

// Set caching headers
header('Cache-Control: public, max-age=86400'); // Cache for 1 day
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
header('ETag: ' . $etag);
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $fileModTime) . ' GMT');

// Check if the browser has a cached version
$ifModifiedSince = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : false;
$ifNoneMatch = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false;

if (($ifNoneMatch && $ifNoneMatch == $etag) || ($ifModifiedSince && $ifModifiedSince >= $fileModTime)) {
    http_response_code(304); // Not Modified
    exit;
}

// Serve the file
header('Content-Type: text/css');
readfile($filePath);
