<?php
require_once ('authentication.php');
?>
​
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BeanLeaf - Approve a user</title>
    <link rel="stylesheet" type="text/css" href="approve.css" />
</head>
<body>
<section>
<h2>BeanLeaf - Approve a user</h2>

    <?php
    if (isset($_GET['id']) && isset($_GET['fn']) && isset($_GET['ln']) && isset($_GET['email'])) {
        // Grab the score data from the GET
        $id = $_GET['id'];
        $fn = $_GET['fn'];
        $ln = $_GET['ln'];
        $email = $_GET['email'];
        $password = $_GET['password'];
    }
    else if (isset($_POST['id']) && isset($_POST['ln']) && isset($_POST['email'])) {
        // Grab the score data from the POST
        $id = $_POST['id'];
        $ln = $_POST['ln'];
        $email = $_POST['email'];
    }
    else {
        echo '<p class="error">Sorry, no user was specified for approval.</p>';
    }

    if (isset($_POST['submit'])) {
        if ($_POST['confirm'] == 'Yes') {
            // Connect to the database
            $dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');

            // Approve the score by setting the approved column in the database
            $query = "UPDATE info SET approve = 1 WHERE id = $id";
            $stmt = $dbh->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            // Confirm success with the user
            echo '<p>The user' . $email . ' for ' . $ln . ' was successfully approved.';
        }
        else {
            echo '<p class="error">Sorry, there was a problem approving the user.</p>';
        }
    }
    else if (isset($id) && isset($ln) && isset($fn) && isset($email)) {
        echo '<p>Are you sure you want to approve the following user?</p>';
        echo '<p><strong>Name: </strong>' . $ln . '<br /><strong>Date: </strong>' . $fn .
            '<br /><strong>Score: </strong>' . $email . '</p>';
        echo '<form method="post" action="approveuser.php">';
        echo '<p><strong>Password:' . $password. '</strong></p><br />';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="ln" value="' . $ln . '" />';
        echo '<input type="hidden" name="email" value="' . $email . '" />';
        echo '</form>';
    }
    echo '<br><br>';
    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
    ?>
​</section>
</body>
</html>