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
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item navlist">
                    <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="albums.php">Albums</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link active" aria-current="page"  href="ranks.php">Ranking</a>
                    </li>

                    <img class="rounded-circle" src="./images/user_icon.png" style="height: 40px; width: 40px;" alt="">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end make_black bg-dark">
                        <li><a class="dropdown-item text-white" href="#"> <i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item text-white" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-white" href="#"> <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                    </li>

                    <!-- <button type="button" class="btn btn-outline-primary pt-0 pb-0">Sign Up</button> -->
                    
                </ul>


                </div>
               </div>
            </nav>

            <section class="hero albums">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copy">
                                <div class="text-label">
                                Top-Rated Albums Ranking
                                </div>
                                <div class="text-hero-bold">
                                Discover the best-rated albums based on our recommendation scores, curated to guide you to exceptional musical experiences.    
                            </div>                    
                            </div>
                        </div>
                        <div class="col-md-6">
                             <img class="" src="images/ranks_hero.png" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <h5 class="album-covers mx-5">Top Albums by Recommendation Score</h5>
            <table class="mt-4 m-2 table bg-dark table-dark table-striped  align-middle table-hover">
                <thead>
                    <tr>
                    <th scope="col"> Rank </th>
                    <th scope="col"> Album Cover </th>
                    <th scope="col"> Album Title </th>
                    <th scope="col"> Performer </th>
                    <th scope="col"> Release Year </th>
                    <th scope="col"> Genre </th>
                    <th scope="col"> Recommendation Score </th>
                    </tr>
                </thead>
                <tbody>

                    <tr >
                    <th scope="row">1</th>
                    <td> <a href="album.php?1"><img class="rounded m-1 album_img" src="images/0.png" alt=""></a> </td>
                    <td>Thriller</td>
                    <td>Michael Jackson</td>
                    <td>1997</td>
                    <td>Pop</td>
                    <td>9/10</td>
                    </tr>

                    <tr>
                    <th scope="row">2</th>
                    <td> <img class="rounded m-1 album_img" src="images/1.jpg" alt=""></td>
                    <td>Thriller</td>
                    <td>Michael Jackson</td>
                    <td>1997</td>
                    <td>Pop</td>
                    <td>9/10</td>
                    </tr>

                    <tr>
                    <th scope="row">3</th>
                    <td> <img class="rounded m-1 album_img" src="images/2.jpg" alt=""></td>
                    <td>Thriller</td>
                    <td>Michael Jackson</td>
                    <td>1997</td>
                    <td>Pop</td>
                    <td>9/10</td>
                    </tr>

                </tbody>
                </table>
     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>

    
     <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


