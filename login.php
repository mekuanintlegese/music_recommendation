<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect to home page
    header("Location: index.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user data from JSON file
    $userData = file_get_contents('./data/user.json');
    $users = json_decode($userData, true);

    // Check if user exists
    foreach ($users as $user) {
        if ($user["email"] === $email && password_verify($password, $user["password"])) {
            // Store username in session
            $_SESSION['username'] = $user["username"];
            // echo "$user[username']"
            // Redirect to home page
            header("Location: index.php");
            exit;
        }
    }

    // If user does not exist or invalid credentials
    echo '<script>alert("Invalid email or password. Please try again.");</script>';
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
                                    $loggedInUser = $user;
                                    break;
                                }
                            }
 

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

            <section class="login_page">
                <div class="login">
                    <h1 class="text-center login_title"> <i class="bi bi-music-note-beamed"></i> Welcome to <span style="color: blue; font-weight: 350;">Musicology!</span> <i class="bi bi-music-note-beamed"></i></h1>
                    <form id="loginForm" class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" novalidate>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Please enter your email address
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control"  type="password" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Please enter your password
                            </div>
                        </div>
                        <div class="check-label login_links d-flex align-items-center justify-content-between">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="check" >
                                <label class="form-check-label" for="check">Remember Me</label>
                            </div>
                            <div class="register">Don't have account? <a href="register.php">Register</a></div>
                        </div>
                        <input class="btn btn-dark w-100" type="submit" value="SIGN IN">
                    </form>
                </div>
            </section>


     </main>

     <footer>
        <div class="footer">© 2024 by Barry McArdle.</div>
     </footer>


    
     <script src="js/bootstrap.bundle.min.js"></script>
     <!-- <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            // Get input values
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Fetch user data from JSON file
            fetch('user.json')
                .then(response => response.json())
                .then(data => {
                    // Check if user exists
                    var user = data.find(user => user.email === email && user.password === password);
                    if (user) {
                        // User logged in successfully
                        alert("Welcome back, " + user.username + "!");
                        // Redirect to home page
                        window.location.href = "index.php";
                        // Hide Get Started button
                                            // Store session using PHP
                    <?php
                        session_start();
                        $_SESSION['username'] = user.username;
                    ?>
                        document.querySelector(".get-started-button").style.display = "none";
                    } else {
                        // Invalid credentials
                        alert("Invalid email or password. Please try again.");
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script> -->
</body>
</html>


