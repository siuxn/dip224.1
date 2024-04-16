<?php
require("connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Function to handle file upload */
function uploadFile($file) {
    // Check if file size is within the limit (5MB)
    if ($file['size'] > 20971520) {
        return 'file_too_large';
    }

    // Check if the file format is allowed
    $allowedFormats = ['jpg', 'jpeg', 'png', 'webp', 'mp4'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedFormats)) {
        return 'img_upload';
    }

    $newName = random_int(11111, 99999) . $file['name'];
    $newLocation = UPLOAD_SRC . $newName;

    if (!move_uploaded_file($file['tmp_name'], $newLocation)) {
        return 'upload_failed';
    } else {
        return $newName;
    }
}

/* Function to remove image */
function removeImage($image) {
    if (!unlink(UPLOAD_SRC . $image)) {
        return false;
    } else {
        return true;
    }
}

/* Add content functionality */
if (isset($_POST['addcontent'])) {
    // Sanitize user inputs
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    // Check if a file is selected
    if ($_FILES['image']['size'] > 0) {
        $imageName = uploadFile($_FILES['image']);
        if (in_array($imageName, ['file_too_large', 'img_upload', 'upload_failed'])) {
            header("location: admin.php?alert=$imageName");
            exit;
        }
    } else {
        header("location: admin.php?alert=empty_file");
        exit;
    }

    // Insert content into database
    $query = "INSERT INTO `uploadContent`(`typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) 
              VALUES ('$_POST[content]','$_POST[category]','$_POST[title]','$_POST[desc]','$imageName')";

    if (mysqli_query($con, $query)) {
        header("location: admin.php?success=added");
    } else {
        header("location: admin.php?alert=added_fail");
    }
}

/* Remove content functionality */
if (isset($_GET['rem']) && $_GET['rem'] > 0) {
    $remId = mysqli_real_escape_string($con, $_GET['rem']);

    $query = "SELECT * FROM `uploadContent` WHERE `contentID` = '$remId'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    if (removeImage($fetch['content'])) {
        $deleteQuery = "DELETE FROM `uploadContent` WHERE `contentID` = '$remId'";
        if (mysqli_query($con, $deleteQuery)) {
            header("location: admin.php?success=removed");
        } else {
            header("location: admin.php?alert=remove_failed");
        }
    } else {
        header("location: admin.php?alert=img_rem_fail");
    }
}

?>

  

