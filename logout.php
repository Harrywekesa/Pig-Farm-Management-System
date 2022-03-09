<?php
session_start();
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['user']);

header('location: index.php');