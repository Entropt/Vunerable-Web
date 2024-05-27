<?php
require_once 'database.php';

$postId = $_GET['postid'];

function insert_comment($connect, $postId, $comment, $username)
{
    $query = "INSERT INTO comments (post_id, date, username, comment_text) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $postId, date("Y-m-d"), $username, $comment);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['comment']) || !empty($_FILES["fileToUpload"]["name"])) {
        $comment = '';
        if (!empty($_POST['comment'])) {
            // Handle text input without file upload
            $comment = $_POST['comment'];
            insert_comment($connect, $postId, $comment, 'admin');
        }

        if (!empty($_FILES["fileToUpload"]["name"])) {
            // Upload image
            $query = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'vunerable_web' AND TABLE_NAME = 'comments'";
            $result = mysqli_query($connect, $query);
            $image_id = mysqli_fetch_assoc($result)['AUTO_INCREMENT'];
            mysqli_free_result($result);

            $target_dir = "img/comments/";
            $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
            $target_file = $target_dir . $image_id . "." . $imageFileType;
            $uploadOk = 1;

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 2000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    if (empty($comment)) {
                        $comment = 'No comment';
                    }
                    insert_comment($connect, $postId, $comment, 'admin');
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}

echo "<br><a href='posts.php?postid=$postId'>Back to post</a>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<style>
    html {
        font-size: large;
    }
</style>

</html>