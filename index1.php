<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Select file:</label>
        <input type="file" name="myfile" required>
        <br><br>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>
