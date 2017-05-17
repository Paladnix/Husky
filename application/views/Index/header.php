
<html lang="zh-CN">

    <head>
        <title>Husky</title>
        <meta charset="utf-8" />
        <meta name="description" content="Husky - A Light PHP Web MVC Framework." />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <link rel="icon" href="<?php echo APP_URL ?>/images/logo.png" type="image/x-icon" />


        <!-- main page styles -->
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/page.css" />
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/google-code-prettify/prettify.css" />



        <!-- this needs to be loaded before guide's inline scripts -->
        <script>window.PAGE_TYPE = "guide"</script>
<script src="<?php echo APP_URL ?>/js/jquery-3.2.1.min.js"></script>
    </head>

    <body class="docs" onload="prettyPrint()">

        <div id="mobile-bar">
            <a class="menu-button"></a>
            <a class="logo" href="<?php echo APP_URL ?>"></a>
        </div>

        <div id="header">
        <a id="logo" href="<?php echo APP_URL?>">
        <img src="<?php echo APP_URL ?>/images/logo.png">
                <span>Husky</span>
            </a>
            <ul id="nav">
            <li><a href="<?php echo APP_URL ?>" class="nav-link <?php if($action == "index") echo 'current';?>">教程</a></li>
                <li><a href="https://github.com/Paladnix/Husky/" class="nav-link">GitHub</a></li>
                <li><a href="<?php echo APP_URL."/index/author/" ?>" class="nav-link <?php if($action == "author") echo 'current';?>">About Author</a></li>
            </ul>
        </div>

        <div id="main" class="fix-sidebar">


            <div class="sidebar">
                <ul class="main-menu">
                 <!--   <li>
                        <form id="search-form">
                            <input type="text" id="search-query-nav" class="search-query st-default-search-input">
                        </form>
                    </li>
-->
                    <li><a href="<?php echo APP_URL ?>" class="nav-link current">教程</a></li>
                    <li><a href="https://github.com/Paladnix/Husky/" class="nav-link">GitHub</a></li>
                    <li><a href="<?php echo APP_URL."/index/author/" ?>" class="nav-link">About Author</a></li>

                </ul>
                
