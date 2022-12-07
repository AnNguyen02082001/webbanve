<?php
session_start();
unset($_SESSION['login']);
header('location:../view/index.php');