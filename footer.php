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

<!-- search overlay -->

<div class="search-overlay">
    <div class="search-overlay__top">
      <div class="container">
        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
        <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
      </div>
    </div>
  </div>

    
<?php wp_footer(); ?>
</body>
</html>