<?php
$targetDirectory = "uploads/"; // The directory to save uploaded files
$targetFile = $targetDirectory . basename($_FILES['file']["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file already exists
if (file_exists($targetFile)) {
	$uploadErr = "Sorry, the file already exists.";
    $uploadOk = 0;
}

// Check file size (adjust the limit as needed)
if ($_FILES["file"]["size"] > 7000000) {
	$uploadErr = "Sorry, your file is too large."; 
    $uploadOk = 0;
}

// Allow only certain file formats (e.g., jpg, png, pdf)
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "pdf") {
	$uploadErr = "Sorry, only JPG, PNG, and PDF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
		session_start();
		$_SESSION['uploadErr'] = $uploadErr;
		header("Location: upload.php"); 
		exit();
	} else{
		// Move the uploaded file to the target directory
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
			session_start();
			$_SESSION['uploadSuccess'] =  "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
			header("Location: upload.php"); 
			exit();
		} else {
			$uploadErr =  "Sorry, there was an error uploading your file.";
			session_start();
			$_SESSION['uploadErr'] = $uploadErr;
			header("Location: upload.php"); 
			exit();
		}
	}
?>

