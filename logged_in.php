<?php
session_start();

ini_set('display_errors', 0); // hide PHP notices and errors

$mysqli = new mysqli("127.0.0.1","root", "root","palestra");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];    
    
    $stmt = $mysqli->prepare("SELECT name, email, training_plan FROM clients WHERE id_client = ?");
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $stmt->bind_result($name, $email, $training_plan);
    $stmt->fetch();
    $stmt->close();
} else {
    header('Location: login.php');
    exit;
}


if (isset($_POST['logout'])) {
    if ($_POST['logout'] == 'yes') {
        session_unset();
        session_destroy();
        header('Location: index.html');
        exit;
    }
}
?>

<html>

<head>
    <title>OMEGA GYM</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<body>

    
<header id="top">

<div class="main">

    <nav class="main-menu">

        <ul>
            <li>OMEGA GYM</li>
            <li><a href="#exercise">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#trainer">Trainers</a></li>
            <li><a href="#footer">Help</a></li>
        </ul>

    </nav>

    <div class="profile-info">
        <span class="logged-in">Logged in as: <?php echo $name; ?></span>
        <div class="profile-details">
            <p>Email: <?php echo $email; ?></p>
            <p>Training Plan: <?php echo $training_plan; ?></p>
        </div>
    </div>

    <form method="post" action="">
                <input type="hidden" name="logout" value="yes">
                <button type="submit" class="logout-button">Logout</button>
    </form>

    <button onclick="window.location.href='change_password.php'" class="change-password-button">Change Password</button>


    <div class="clear"></div>
</div>

<div class="clear"></div>

</header>

    <section id="exercise">


        <div class="main">


            <div class="grid grid50-50">

                <div class="column column50">

                    <h1>Let's Exercise For <br> Your Health</h1>

                    <h2>Health is the top priority, let's train your body fitness with us who always provide the best service and results</h2>

                </div>

                <div class="column column50 last">

                    <iframe width="590" height="350" src="https://www.youtube.com/embed/eaRQF-7hhmo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>

                </div>

            </div>

            <div class="clear"></div>
        </div>

    </section>

    <section id="service">

        <div class="main">

            <h3> Our Service's </h3>
            <h1> There is an attractive <br />package for you <h1>

                <div class="grid grid33-33-33">

                    <div class="column column33">

                        <img src="images/img2.png" />

                        <p>Yoga Aerobic</p>

                        <h5> Yoga is one of the most popular <h5>

                    </div>

                    <div class="column column33">

                        <img src="images/img3.png" />


                        <p>Aerodinamica </p>

                        <h5> Aerodynamics makes your body </h5>

                    </div>

                    <div class="column column33">

                        <img src="images/img1.png" />

                        <p>Meditation</p>

                        <h5> Meditation is to keep the mind </h5>

                    </div>

                </div>

                <div class="clear"></div>

        </div>


    </section>

    <section id="about">

        <div class="main">

            <div class="grid grid55-45">

                <div class="column column55">


                    <h3> About us </h3>

                    <h1> We are the best fitness provider in the world </h1>

                    <h2> We are the best sports service provider in the world, we always provide pleasant service, coupled with professional and trained instructors</h2>

                </div>

                <div class="column column45">

                    <div class="container">

                        <div class="main-img">

                            <img src="images/img3.png" id="current">

                        </div>


                        <div class="imgs">

                            <img src="images/img1.png">
                            <img src="images/img2.png">
                            <img src="images/img3.png">
                            <img src="images/img4.png">

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="clear"></div>

    </section>

    <script src="main.js"></script>

    <section id="trainer">

        <div class="main">

            <div class="grid grid55-45">

                <div class="column column45">

                    <h3> Our Trainer's </h3>

                    <h1> Best coaches and professionals in their fields </h1>

                    <h1>TODO</h1>

                </div>

            </div>

            <div class="clear"></div>
        </div>

    </section>



    <section id="contact">


        </div>

        <div class="clear"></div>
        </div>

        <div class="clear"></div>

    </section>

    <section id="footer">


        <div class="grid grid20-20-20-20-20">

            <div class="column column20">

                <h4>Ngoto</h4>

                <ul class="social">

                    <li><a href="#"><img src="images/img8.png" /></a></li>
                    <li><a href="#"><img src="images/img8.png" /></a></li>
                    <li><a href="#"><img src="images/img8.png" /></a></li>

                </ul>

            </div>

            <div class="column column20">

                <h4>Company</h4>

                <ul class="footer-menu">

                    <li><a href="#">About</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Partner</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Features</a></li>

                </ul>

            </div>


            <div class="column column20">

                <h4>Features</h4>

                <ul class="footer-menu">

                    <li><a href="#">Private</a></li>
                    <li><a href="#">Trainers</a></li>
                    <li><a href="#">Workout</a></li>
                    <li><a href="#">Join</a></li>

                </ul>

            </div>

            <div class="column column20">

                <h4>About us</h4>

                <ul class="footer-menu">

                    <li><a href="#">Who are we</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">FA</a></li>

                </ul>

            </div>

            <div class="column column20 last">

                <h4>Contact</h4>

                <ul class="footer-menu">

                    <li><a href="#">(684) 555-0102</a></li>
                    <li><a href="#">Ngotot@email.com</a></li>
                    <li><a href="#">4517 Washington </br> Manchester</a></li>

                </ul>
            </div>
        </div>

        <p>Copyright 2021 - All right.</p>

        <div class="clear"></div>
    </section>

</body>

</html>
