<?php
// Start session
session_start();

// Check if user is already logged in
if (!isset($_SESSION['username'])) {
    // Redirect to home page
    header("Location: index.php");
    exit;
}

// Read user data from JSON file
$userData = file_get_contents('./data/user.json');

// Check if user data was successfully read
if ($userData === false) {
    // Handle error, for example:
    echo "Error: Failed to read user data.";
    exit;
}

// Decode JSON data into PHP array
$users = json_decode($userData, true);

// Check if JSON decoding was successful
if ($users === null) {
    // Handle error, for example:
    echo "Error: Failed to decode user data.";
    exit;
}

// Retrieve user data based on the username stored in the session
$loggedInUser = null;
foreach ($users as $user) {
    if ($user["username"] === $_SESSION['username']) {
        // Found the logged-in user
        $loggedInUser = $user;
        break;
    }
}
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
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0  d-flex justify-content-center">
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
                                        // Found the logged-in user
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

            <section class="hero albums">
                <div class="prof_conatner">

                    <div class="continer p-2 col-md-12">
                        <div class="col-md-6">
                            <img class="profile_image" src="./images/<?php echo $loggedInUser["picture"]; ?>" alt="<?php echo $loggedInUser["picture"]; ?>">
                        </div>
                        <div class="col-md-6 details">
                        <ul>
                            <li>First Name: <?php echo $loggedInUser["first_name"]; ?></li>
                            <li>Last Name: <?php echo $loggedInUser["last_name"]; ?></li>
                            <li>Username: <?php echo $loggedInUser["username"]; ?></li>
                            <li>Email: <?php echo $loggedInUser["email"]; ?></li>
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


