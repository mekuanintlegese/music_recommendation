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
                    <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link active" aria-current="page" href="albums.php">Albums</a>
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

            <h5 class="album-covers mx-5 pb-4">Users Review</h5>
            <section class="user_reviews">
               
                <!-- <p class="text-white">No User Reviews Yet!</p> -->
                
                <div class="users_review d-flex">
                        <div class="users_box d-flex justify-content-between">
                                <div class="user_conatiner d-flex">
                                        <div class="box_1 m-2">
                                             <div class="img"><img class="review_images" src="./images/0.png" alt=""></div>
                                        </div> 

                                        <div class="box_2">
                                                <p class="names">Nina Simon</p>
                                                <p class="rdate">April 3, 2027</p>
                                        </div>
                                </div>

                                <div class="ratings">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                   
                                   <span> 9.5/10</span>
                                </div>
                        </div>
                        <div class="comments">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa enim deserunt totam nobis facere ab! Quas ducimus ratione et dolore, soluta quos similique unde a! Tenetur ratione aliquid ad!</p>
                        </div>
                </div>
                <div class="users_review d-flex">
                        <div class="users_box d-flex justify-content-between">
                                <div class="user_conatiner d-flex">
                                        <div class="box_1 m-2">
                                             <div class="img"><img class="review_images" src="./images/0.png" alt=""></div>
                                        </div> 

                                        <div class="box_2">
                                                <p class="names">Nina Simon</p>
                                                <p class="rdate">April 3, 2027</p>
                                        </div>
                                </div>

                                <div class="ratings">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                   
                                   <span> 9.5/10</span>
                                </div>
                        </div>
                        <div class="comments">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa enim deserunt totam nobis facere ab! Quas ducimus ratione et dolore, soluta quos similique unde a! Tenetur ratione aliquid ad!</p>
                        </div>
                </div>

                <div class="users_review give_review">
                        <form action="">
                                <p class="p-0 m-0 d-flex justify-content-center h4">How was your experience?</p>
                                <div class="col-md-12 d-flex justify-content-center">
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                        <button class="star">&#9734;</button>
                                </div>
                              <div class="form-group ">
                                <label class="form-label" for="email">Write Your Review</label>
                               <textarea class="form-control col-md-12"name="" id="" cols="30" rows="4"></textarea>
                                <div class="invalid-feedback">
                                    Please enter your review
                                </div>
                        </div>
                        <div class="submit d-flex justify-content-end">
                                <input type="button" class="btn btn-outline-success mt-2" value="Submit">
                        </div>
                        </form>
                </div>
            </section>   


     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>

    
     <script src="js/bootstrap.bundle.min.js"></script>
     <script>
    const allStar = document.querySelectorAll('.star');
    allStar.forEach((star, i) => {
        star.addEventListener('click', function(event) {
            event.preventDefault(); 
            let current_star_level = i + 1;
            allStar.forEach((star, j) => {
                if (current_star_level >= j + 1) {
                    star.innerHTML = '&#9733';
                } else {
                    star.innerHTML = '&#9734';
                }
            });
        });
    });
</script>

</body>
</html>


