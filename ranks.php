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
                    <a class="nav-link" href="albums.php">Albums</a>
                    </li>

                    <li class="nav-item navlist">
                    <a class="nav-link active" aria-current="page" href="ranks.php">Ranking</a>
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
            <table id="myTable" class="mt-4 m-2 table bg-dark table-dark table-striped  align-middle table-hover">
                <thead>
                    <tr>
                    <th onclick="sortTable(1,this)" scope="col"> Rank </th>
                    <th onclick="sortTable(2,this)" scope="col"> Album Cover </th>
                    <th onclick="sortTable(3,this)" scope="col"> Album Title </th>
                    <th onclick="sortTable(4,this)" scope="col"> Performer </th>
                    <th onclick="sortTable(5,this)" scope="col"> Release Year </th>
                    <th onclick="sortTable(6,this)" scope="col"> Genre </th>
                    <th onclick="sortTable(7,this)" scope="col"> Recommendation Score </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Read data from albums.json
                    $albums_data = file_get_contents('./data/albums.json');
                    $albums = json_decode($albums_data, true);
                    
                    // Loop through each album and display as table row
                    foreach ($albums as $index => $album) {
                        echo '<tr>';
                        echo '<td>' . ($index + 1) . '</td>';
                        echo '<td><img class="rounded m-1 album_img" src="images/' . $album['cover_image'] . '" alt=""></td>';
                        echo '<td>' . $album['title'] . '</td>';
                        echo '<td>' . $album['performer'] . '</td>';
                        echo '<td>' . $album['release_year'] . '</td>';
                        echo '<td>' . $album['genre'] . '</td>';
                        echo '<td>' . $album['recommendation_score'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

                    </main>

<footer>
   <div class="footer">© 2024 by Barry McArdle.</div>
</footer>


     <script src="js/bootstrap.bundle.min.js"></script>
     <script>
        function sortTable(n,th) {
        const table = document.getElementById("myTable");
        const direction = table.dataset.sortDirection || "asc";
        const sortedRows = Array.from(table.rows)
        .slice(1)
        .sort((rowA,rowB)=>{
            const comparison = rowA.cells[n].innerText > rowB.cells[n].innerText ? 1 : -1;
            return direction === "asc" ? comparison : -comparison;
        });
        sortedRows.forEach(row => table.appendChild(row));
        table.dataset.sortDirection = direction === "asc" ? "desc" : "asc";
        Array.from(table.getElementsByTagName("th")).forEach(header=>{
            header.innerText = header.innerText.replace(" ▼","").replace(" ▲","");
        });
        th.innerText += direction === "asc" ? " ▼" : " ▲";
        }



     </script>
</body>
</html>


