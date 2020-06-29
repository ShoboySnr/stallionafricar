<header class="banner relative z-10">
  <div class="container">
    <div class="logo-container flex justify-between items-center">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="<?= get_theme_mod('theme_logo') ?>" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name', 'display') }}" 
        width="<?= get_theme_mod('logo_width') ?>" />
      </a>
      <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
    </div>
  </div>
</header>
