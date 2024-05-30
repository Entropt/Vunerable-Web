<!DOCTYPE html>
<html lang="en">

<?php
require_once 'database.php';
if (empty($_GET['postid']) || !is_numeric($postId = $_GET['postid'])) {
    Header("Location: index.php");
}
$query = "SELECT * FROM posts WHERE post_id = $postId";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/blog.css">
    <title>Blog Post</title>
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/index.php">Home</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="logout.php">
                <li class='nav-link'>Hi,
                    <a style='font-style: italic; font-size: 95%;'">
                        <?php
                        echo 'admin';
                        ?>
                    </a>
                </li>
                <button class=" btn btn-outline rounded-0 my-2 my-sm-0" style="color:red; border-color:red; background-color:white" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <!-- navbar ends -->
    <!-- main content start  -->
    <div class="container mt-5">
        <div class="row main-section">
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header">
                        <?php

                        if (mysqli_num_rows($result) != 0) {
                            echo "
                                <span>By </span>
                                <span class='text-success'>{$row['author']}</span>
                            ";
                        }
                        ?>
                        <?php

                        if (mysqli_num_rows($result) != 0) {
                            echo "
                                <span>on </span>
                                <span class='text-success'>{$row['date']}</span>
                            ";
                        } else {
                            echo "<span style='color:red; font-size: 25px;'>No post found</span>";
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <?php
                        $file_dir = "img/posts/" . $postId . ".png";
                        if (file_exists($file_dir))
                            echo "<img class='card-img-top' src=$file_dir>";
                        ?>
                        <hr>
                        <?php
                        echo $row['content'];
                        ?>
                    </div>
                    <div class="card-footer">
                        <form class="row" action="<?php echo "upload.php?postid=$postId"; ?>" method="post" enctype="multipart/form-data">
                            <div class="col col-sm-10 col-md-10">
                                <div class="form-group">
                                    <input type="text" name="comment" id="comment" class="form-control rounded-0" placeholder="Enter comment...">
                                    <input type="submit" name="preview" id="preview" value="Preview">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                            </div>
                            <div class="col col-sm-2 col-md-2">
                                <input class="btn btn-warning rounded-0" type="submit" value="Submit" name="submit">
                            </div>
                        </form>
                        <div>
                        <a id="preview-user" style="display:none">
                            <?php
                            echo 'admin: ';
                            ?>
                        </a>
                        <span class="preview-container text-success bg-faded" />
                        </div> 
                        <hr>
                        <?php

                        ?>
                        <div class=" comment-section">
                            <?php
                            $query = "SELECT * FROM comments WHERE post_id = $postId";
                            $result = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                //// Encode both double and single quotes
                                // htmlspecialchars($string, ENT_QUOTES);

                                //// Encode non-ASCII characters as well
                                // htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE);

                                // CSP is recommended but not used in this situation due to above stylesheet is an outsourced file
                                // Therefore, the user input should be sanitized carefully before being displayed
                                echo "<span class='text-success bg-faded'><a style='color:black'>" . htmlspecialchars($row['username']) . ": </a>" . htmlspecialchars($row['comment_text']) . "</span>";

                                $allowed_file_extensions = array("jpg", "png", "jpeg", "gif");
                                foreach ($allowed_file_extensions as $extension) {
                                    if (file_exists("img/comments/" . $row['id'] . "." . $extension)) {
                                        echo "<img src='img/comments/{$row['id']}.$extension' alt='img' style='width: auto; height: 100px;'> <br> <br>";
                                        break; // Exit the loop once a valid file is found
                                    }
                                }
                            }
                            mysqli_free_result($result);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header">
                        Category
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#">Social</a></li>
                        <li class="list-group-item"><a href="#">Sports</a></li>
                        <li class="list-group-item"><a href="#">Technology</a></li>
                        <li class="list-group-item"><a href="#">Trend</a></li>
                        <li class="list-group-item"><a href="#">Economics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    // Add event listener for the Preview button
    document.getElementById('preview').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the comment value
        let commentValue = document.getElementById('comment').value;

        sendPreviewRequest(commentValue);
    });

    function sendPreviewRequest(commentValue) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'preview.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Update the preview container with the rendered HTML
                const previewContainer = document.querySelector('.preview-container');
                previewContainer.innerHTML = xhr.responseText;

                document.getElementById('preview-user').style.display = 'contents';
            }
        };
        xhr.send('comment=' + encodeURIComponent(commentValue));
    }
</script>

</html>

<?php

?>