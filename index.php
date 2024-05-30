<?php
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
                        echo 'admin';
                        ?>
                    </a>
                </li>
                <button class="btn btn-outline rounded-0 my-2 my-sm-0" style="color:red; border-color:red; background-color:white" type="submit">Logout</button>
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
                        <img class="card-img-top" src="img/posts/1.png" alt="img">
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
                        <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="img">
                        <hr>
                        <h2 class="card-title">Kajal Aggarwal Wons The Best Actress Award At Zee Golden Awards 2017 For Nene Raju Nene Mantri Movie.</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est consequatur aliquam, non eius aut natus at consequuntur quasi sed corporis possimus adipisci dignissimos atque praesentium sint autem pariatur asperiores laudantium.</p>
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
                        <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="img">
                        <hr>
                        <h2 class="card-title">Kajal Aggarwal Wons The Best Actress Award At Zee Golden Awards 2017 For Nene Raju Nene Mantri Movie.</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est consequatur aliquam, non eius aut natus at consequuntur quasi sed corporis possimus adipisci dignissimos atque praesentium sint autem pariatur asperiores laudantium.</p>
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
                        <img class="card-img-top" src="img/kajal2.png" alt="img">
                        <hr>
                        <h2 class="card-title">Kajal Aggarwal Wons The Best Actress Award At Zee Golden Awards 2017 For Nene Raju Nene Mantri Movie.</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est consequatur aliquam, non eius aut natus at consequuntur quasi sed corporis possimus adipisci dignissimos atque praesentium sint autem pariatur asperiores laudantium.</p>
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
                        <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="img">
                        <hr>
                        <h2 class="card-title">Kajal Aggarwal Wons The Best Actress Award At Zee Golden Awards 2017 For Nene Raju Nene Mantri Movie.</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est consequatur aliquam, non eius aut natus at consequuntur quasi sed corporis possimus adipisci dignissimos atque praesentium sint autem pariatur asperiores laudantium.</p>
                        <a href="blog-post.html" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <span class="page-link">
                                    2
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
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