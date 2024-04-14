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
                    <a class="nav-link active" aria-current="page"  href="albums.php">Albums</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link" href="ranks.php">Ranking</a>
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

           
             <section class="hero album">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="copy">
                                <div class="text-label">
                                Explore Our Featured Album
                                </div>
                                <div class="text-hero-bold">
                                Dive into a diverse collection of handpicked albums spanning various genres, eras, and styles, 
                                each carefully selected to offer a captivating musical journey for every listener.</div>                    
                            </div>
                        </div>
                        <div class="col-md-3">
                             <img style="width: 300px" src="images/album_heroimg.png" alt="">
                        </div>
                    </div>
                </div>
            </section>
           
            <h5 class="album-covers mx-5">Immerse Yourself in Musical Excellence</h5>
            <section class="album_container">
                <div class="container">
                    <div class="row">
                    <div class="col-md-5">
                          <img class="album_image" src="images/0.png" alt="">
                    </div>

                    <div class="col-md-7">
                            <div class="copy">
                                <!-- <div class="text-label">
                                Immerse Yourself in Musical Excellence
                                </div> -->
                                <div class="text-hero-bold">
                                <ul class="album_details">
                                    <p> <b> Album Title - </b>   Thriller</p>
                                    <p> <b>  Performer - </b> Michael Jackson</p>
                                    <p> <b> Genre - </b>  Pop</p>
                                    <p> <b>Release Year - </b>  1982</p>
                                    <p> <b> Description - </b>  Michael Jackson's iconic album featuring hits like "Billie Jean" and "Thriller," setting new standards in pop music.</p>
                                    <p> <b> Total Number of Songs -</b>  9 tracks</p>
                                    <p> <b> Total Time -</b>  42 minutes 19 seconds</p>
                                    <p> <b> Producer -</b>  Quincy Jones</p>
                                    <p> <b> Label - </b>  Epic Records</p>
                                    <p> <b> Awards -</b> Grammy Award for Album of the Year.</p>
                                    <p> <b>  Certifications - </b> 33x Platinum (RIAA).</p>
                                    <p> <b> Recommendation Score - </b> 9/10</p>                                   
                                </ul>
                                </div>
                           </div>

                    </div>
                </div>
            </section>

            <h5 class="album-covers mx-5 pb-4">Tracklist in the Album</h5>
            <section>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">01</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">My Heart Will Love You</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 04:28  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">02</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">I did it Again</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 03:57  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">03</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">We Stayed</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 03:41  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">04</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">Love You Like You Do</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 04:51  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">05</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">What a Life</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 03:56  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">06</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">Belive Me</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 04:24  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">07</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">I'm Gone Baby</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 04:21  </div>
                                </div>
                        
                        </div>
                </div>
                <div class="col-md-12  tab-content" id="pills-tabContent pt-2">
                        <div class="tab-pane fade text-white show active">
                                <div class="song-small m-2 ms-4 col-md-6 row  align-items-center">
                                        <div class="col-1 h3">08</div>
                                        <div class="col d-flex align-items-center">
                                           <img class="rounded m-1 smaller_img" src="images/0.png" alt="">
                                           <div class="ms-2">The Loving Days</div> 
                                        </div>
                                        <div class="col-2"> <i class="bi bi-clock"></i> 03:53  </div>
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


