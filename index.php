<?php
    include "querymodel.php";

    $queryModel = new QueryModel($conn);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['name']) && isset($_POST['email'])) {
            
            $name = $queryModel->sanitizeInput($_POST['name']);
            $email = $queryModel->sanitizeInput($_POST['email']);

            $queryModel->insertOpenDayForm($name, $email);
        } 
    }

    $nameAndID = $queryModel->getNameandAmount();
    if (empty($nameAndID)) {
        $nameAndID = [['name' => 'No one', 'id' => 0]];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>TreshamWEB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/responsive.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About Campus</a></li>
                    <li><a href="{{ url('/contact') }}">Assignment</a></li>
                </ul>
            </nav>
            <div class="banner">
                <div class="banner-img">
                    <img src="img/bedfordlogo.png" height="75" alt="Banner Image">
                </div>
                <div class="right-animation">
                    <div class="circle anim-blue"></div>
                    <div class="circle anim-purple"></div>
                </div>
            </div>
        </header>
        <main>
            <div class="cardcomponent">
                <div class="card">
                <h1>Course Title</h1>
                    <div class="cardhr"></div>
                    <div class="cardimg">
                        <img src="img/img1.webp">
                    </div>
                </div>

                <div class="card">
                    <h1>Course Title</h1>
                    <div class="cardhr"></div>

                    <div class="cardimg">
                        <img src="img/img2.webp">
                    </div>
                </div>

                <div class="card">
                    <h1>Course Title</h1>
                    <div class="cardhr"></div>
                    <div class="cardimg">
                        <img src="img/img3.webp">
                    </div>
                </div>
            </div>
            <!-- Show te computer courses, Level2 and 3 CARDS find out more button refers to Tresham website -->
            
            <div class="opendayholder">
                <div class="opendayform">
                    <h1>Open Day Form</h1>
                    <form action="#" method="POST">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div class="opendayinfo">
                    <?php
                        $firstname = strtok($nameAndID[0]['name'], " ");
                        $others = $nameAndID[0]['id'] -1 ;
                        echo "<h2>{$firstname}, and {$others} others are interested in the Open Day event</h1>";
                    ?>
                </div>
            </div>
            <footer>
                <h1>bedfordcollegegroup.ac.uk</h1>
                <p>© 2025 Tresham College. All rights reserved.</p>
            </footer>
            
        </main>
    </body>
    <script src="/js/main.js"></script>
</html>