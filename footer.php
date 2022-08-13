<footer>
    <div>
      <h4><?php bloginfo('name') ?></h4>
    </div>
    <div>
      <?php
        dynamic_sidebar('footer-paragraph');
      ?>
    </div>
    <nav class="nav-list">
      <?php            
        wp_nav_menu(
            array(
                'menu' => 'First Footer Menu',
                'theme_location' => 'footerone',
            )
        );
      ?>
    </nav>
    <nav class="nav-list">
      <?php            
        wp_nav_menu(
            array(
                'menu' => 'Second Footer Menu',
                'theme_location' => 'footertwo',
            )
        );
      ?>
    </nav>
</footer>

    
<?php wp_footer(); ?>
</body>
</html>