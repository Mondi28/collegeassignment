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
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
                <!--Phone  -->
                <div class="mobilenav">
                    <div class="menubutton">
                         <img src="/img/menuicon.png" height="30" onclick="showMenu()" alt="Menu Icon">
                    </div>
                    <h1 id="navh1mobile">Tresham College</h1>
                </div>
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
            <h1>Profile of computer courses?</h1>
            <!-- Show te computer courses, Level2 and 3 CARDS find out more button refers to Tresham website -->
            
            <h1>X and Y others are interested in this occasion.
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">Submit</button>
        </main>
    </body>
    <script src="/js/main.js"></script>
</html>