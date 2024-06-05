<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/blog.css">
    <title>Blog</title>
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
                    echo $username;
                    ?>
                    </a>
                </li>
                <button class=" btn btn-outline rounded-0 my-2 my-sm-0" style="color:red; border-color:red; background-color:white" type="submit" action="logout.php">
                        Logout
                        </button>
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
                        <span>By</span>
                        <span class="text-success"> AJay Marathe</span>
                        <span>on</span>
                        <span class="text-success"> 28 Dec 2018</span>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="image.php?filename=img/posts/1.png" alt="img">
                        <hr>
                        <h2 class="card-title">Kajal Aggarwal Wons The Best Actress Award At Zee Golden Awards 2017 For Nene Raju Nene Mantri Movie.</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dicta nisi ab consequatur fugit obcaecati harum expedita, doloremque dolorem quam aut quas ad amet assumenda. Provident sunt ipsum minima autem.</p>
                        <a href="posts.php?postid=1" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <!-- second post  -->
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header">
                        <span>By</span>
                        <span class="text-success"> AJay Marathe</span>
                        <span>on</span>
                        <span class="text-success"> 28 Dec 2018</span>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="image.php?filename=img/posts/2.png" alt="img">
                        <hr>
                        <h2 class="card-title">Digital Image Size and Resolution: What Do You Need to Know?</h2>
                        <p class="card-text">Have you noticed that people get confused when talking about the size and resolution of an image? Pixel dimensions are really the only thing you need to be concerned about. The pixel dimensions of an image tell you how much information is contained within the file.</p>
                        <a href="blog-post.html" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <!-- third post  -->
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header">
                        <span>By</span>
                        <span class="text-success"> AJay Marathe</span>
                        <span>on</span>
                        <span class="text-success"> 28 Dec 2018</span>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="image.php?filename=img/posts/3.png" alt="img">
                        <hr>
                        <h2 class="card-title">How To Reverse Image Search On A Mobile Device Or Computer</h2>
                        <p class="card-text">A reverse image search is the use of a photo to search online without text. If the exact image doesn’t appear, very similar ones pop up. There are three main ways to use this feature, The first is to check if there’s any plagiarized information in the text sent. The second method is finding information about a photo.</p>
                        <a href="blog-post.html" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <!-- forth post -->
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header">
                        <span>By</span>
                        <span class="text-success"> AJay Marathe</span>
                        <span>on</span>
                        <span class="text-success"> 28 Dec 2018</span>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="image.php?filename=img/posts/4.png" alt="img">
                        <hr>
                        <h2 class="card-title">Expand images for better clarity with our AI Image Expander.</h2>
                        <p class="card-text">Extend images in any direction with AI using Magic Expand on Canva Pro. Quickly recover whatever's just outside the frame or expand it to fit your design or website layout. With our AI image extender, we make achieving crisp and detailed visuals a breeze.</p>
                        <a href="blog-post.html" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <!-- fifth post  -->
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header">
                        <span>By</span>
                        <span class="text-success"> AJay Marathe</span>
                        <span>on</span>
                        <span class="text-success"> 28 Dec 2018</span>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="image.php?filename=img/posts/5.png" alt="img">
                        <hr>
                        <h2 class="card-title">Why Do Image Files Need Different Formats? A Primer on Popular Image File Formats</h2>
                        <p class="card-text">Most of your digital photos are stored in the JPEG format (a.k.a. JPG), but when you download an image from the web these days, it may be using the more modern WebP format. It's likely you're also familiar with GIF animations which are decades old but have come back to popularity with stickers and memes. And even when you simply want to save a screenshot in Paint, you get many file type options.</p>
                        <a href="blog-post.html" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item active"><span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                </span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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


</html>