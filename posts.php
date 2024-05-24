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
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 rounded-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success rounded-0 my-2 my-sm-0" type="submit">Search</button>
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
                                    <input type="text" name="comment" class="form-control rounded-0" placeholder="Enter comment...">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                            </div>
                            <div class="col col-sm-2 col-md-2">
                                <input class="btn btn-warning rounded-0" type="submit" value="Submit" name="submit">
                            </div>
                        </form>
                        <?php
                        
                        ?>
                        <div class="comment-section">
                            <?php
                            $query = "SELECT * FROM comments WHERE post_id = $postId";
                            $result = mysqli_query($connect, $query);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<span class='text-success bg-faded'><a style='color:black'>{$row['username']}: </a>{$row['comment_text']}</span>";

                                $allowed_file_extensions = array("jpg", "png", "jpeg", "gif");
                                foreach ($allowed_file_extensions as $extension) {
                                    if (file_exists("img/comments/" . $row['id'] . "." . $extension)) {
                                        echo "<img src='img/comments/{$row['id']}.$extension' alt='img' style='width: auto; height: 100px;'> <br> <br>";
                                        break; // Exit the loop once a valid file is found
                                    }
                                }
                                
                            }
                            mysqli_free_result($result);
                            mysqli_close($connect);
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
    <!-- Optional JavaScript -->

</body>

</html>