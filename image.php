<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];
    
    if ($image['error'] === UPLOAD_ERR_OK) {
        echo "Uploaded file name: " . $image['name'];
        echo "Uploaded file name: " .$image['tmp_name'];;
    } else {
        echo "Error uploading file. Error code: " . $image['error'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        image: <input type="file" name="image">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
