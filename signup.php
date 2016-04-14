<html>
<head>
    <title>Signup for BeanLeaf</title>
    <link rel="stylesheet" href="styles.css">
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
$dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $password = $_POST['password'];


    $query = "INSERT INTO info (fn, ln, email, password, approve) VALUES ('$fn','$ln','$email','$password', 0) ";
    $stmt = $dbh->prepare($query);
    $result = $stmt->execute(
        array(
            'fn'       => $fn,
            'ln'       => $ln,
            'email'    => $email,
            'password' => $password,
        )
    );
    //Mail function of the code
    $from = 'jacob.riggs@west-mec.org';
    $subject = 'Your account';
    $text = 'Your account has been made. Have fun ordering tea!';
    $to = $email;
    $name =  $fn. $ln;
    $msg = "Dear $name.\n $text";
    mail($to,$subject,$msg, 'From:'. $from);
}

?>
<div class="form-wrap">
    <div class="tabs">
        <h3 class="signup-tab"><a class="active" href="signup.php">Sign Up</a></h3>
        <h3 class="login-tab"><a href="login.php">Login</a></h3>
    </div>

    <div class="tabs-content">
        <div id="signup-tab-content" class="active">
            <form class="signup-form" action="" method="post">
                <input type="text" class="input" id="fn" name="fn" autocomplete="off" placeholder="First Name">
                <input type="text" class="input" id="ln" name="ln" autocomplete="off" placeholder="Last Name">
                <input type="email" class="input" id="email" name="email" autocomplete="off" placeholder="Email">
                <input type="password" class="input" id="password" name="password" autocomplete="off" placeholder="Password">
                <input type="submit" name="submit" class="button" value="Sign Up">
            </form>
        </div>

    </div>
</div>
</body>
</html>