<?php
require_once('authentication.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BeanLeaf - Remove a user</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<section>
<h2>BeanLeaf - Remove a user</h2>
​
    <?php
    if (isset($_GET['id']) && isset($_GET['fn']) && isset($_GET['ln']) && isset($_GET['email']) && isset($_GET['password'])) {
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
        echo '<p class="error">Sorry, no user was specified for removal.</p>';
    }

    if (isset($_POST['submit'])) {
        if ($_POST['confirm'] == 'Yes') {
            $dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');

            // Delete the score data from the database
            $query = "DELETE FROM info WHERE id = $id LIMIT 1";
            $stmt = $dbh->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();


            foreach ($dbh as $row) {
                // Confirm success with the user
                echo '<p>The user ' . $email . ' for ' . $ln . ' was successfully removed.';
            }
        }
        else {
            echo '<p class="error">The user was not removed.</p>';
        }
    }
    else if (isset($id) && isset($ln) && isset($fn) && isset($email)) {
        echo '<p>Are you sure you want to delete the following user?</p>';
        echo '<p><strong>Last Name: </strong>' . $ln . '<br /><strong>First Name: </strong>' . $fn .
            '<br /><strong>Email: </strong>' . $email . '</p>';
        echo '<form method="post" action="removeuser.php">';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="ln" value="' . $ln . '" />';
        echo '<input type="hidden" name="email" value="' . $email . '" />';
        echo '</form>';
        echo '<br><br>';
        echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
    }
    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
    ?>
​</section>
</body>
</html>