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
    try {
        // Get form data
        $username = $_POST["username"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        // Validate form data (add your own validation rules as needed)

        // Check if passwords match
        if ($password !== $confirmPassword) {
            throw new Exception("Passwords do not match.");
        }

        // Read existing users from JSON file
        $userData = file_get_contents('./data/user.json');
        $users = json_decode($userData, true);

        // Check if email already exists
        foreach ($users as $user) {
            if ($user["email"] === $email) {
                throw new Exception("Email already exists.");
            }
        }

        foreach ($users as $user) {
            if ($user["username"] === $username) {
                throw new Exception("Username taken, Try another one!.");
            }
        }

        // Get the ID for the new user
        $id = end($users)["id"] + 1;

        // Hash the password (you should use stronger encryption in a real application)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create new user array
        $newUser = array(
            "id" => $id,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "username" => $username,
            "email" => $email,
            "password" => $hashedPassword
        );

        // Add new user to users array
        $users[] = $newUser;

        // Encode users array to JSON and save to file
        $result = file_put_contents('./data/user.json', json_encode($users, JSON_PRETTY_PRINT));
        if ($result === true) {
            echo '<script>alert("Registration successful. You can now log in.");</script>';
        }

        // Redirect to login page
        header("Location: login.php");
        exit;
    } catch (Exception $e) {
        http_response_code(500); 
        echo '<script>alert("An error occurred during registration: ' . $e->getMessage() . '");</script>';
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
                    <h1 class="text-center login_title"> <i class="bi bi-music-note-beamed"></i> Register on <span style="color: blue; font-weight: 350;">Musicology!</span> <i class="bi bi-music-note-beamed"></i></h1>

                    <form action="register.php" class="row" method="POST" novalidate>
                            <!-- Username field -->
                            <div class="form-group">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" type="text" id="username" name="username" required>
                                <div class="invalid-feedback">Please enter your username</div>
                            </div>

                            <!-- First Name and Last Name fields -->
                            <div class="form-row d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label class="form-label" for="firstName">First Name</label>
                                    <input class="form-control" type="text" id="firstName" name="firstName" required>
                                    <div class="invalid-feedback">Please enter your first name</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lastName">Last Name</label>
                                    <input class="form-control" type="text" id="lastName" name="lastName" required>
                                    <div class="invalid-feedback">Please enter your last name</div>
                                </div>
                            </div>

                            <!-- Email field -->
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" required>
                                <div class="invalid-feedback">Please enter a valid email address</div>
                            </div>

                            <!-- Password fields -->
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" required>
                                <div class="invalid-feedback">Please enter your password</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" required>
                                <div class="invalid-feedback">Please confirm your password</div>
                            </div>
                            <div class="check-label login_links d-flex align-items-center justify-content-between">
                                <div class="form-group form-check">
                                    <!-- <input class="form-check-input" type="checkbox" name="check" > -->
                                    <label class="form-check-label" for="check"></label>
                                </div>
                                <div class="register">Already have account? <a href="login.php">Login</a></div>
                            </div>

                            <!-- Registration button -->
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


