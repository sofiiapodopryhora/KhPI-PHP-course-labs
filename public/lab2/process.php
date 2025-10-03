<?php

$validExtensions = array("jpg", "jpeg", "png");
$maxSize = 2 * 1024 * 1024;
$uploadedFile = $_FILES["fileToUpload"];

if(is_uploaded_file($uploadedFile["tmp_name"])) {
    $fileType = strtolower(pathinfo($uploadedFile["name"], PATHINFO_EXTENSION));
    $fileSize = $uploadedFile["size"];
    if (!in_array($fileType, $validExtensions)) {
        echo "<p>Only JPG, JPEG, PNG files are allowed.</p>";
    } 
    elseif ($fileSize > $maxSize) {
        echo "<p>Your file is too large.</p>";
    } 
    else {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }
        $fileName = basename($uploadedFile["name"]);
        $filePath = $uploadDir . $fileName;
        if (file_exists($filePath)) {
            $fileName = time() . "_" . $fileName;
            $filePath = $uploadDir . $fileName;
        }

        if (move_uploaded_file($uploadedFile["tmp_name"], $filePath)) {
            echo "<p>File name: $fileName</p>";
            echo "<p>File type: $fileType</p>";
            echo "<p>File size: " . round($fileSize / 1024, 2) . " KB.</p>";
            echo "<a href=$filePath download>Download</a>";
        } 
        else {
            echo "<p>There was an error uploading your file to server.</p>";
        }
    }
} 
else {
    echo "<p>There was an error uploading your file.</p>";
}