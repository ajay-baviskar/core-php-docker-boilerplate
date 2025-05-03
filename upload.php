<?php
if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["myfile"]["name"]);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if uploads directory exists, if not create it
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Validate file size (e.g., max 2MB)
    if ($_FILES["myfile"]["size"] > 2000000) {
        echo "Error: File is too large.";
        exit;
    }

    // Allowed file types
    $allowedTypes = array("txt", "jpg", "jpeg", "png", "pdf");

    if (!in_array($fileType, $allowedTypes)) {
        echo "Error: Only TXT, JPG, JPEG, PNG, and PDF files are allowed.";
        exit;
    }

    // Move the file to the uploads folder
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars($fileName) . " has been uploaded successfully.";

        // Optional: Read file content if it's a text file
        if ($fileType === "txt") {
            echo "<h3>File Content:</h3>";
            echo nl2br(file_get_contents($targetFile));
        }
    } else {
        echo "Error uploading the file.";
    }
} else {
    echo "No file submitted.";
}
?>
