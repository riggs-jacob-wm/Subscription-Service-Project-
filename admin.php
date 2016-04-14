<?php
require_once('authentication.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BeanLeaf - User Administration</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<section>
<h2>BeanLeaf - User Administration</h2>
    <br>
<p>Below is a list of all BeanLeaf user data. Use this page to remove and approve users as needed.</p>
    <br>
    <?php
    $dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
    $query = "SELECT * FROM info ORDER BY email DESC, fn ASC";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo '<table align="center">';
    foreach ($result as $row) {
        echo '<tr class="scorerow"><td><strong>' . $row['ln'] . '</strong></td>';
        echo '<td>' . $row['fn'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td><a href="removeuser.php?id=' . $row['id'] . '&amp;fn=' . $row['fn'] .
            '&amp;ln=' . $row['ln'] . '&amp;email=' . $row['email'] .
            '&amp;password=' . $row['password'] . '">Remove</a>';
        if($row['approve']=='0') {
            echo '<td>/<a href= "approveuser.php?id=' .  $row['id'] . '&amp;fn=' . $row['fn'] .
                '&amp;ln=' . $row['ln'] . '&amp;email=' . $row['email'] . '&amp;password=' .
                $row['password'] . '">Approve</a>';
        }
        echo '</td></tr>';
    }
    echo '</table>';
    ?>
</section>
</body>
</html>