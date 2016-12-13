<?php

session_start();

$name = $_GET['n'];
$value = $_GET['v'];

$_SESSION[$name] = $value;

print_r($_SESSION);

?>