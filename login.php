<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Log in for BeanLeaf</title>
</head>
<body>

<header>
    <a href="index.html" class="logo">
        <em>Bean</em><strong>Leaf</strong>
    </a>
    <nav>
        <ul>
            <li><a href="subscriptions.html">Subscriptions</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
</header>
<section style="font-family: coco">
    <h1>Welcome to <em>BeanLeaf</em></h1>
    <p>Make an account to be able to get a subscription below</p>
</section>
<?php

?>
<div class="form-wrap">
    <div class="tabs">
        <h3 class="signup-tab"><a  href="signup.php">Sign Up</a></h3>
        <h3 class="login-tab"><a class="active" href="login.php">Login</a></h3>
    </div>
    <div class="tabs-content">
        <div id="signup-tab-content" class="active">
            <form class="signup-form" action="" method="post">
                <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email">
                <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                <input type="submit" class="button" value="Login">
            </form>
        </div>
    </div>
</div>
</body>
</html>