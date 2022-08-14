<?php 

if ( ! is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
}



get_header(); ?>

<main id="main" class="container">
    <?php themePageBanner(); ?>
    <ul id="mynotes-list">
        <?php
            $userNotes = new WP_Query(array(
                'post_type' => 'note',
                'posts_per_page' => -1,
                'author' => get_current_user_id()
            ));

            while($userNotes->have_posts()) {
                $userNotes->the_post(); ?>
                <li>
                    <input class="note-title" value="<?php echo esc_attr(the_title()); ?>" />
                    <span class="note-edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span>
                    <span class="note-delete"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span>
                    <textarea class="note-text"><?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?></textarea>
                    <br><br>
                </li>
            <?php
            }


        ?>

    </ul>
</main>


<?php get_footer(); ?>