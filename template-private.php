<?php
/*
Template Name: Private
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<?php if (current_user_can('subscriber')) { ?>

<?php the_content(); ?>

<?php } else { ?>

<p>Must be logged in to view this content</p>

<?php } ?>

<?php get_footer(); ?>