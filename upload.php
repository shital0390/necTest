<?php
session_start(); // Start the session
if(isset($_SESSION['uploadErr'])){
	 $uploadError = $_SESSION['uploadErr'];
    unset($_SESSION['uploadErr']); 
    // Display the error
    echo '<div class="alert alert-danger">' . $uploadError . '</div>';
}
if(isset($_SESSION['uploadSuccess'])){
	 $uploadSuccess = $_SESSION['uploadSuccess'];
    unset($_SESSION['uploadSuccess']); 
    echo '<div class="alert alert-success">' . $uploadSuccess . '</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>File Upload</title>
</head>
<body>
    
	
	 <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Upload File</h2>
                <form action="upload_process.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Choose File</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="upload">Upload</button>
					 <a href="dashboard.php" class="btn btn-secondary mt-3">Go to dashboard</a>
                </form>
            </div>
        </div>
    </div>
	
</body>
</html>
