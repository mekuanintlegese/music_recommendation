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
    <link rel="stylesheet" type="text/css" href="css/login.css">
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

                    <!-- <li class="nav-item navlist">
                    <a class="nav-link" href="favorites.php">Favorites</a>
                    </li>

                    <img class="rounded-circle" src="./images/user_icon.png" style="height: 40px; width: 40px;" alt="">
                    <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mark
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end make_black bg-dark">
                        <li><a class="dropdown-item text-white" href="#"> <i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item text-white" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-white" href="#"> <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul> -->


                    <li>
                        <a class="pt-3" styel="padding-top: 10px;" href="./login.php"><button type="button" class="btn btn-outline-primary">Get Started</button></a>
                    </li>   

                    
                </ul>


                </div>
               </div>
            </nav>

            <section class="login_page">
                    <div class="login">
                    <h1 class="text-center login_title"> <i class="bi bi-music-note-beamed"></i> Register on <span style="color: blue; font-weight: 350;">Musicology!</span> <i class="bi bi-music-note-beamed"></i></h1>

                        <form action="" class="row" novalidate>
                            <div class="form-group ">
                                <label class="form-label" for="password">Username</label>
                                <input class="form-control"  type="username" id="username" required>
                                <div class="invalid-feedback">
                                    Please enter your password
                                </div>
                            </div>

                            <div class="form-row d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label class="form-label" for="email">First Name</label>
                                    <input class="form-control" type="email" id="email" required>
                                    <div class="invalid-feedback">
                                        Please enter your email address
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="email">Last Name</label>
                                    <input class="form-control" type="email" id="email" required>
                                    <div class="invalid-feedback">
                                        Please enter your email address
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="form-label" for="password">Email</label>
                                <input class="form-control"  type="username" id="username" required>
                                <div class="invalid-feedback">
                                    Please enter your password
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control"  type="password" id="password" required>
                                <div class="invalid-feedback">
                                    Please enter your password
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="form-label" for="password">Re-Enter Password</label>
                                <input class="form-control"  type="password" id="password" required>
                                <div class="invalid-feedback">
                                    Please enter your password
                                </div>
                            </div>

                            <div class="check-label login_links d-flex align-items-center justify-content-between">
                                <div class="form-group form-check">
                                    <!-- <input class="form-check-input" type="checkbox" name="check" > -->
                                    <label class="form-check-label" for="check"></label>
                                </div>
                                <div class="register">Already have account? <a href="login.php">Login</a></div>
                            </div>
                            <input class="btn btn-dark w-100" type="submit" value="SIGN UP">
                        </form>
                    </div>
            </section>


     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>


     <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                   include './login/index.php';
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>


    
     <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


