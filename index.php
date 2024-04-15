<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Recommanadtion | Welcome </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
     <main>
     <nav class="mainnav shadow navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
             <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-earbuds"></i> Musicology</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex justify-content-center>
                    <li class="nav-item navlist">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="albums.php">Albums</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="ranks.php">Ranking</a>
                    </li>

                    <?php
                        session_start();
                        if(isset($_SESSION['username'])) {
                            $userData = file_get_contents('./data/user.json');
                            $users = json_decode($userData, true);
                            $loggedInUser = null;
                            foreach ($users as $user) {
                                if ($user["username"] === $_SESSION['username']) {
                                    $loggedInUser = $user;
                                    break;
                                }
                            }
                            echo '<li class="nav-item navlist">';
                            echo '<a class="nav-link" href="favorites.php">Favorites</a>';
                            echo '</li>';

                            echo ' <img class="rounded-circle" src="./images/user_icon.png" style="height: 40px; width: 40px;" alt=""> ';
                            echo ' <li class="nav-item dropdown"> ';
                            echo ' <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $loggedInUser["first_name"] . '</a>';
                            echo ' <ul class="dropdown-menu dropdown-menu-end make_black bg-dark">';
                            echo '     <li><a class="dropdown-item text-white" href="profile.php"> <i class="bi bi-person"></i> Profile</a></li>';
                            echo '     <li><a class="dropdown-item text-white" href="#"><i class="bi bi-gear"></i> Settings</a></li>';
                            echo '     <li><hr class="dropdown-divider"></li>';
                            echo '     <li><a class="dropdown-item text-white" href="logout.php"> <i class="bi bi-box-arrow-right"></i> Logout</a></li>';
                            echo ' </ul> ';
                        }
                    ?>

                    <!-- Check if user is logged in and hide Get Started button -->
                    <?php
                        if(!isset($_SESSION['username'])) {
                            echo '<li class="get-started-button">';
                            echo '<a class="pt-3" style="padding-top: 10px;" href="./login.php"><button type="button" class="btn btn-outline-primary">Get Started</button></a>';
                            echo '</li>';
                        }
                    ?>                    
                </ul>

                </div>
               </div>
     </nav>

            <section class="hero">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copy">
                                <div class="text-label">
                                Discover Your Next Favorite Albums
                                </div>
                                <div class="text-hero-bold">
                                Whether you're a seasoned music enthusiast or just starting your journey, our personalized recommendations 
                                are tailored to your tastes, ensuring every discovery is a delightful experience.
                                </div>
                                <div class="cta">
                                    <a href="albums.php" class="btn btn-primary shadow-none">Explore Now</a>
                                </div>
                    
                            </div>
                        </div>
                        <div class="col-md-6">
                             <img src="images/hero_section.png" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <h5 class="album-covers mx-5">Top Albums of this Week</h5>
            <section class="p-4 mx-5 d-flex justify-content-center albums">


                <div class="m-1 p-4 text-center">
                    <div class="album_cover">
                        <img src="images/0.png" class="rounded album-img img-fluid" alt="">
                        <a href="album.php">
                            <div class="music_lists">
                                <i class="bi bi-music-note-list the_icon"></i>
                            </div>
                        </a>
                    </div>
                    <div class="lead text-white">Album Title</div>
                    <small class="text-muted text-white">Justin Biber</small> <br>
                    <small class="text-muted text-white">Sond Description</small>
                </div>

                <div class="m-1 p-4 text-center">
                    <div class="album_cover">
                        <img src="images/1.jpg" class="rounded album-img img-fluid" alt="">
                        <a href="album.php">
                            <div class="music_lists">
                                <i class="bi bi-music-note-list the_icon"></i>
                            </div>
                        </a>
                    </div>
                    <div class="lead text-white">Album Title</div>
                    <small class="text-muted text-white">Justin Biber</small> <br>
                    <small class="text-muted text-white">Sond Description</small>
                </div>

                <div class="m-1 p-4 text-center">
                    <div class="album_cover">
                        <img src="images/3.jpg" class="rounded album-img img-fluid" alt="">
                        <a href="album.php">
                            <div class="music_lists">
                                <i class="bi bi-music-note-list the_icon"></i>
                            </div>
                        </a>
                    </div>
                    <div class="lead text-white">Album Title</div>
                    <small class="text-muted text-white">Justin Biber</small> <br>
                    <small class="text-muted text-white">Sond Description</small>
                </div>

                <div class="m-1 p-4 text-center">
                    <div class="album_cover">
                        <img src="images/3.webp" class="rounded album-img img-fluid" alt="">
                        <a href="album.php">
                            <div class="music_lists">
                                <i class="bi bi-music-note-list the_icon"></i>
                            </div>
                        </a>
                    </div>
                    <div class="lead text-white">Album Title</div>
                    <small class="text-muted text-white">Justin Biber</small> <br>
                    <small class="text-muted text-white">Sond Description</small>
                </div>

            </section>
     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>


    
     <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


