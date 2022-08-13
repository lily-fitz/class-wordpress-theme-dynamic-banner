<?php


function mytheme_styles() {

    $version = wp_get_theme() -> get('Version');

    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('google-fonts'), $version, 'all');

    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,600,700,700i|Roboto:100,300,400,400i,700,700i');

    wp_enqueue_style( 'dashicons' );
}

add_action('wp_enqueue_scripts', 'mytheme_styles');




function mytheme_scripts() {

    $version = wp_get_theme() -> get('Version');

    wp_enqueue_script('theme-script', get_theme_file_uri('script.js'), array('jquery'), $version, true);
}

add_action('wp_enqueue_scripts', 'mytheme_scripts');




function mytheme_menus() {

    $locations = array(
        'primary' => 'Primary Menu',
        'footerone' => 'First Footer Menu',
        'footertwo' => 'Second Footer Menu'
    );

    register_nav_menus($locations);
}

add_action('init', 'mytheme_menus');




function mytheme_features () {

    // $logoSpecs = array(
    //     'height'               => 32,
    //     'width'                => 32
    // );

    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_image_size('themeLandscape', 400, 260, array('left', 'top'));
    add_image_size('themePortrait', 300, 460, true);
    add_image_size('themePageBanner', 1000, 350, array('center', 'center'));
}

add_action('after_setup_theme', 'mytheme_features');




function mytheme_widgetareas() {
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'name' => 'Footer Paragraph',
            'id' => 'footer-paragraph',
            'description' => 'Footer Paragraph',
            'class' => 'footer-paragraph',
        )
    );
}

add_action('widgets_init', 'mytheme_widgetareas');




function themePageBanner($args = NULL) {
    
    if(!$args['title']) {
        $args['title'] = get_the_title();
    }
    if(!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    ?>
    <div class="page-banner">
        <h1><?php echo $args['title'] ?></h1>
        <p class="page-banner-subtitle"><?php echo $args['subtitle'] ?></p>
    </div>

<?php
}




function mytheme_adjust_queries($query) {

    if (!is_admin() AND is_home() AND $query->is_main_query()) {
        $query->set('posts_per_page', 2);
    }

    if (!is_admin() AND is_post_type_archive('speakers') AND $query->is_main_query()) {
        $query->set('order_by', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            )
        ));
    }
}

add_action('pre_get_posts', 'mytheme_adjust_queries');


add_filter( 'get_comment_author_link', 'remove_comment_author_link', 10, 3 );
function remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}

// Remove comment time
function wpb_remove_comment_time($date, $d, $comment) { 
    if ( !is_admin() ) {
            return;
    } else { 
            return $date;
    }
}
add_filter( 'get_comment_time', 'wpb_remove_comment_time', 10, 3);


// Remove comment date
// function wpb_remove_comment_date($date, $d, $comment) { 
//     if ( !is_admin() ) {
//         return;
//     } else { 
//         return $date;
//     }
// }
// add_filter( 'get_comment_date', 'wpb_remove_comment_date', 10, 3);
 

