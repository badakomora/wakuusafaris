<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Babylonica' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!------ Include the above in your HEAD tag ---------->
    <title><?php
    if(isset($_GET['sid'])){
      include 'includes/dbconfiq.php';
      $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE id ='".$_GET['sid']."'");
      while($row = mysqli_fetch_array($query)){
            echo $row['safariname'];
    }}elseif(isset($_GET['v'])){
        echo $_GET['v'];
    }else{echo 'Wakuu Safaris';}?></title>
    <style>
        #preload{
            width:100%;
            height:100%;
            position:fixed;
            z-index:9999;
            background: #fff url("forms/img/loading.gif") center center no-repeat;
        }
    </style>
</head>
<body>
<div id="preload"></div>
<div id="body">
    <!-- header -->

    <div class="navbar-wrapper">
        <div class="container">

            <nav class="navbar navbar-light navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" style="margin-top: 50px;color:white;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <i class="fa fa-bars fa-2x"></i>
                        </button>
                        <a class="navbar-brand" href="#"><img src="forms/img/logo.jfif" class="logo1" width="100" height="100" style="border-radius: 10%;" alt=""></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="./">Home</a></li>
                            <li class="link"><a href="view.php?v=About">About</a></li>
                            <li><a href="" data-toggle="modal" data-target="#contact">Contact</a></li>
                            <li>
                                <button class="btn" style="width: 150px; height: 50px;background-color: #800000; border: none; margin-top: 10px;color:white;" data-toggle="modal" data-target="#booktour">Plan Safari</button>
                            </li>
                            <li class="active"><a href="view.php?v=Gallery">Gallery</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Packages <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php#Resident" style="color: #800000;">Resident Packages</a></li>
                                    <li><a href="index.php#Non-Resident" style="color: #800000;">Non-Resident Packages</a></li>
                                    <li><a href="index.php#Other" style="color: #800000;">other Packages</a></li>
                                </ul>
                            </li>
                            <li><a href="view.php?v=Blog">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>
