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
                    <a class="nav-link  active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="albums.php">Albums</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="ranks.php">Ranking</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="favorites.php">Favorites</a>
                    </li>

                    <img class="rounded-circle" src="./images/user_icon.png" style="height: 40px; width: 40px;" alt="">
                    <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mark
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end make_black bg-dark">
                        <li><a class="dropdown-item text-white" href="profile.php"> <i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item text-white" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-white" href="#"> <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>


                    <li>
                        <a class="pt-3" styel="padding-top: 10px;" href="./login.php"><button type="button" class="btn btn-outline-primary">Get Started</button></a>
                    </li>   

                    
                </ul>


                </div>
               </div>
            </nav>

            <section class="hero albums">
                <div class="prof_conatner">

                    <div class="continer p-2 col-md-12">
                        <div class="col-md-6">
                            <img class="profile_image" src="./images/user_icon.png" alt="">
                        </div>
                        <div class="col-md-6 details">
                            <ul>
                                <li>First Name: Mick</li>
                                <li>Last Name: Mick</li>
                                <li>Username: micke101</li>
                                <li>Email: micke101@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>

    
     <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


