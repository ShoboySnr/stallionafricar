<header class="banner relative z-10">
  <div class="container">
    <div class="logo-container flex justify-between">
      <a class="brand" href="<?php echo e(home_url('/')); ?>">
        <img src="<?= get_theme_mod('theme_logo') ?>" alt="<?php echo e(get_bloginfo('name', 'display')); ?>" title="<?php echo e(get_bloginfo('name', 'display')); ?>" 
        width="<?= get_theme_mod('logo_width') ?>" />
      </a>
      <nav class="nav-primary">
        <?php if(has_nav_menu('primary_navigation')): ?>
          <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']); ?>

        <?php endif; ?>
      </nav>
    </div>
  </div>
</header>
