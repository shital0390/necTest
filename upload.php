<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required><br>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>
