<?php

session_start();
unset($_SESSION['email']);
unset($_SESSION['profession']);
session_destroy();

echo '<script>alert("You have sucessfully logged out");</script>';
echo '<script>window.location.href="../../login.php?success";</script>';



?>