<html>
<head>
    <title>Small Subscription Box</title>
    <link rel="stylesheet" href="subs.css">
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

<section>
<img src="https://i.imgur.com/gZRZBny.png" alt="Small Subscription">
<h1>Small Subscription Box</h1>
<h2>This box comes with three of the most poplar flavors of tea and . The flavors are :</h2>
    <h2><li>Earl Grey Tea</li></h2>
    <h2><li>Green Tea</li></h2>
    <h2><li>Gunpowder Tea</li></h2>
<h3>It comes with plenty of each flavor, so don't worry! And it's only $14.99 a box!</h3>
</section>

<?php
$dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
if(isset($_POST['submit'])) {


    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $price = $_POST['price'];

    $query = "INSERT INTO orders (full_name, address, email, price) VALUES ('$full_name','$address','$email','$price') ";
    $stmt = $dbh->prepare($query);
    $result = $stmt->execute(
        array(
            'full_name'   => $full_name,
            'address'     => $address,
            'email'       => $email,
            'price'       => $price,
        )
    );
    //Mail function of the code
    $from = 'jacob.riggs@west-mec.org';
    $subject = 'Your order';
    $text = 'Your order has been received. You can expect in the time from of the 20th to the 25th of the current month.';
    $to = $email;
    $name =  $full_name;
    $msg = "Dear $name.\n $text";
    mail($to,$subject,$msg, 'From:'. $from);
}
?>
<section id="section2">
    <br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input id="name" name="name" placeholder="Full Name">
        <input id="address" name="address" placeholder="Address">
        <input id="email" name="email" placeholder="Email">
        <input id="price" name="price" type="hidden" value="14.99">
        <input id="submit" type="submit" value="Order">
    </form>
</section>
</body>
</html>