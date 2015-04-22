<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-04-21
 * Time: 6:42 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title('|', 1, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php wp_head(); ?>
</head>
<body>

<header>
    <div class="navbar-fixed">
    <nav>
        <div class="container">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="components.html">Components</a></li>
                <li><a href="javascript.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="components.html">Components</a></li>
                <li><a href="javascript.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
            </ul>
        </div>
    </nav>
    </div>

</header>

