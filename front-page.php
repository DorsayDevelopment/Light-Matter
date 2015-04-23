<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-04-21
 * Time: 6:44 PM
 */
?>

<?php get_header(); ?>

<main>
    <div id="slider-widget-area">

        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('slider-widget-area')) : else : ?>
            there should be a widget here
        <?php endif; ?>
    </div>

</main>

<?php get_footer(); ?>

