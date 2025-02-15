<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific mathces a query.
 * E.g., it puts together the home page when no home.php file exists.
 */
get_header();
// Add the function to our functions.php and create a variable to store the featured image.
$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<section class="post-masthead" style="background: url('<?php echo $featuredImg[0]; ?>')">
    <div>
        <h1><?php the_title(); ?></h1>
    </div>
</section>
<section class="homepage-content">
    <?php echo get_the_content(); ?>
</section>

<?php
get_footer();
?>