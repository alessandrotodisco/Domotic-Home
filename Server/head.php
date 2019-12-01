<?php 
    echo "
    <!--
        Author: Alessandro Todisco;
        Name: ".$site_name.";
        Description: ".$description.";
    -->
    "; ?>
    <!-- META -->
    <META content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <META name="keywords" Content="alessandro todisco, portfolio, arduino, website, html, android">
    <META name="author" Content="Alessandro Todisco">
    <META name="description" Content="Personal website of Alessandro Todisco">
    <META name="generator" Content="Notepad++, gedit">
    <META name="viewport" content="width=device-width, initial-scale=1,  maximum-scale=1.0" /> 
    <!-- <META http-equiv="refresh" content="10000"> -->
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/favicon.ico" >

    <!-- TITLE -->
    <title><?php echo $title_app.$page; ?></title>
    
    <!-- STYLE -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/map.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/footer.css"> -->
    
    <?php
        if($log==0) 
            echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
    ?>
    <?php
        if($log==1) 
            echo "<link rel='stylesheet' type='text/css' href='css/login.css'>\n";
        if($pro==1){
            echo "<link rel='stylesheet' type='text/css' href='css/table_css3.css'>\n";
        }
    ?>
    
    <!-- SCRIPT -->
    <?php 
        if($dom==1){
            echo "
                <script src='js/ajax.js'></script>
                <script src='js/function.js'></script>
                <script src='js/request.js'></script>
            ";
        }

        if($pro==1){
            echo "
                <script src='js/profile.js'></script>
            ";
        }
    ?>

    <?php echo"\n"?>

    