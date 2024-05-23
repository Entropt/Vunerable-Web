<?php
include('database.php');
include('posts.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['comment'])) {
        $comment = mysqli_real_escape_string($connect, $_POST['comment']);

        $query = "INSERT INTO users (post_id, date, username, comment_text) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $postId, date("Y-m-d"), $username, $comment);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        $target_dir = "img/comments/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    }
}

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }
?>