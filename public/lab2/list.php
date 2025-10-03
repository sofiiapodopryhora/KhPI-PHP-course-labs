<?php

$files = glob('uploads/*');

foreach ($files as $file) {
    $fileName = basename($file);
    echo "<li><a href=$file download>$fileName</a></li>";
}