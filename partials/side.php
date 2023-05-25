<?php 

    include('../config/connection.php');
    include('login_check.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
           <ul class="list"> 
           <img id="toggle_open" class="toggle" onclick="openSideBar()"  src="../image/icon.png" alt="">
           <img id="toggle_close" class="toggle" onclick="closeSideBar()"  src="../image/close.png" alt="">
               <!-- <div class="image"><img src="../images/logo.png" alt=""></div> -->
                <li><a href="#">This is the admin panel of your website from where you can change your data of your front-end website !!</a></li>
            </ul>
        </div>
    </nav><hr>
    <section class="downbar">
        <div class="sidebar" id="openNav">
            <ul>
                <li><a href="../admin_user/main.php">Admin users</a></li>
                <li><a href="../audio/main.php">Audio</a></li>
                <li><a href="../video/main.php">Videos</a></li>
                <li><a href="../news_letter/main.php">News letter</a></li>
                <li><a href="../sermon-notes/main.php">Sermon Notes</a></li>
                <li><a href="../gallery/main.php">Gallery</a></li>
                <li><a href="../logout.php">Log out</a></li>
            </ul>
        </div>
        <div class="main_container">
