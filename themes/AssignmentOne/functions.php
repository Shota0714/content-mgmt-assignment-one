<?php
function my_theme_setup() {
    register_nav_menus(array(
        'header' => 'Header Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'my_theme_setup');
// Add featured image support to posts
add_theme_support('post-thumbnails');
// Set up custom footer widgets
function assignment_one_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area One', 'assignmentone'),
        'id'            => 'footer-widget-area-one',
        'description'   => __('The first footer widget area', 'assignmentone'),
        'before_widget' => '<div class="contact-widget">',
        'after_widget'  => '</div>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Widget Area Two', 'assignmentone'),
        'id'            => 'footer-widget-area-two',
        'description'   => __('The second footer widget area', 'assignmentone'),
        'before_widget' => '<div class="info-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'assignment_one_widgets_init');
// Custom my plugin
function assignment_one_init() {
    $args = array(
        'label'           => 'Assignment One',
        'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'taxonomies'      => array('category'),
        'hierarchical'    => false,
        'query_var'       => true,
        'menu_icon'       => 'dashicons-album',
        'supports'        => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'comments',
            'thumbnail',
            'author',
            'post-formats',
            'page-attributes',
        )
    );
    register_post_type('assignmentOne', $args);
}
add_action('init', 'assignment_one_init');
// Custom my shortcode for custom plugin
function assignment_one_shortcode() {
    $query = new WP_Query(array('post_type' => 'assignmentOne', 'post_per_page' => 8, 'order' => 'asc'));
    while($query -> have_posts()) : $query -> the_post();
    ?>
    <div class="assignment-one-container col-sm-12 col-md-6 col-lg-3">
        <div>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <div>
            <h4><?php the_title(); ?></h4>
            <?php the_content(); ?>
            <!-- <p><a href="<?php the_permalink(); ?>">Learn More</a></p> -->
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php
    endwhile;
    wp_reset_postdata();
}
add_shortcode('assignmentOne', 'assignment_one_shortcode');