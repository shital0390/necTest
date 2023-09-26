<?php
$targetDirectory = "uploads/"; // The directory where you want to save uploaded files
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file already exists
if (file_exists($targetFile)) {
    echo "Sorry, the file already exists.";
    $uploadOk = 0;
}

// Check file size (adjust the limit as needed)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow only certain file formats (e.g., jpg, png, pdf)
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "pdf") {
    echo "Sorry, only JPG, PNG, and PDF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

