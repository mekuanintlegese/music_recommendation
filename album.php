<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

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
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex justify-content-center">
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
                            echo '     <li><a class="dropdown-item text-white" href="setting.php"><i class="bi bi-gear"></i> Settings</a></li>';
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
           
             <?php
                            // Check if the album ID is provided in the URL
                            if (isset($_GET['id'])) {
                                    $albumId = $_GET['id'];
                            } else {
                                    $url = $_SERVER['REQUEST_URI'];
                                    $albumId = extractAlbumIdFromUrl($url);
                                    if ($albumId === false) {
                                        echo '<h5 class="text-center p-4 mx-5 text-white">Album not found, with this ID!</h5>';
                                    exit;
                                    }
                            }

                                    $albumsData = file_get_contents('./data/albums.json');
                                    $albums = json_decode($albumsData, true);

                                    // Find the album with the given ID
                                    $selectedAlbum = null;
                                    foreach ($albums as $album) {
                                    if ($album['id'] == $albumId) {
                                            $selectedAlbum = $album;
                                            break;
                                    }
                                    }

                                    // If album not found, display a message
                                    if (!$selectedAlbum) {
                                    echo '<h5 class="album-covers mx-5 text-white">Album not found, with this ID!</h5>';

                                    } else {
                                    // Display album details dynamically
                                    echo '<h5 class="album-covers mx-5">Immerse Yourself in Musical Excellence</h5>';
                                    echo '<section class="album_container">';
                                    echo '<div class="container">';
                                    echo '<div class="row">';
                                    echo '<div class="col-md-5">';
                                    echo '<img class="album_image" src="./images/' . $selectedAlbum['cover_image'] . '" alt="' . $selectedAlbum['title'] . '">';
                                    echo '</div>';
                                    echo '<div class="col-md-7">';
                                    echo '<div class="copy">';
                                    echo '<div class="text-hero-bold">';
                                    echo '<ul class="album_details">';
                                    echo '<p><b>Album Title - </b>' . $selectedAlbum['title'] . '</p>';
                                    echo '<p><b>Performer - </b>' . $selectedAlbum['performer'] . '</p>';
                                    echo '<p><b>Genre - </b>' . $selectedAlbum['genre'] . '</p>';
                                    echo '<p><b>Release Year - </b>' . $selectedAlbum['release_year'] . '</p>';
                                    echo '<p><b>Description - </b>' . $selectedAlbum['description'] . '</p>';
                                    echo '<p><b>Total Number of Songs - </b>' . count($selectedAlbum['tracklist']) . ' tracks</p>';
                                    echo '<p><b>Total Time - </b>' . $selectedAlbum['total_time'] . '</p>';
                                    echo '<p><b>Producer - </b>' . $selectedAlbum['producer'] . '</p>';
                                    echo '<p><b>Label - </b>' . $selectedAlbum['label'] . '</p>';
                                    echo '<p><b>Awards - </b>' . implode(', ', $selectedAlbum['awards']) . '</p>';
                                    echo '<p><b>Certifications - </b>' . implode(', ', $selectedAlbum['certifications']);
                                    echo '<p><b>Recommendation Score - </b>' . $selectedAlbum['recommendation_score'] . '</p>';
                                    echo '</ul>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</section>';

                                    // Display tracklist dynamically
                                    echo '<h5 class="album-covers mx-5 pb-4">Tracklist in the Album</h5>';
                                    echo '<section>';
                                    echo '<div class="col-md-12 tab-content" id="pills-tabContent pt-2">';
                                    foreach ($selectedAlbum['tracklist'] as $index => $track) {
                                            echo '<div class="tab-pane fade text-white show active">';
                                            echo '<div class="song-small m-2 ms-4 col-md-6 row align-items-center">';
                                            echo '<div class="col-1 h3">' . sprintf("%02d", $index + 1) . '</div>';
                                            echo '<div class="col d-flex align-items-center">';
                                            echo '<img class="rounded m-1 smaller_img" src="./images/' . $selectedAlbum['cover_image'] . '" alt="">';
                                            echo '<div class="ms-2">' . $track['title'] . '</div>';
                                            echo '</div>';
                                            echo '<div class="col-2"><i class="bi bi-clock m-2"></i>' . $track['duration'] . '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                    }
                                    echo '</div>';
                                    echo '</section>';
                                    

                                    // Display user reviews dynamically
                                    echo '<h5 id="#user_reviews" class="album-covers mx-5 pb-4">Users Review</h5>';
                                    echo '<section class="user_reviews">';
                                    if (isset($selectedAlbum['reviews']) && !empty($selectedAlbum['reviews'])) {
                                        foreach ($selectedAlbum['reviews'] as $review) {
                                            echo '<div class="users_review d-flex">';
                                            echo '<div class="users_box d-flex justify-content-between">';
                                            echo '<div class="user_container d-flex">';
                                            echo '<div class="box_1 m-2">';
                                            echo '<div class="img"><img class="review_images" src="./images/user_icon.png" alt=""></div>'; // Default user image
                                            echo '</div>';
                                            echo '<div class="box_2">';
                                            echo '<p class="names">' . $review['reviewer'] . '</p>';
                                            echo '<p class="rdate">' . $review['date'] . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="ratings">';
                                            $rating = explode('/', $review['rating'])[0]; // Extracting only the numeric part of the rating
                                            for ($i = 0; $i < $rating; $i++) {
                                                echo '<i class="bi bi-star-fill"></i>';
                                            }
                                            for ($i = 0; $i < (10 - $rating); $i++) {
                                                echo '<i class="bi bi-star"></i>';
                                            }
                                            echo '<span>' . $review['rating'] . '</span>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="comments">';
                                            echo '<p>' . $review['comment'] . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo '<p class="text-white">No User Reviews Yet!</p>';
                                    }
                                    echo '</section>';
                        }


                        // Check if the user is logged in
                        if (isset($_SESSION['username'])) {
                            // Check if the form is submitted
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
                                // Get the review details
                                $reviewer = $_SESSION['username'];
                                $date = date("F j, Y");
                                $rating = $_POST['rating'];
                                $comment = $_POST['comment'];

                                // Load user data
                                $userData = file_get_contents('./data/user.json');
                                $users = json_decode($userData, true);

                                // Find the user's ID based on their username
                                $userId = null;
                                foreach ($users as $user) {
                                    if ($user['username'] === $reviewer) {
                                        $userId = $user['id'];
                                        break;
                                    }
                                }

                                // Add the new review to the album's reviews
                                // $albumId = $_GET['id'];
                                $albumsData = file_get_contents('./data/albums.json');
                                $albums = json_decode($albumsData, true);

                                foreach ($albums as &$album) {
                                    if ($album['id'] == $albumId) {
                                        $newReview = [
                                            'id' => count($album['reviews']) + 1, // Generate a new unique ID for the review
                                            'user_id' => $userId,
                                            'reviewer' => $reviewer,
                                            'date' => $date,
                                            'rating' => $rating,
                                            'comment' => $comment
                                        ];
                                        $album['reviews'][] = $newReview;
                                        break;
                                    }
                                }

                                // Save the updated album data
                                file_put_contents('./data/albums.json', json_encode($albums, JSON_PRETTY_PRINT));
                                // $albumId = $_GET['id']; // Assuming you already have the album ID available
                                echo '<script>';
                                echo '    window.location.href = "http://localhost/music_recommendation/album.php?id=' . $albumId . '";'; // Redirect to album.php with the album ID in the URL and scroll to the user reviews section
                                echo '    alert("Review submitted successfully!");'; // Show a success alert
                                echo '</script>';
                                exit; 
                            }

                            // Display the section for giving reviews
                            echo '<div class="users_review give_review">';
                            echo '    <form method="post" action="">';
                            echo '        <p class="p-0 m-0 d-flex justify-content-center h4">How was your experience?</p>';
                            echo '        <div class="col-md-12 d-flex justify-content-center">';
                            for ($i = 0; $i < 10; $i++) {
                                echo '            <button class="star" type="button">&#9734;</button>';
                            }
                            echo '        </div>';
                            echo '  <input type="hidden" id="custId" name="rating" value="1">';
                            echo '        <div class="form-group">';
                            echo '            <label class="form-label" for="email">Write Your Review</label>';
                            echo '            <textarea class="form-control col-md-12" name="comment" id="comment" cols="30" rows="4"></textarea>';
                            echo '            <div class="invalid-feedback">';
                            echo '                Please enter your review';
                            echo '            </div>';
                            echo '        </div>';
                            echo '        <div class="submit d-flex justify-content-end">';
                            echo '            <input type="submit" name="submit_review" class="btn btn-outline-success mt-2" value="Submit">';
                            echo '        </div>';
                            echo '    </form>';
                            echo '</div>';
                        }
                        
?>



     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>

    
     <script src="js/bootstrap.bundle.min.js"></script>
     <script>
            const allStar = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('custId'); // Get the hidden input field

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

                    // Set the value of the hidden input field to the current star level
                    ratingInput.value = current_star_level;
                });
            });
    </script>


</body>
</html>


