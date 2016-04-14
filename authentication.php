<?php
$username = 'bean';
$password = 'leaf';
if(!isset($_SERVER['PHP_AUTH_USER'])|| !isset($_SERVER['PHP_AUTH_PW'])|| ($_SERVER['PHP_AUTH_USER']!=$username)||($_SERVER['PHP_AUTH_PW']!=$password)) {
    header('HTTP/1.1401 Unathorized');
    header('WWW-Authenticate: Basic realm = "BeanLeaf');
    exit('<h2>BeanLeaf</h2>Sorry, you must enter a valid username and password to' . 'access this page.');
}
?>