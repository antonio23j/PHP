<?php
session_start();
?>
<header id="top">
    <div class="main">
        <nav class="main-menu">
            <ul>
                <li>Palestra Ime</li>
                <li><a href="#exercise">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#footer">Help</a></li>
            </ul>
        </nav>
        <?php
        if(isset($_SESSION['client_name'])) {
            echo '<span class="welcome">Welcome, ' . $_SESSION['client_name'] . '</span>';
            echo '<a href="logout.php" class="logout">Logout</a>';
        } else {
            echo '<a href="login.php" class="login">Login</a>';
            echo '<a href="clientRegister.php" class="register">Register</a>';
        }
        ?>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</header>
