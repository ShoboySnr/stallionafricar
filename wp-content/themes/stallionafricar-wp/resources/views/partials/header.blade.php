<header class="banner <?php if(is_front_page()) echo 'absolute'; else echo 'fixed bg-white' ?> w-full py-6 xl:py-3 z-10">
  <div class="relative">
    <div class="container">
      <div class="logo-container flex justify-between z-10 items-center w-full">
        <a class="brand z-10" href="{{ home_url('/') }}">
          <img src="<?= get_theme_mod('theme_logo') ?>" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name', 'display') }}" 
          width="<?= get_theme_mod('logo_width') ?>" />
        </a>
        <nav class="nav-primary hidden lg:block">
          @if(is_singular() && get_post_type() == 'automobile')
            @if (has_nav_menu('autombile_navigation'))
              {!! wp_nav_menu(['theme_location' => 'autombile_navigation', 'menu_class' => 'nav']) !!}
            @endif
          @else
            @if (has_nav_menu('primary_navigation'))
              {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
            @endif
          @endif
        </nav>
        <div class="flex flex-row z-10 lg:hidden">
          <div class="flex items-center justify-center mr-2">
            <a href='#searchform' rel='modal:open'>
              <svg width='24' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>
                <path d='M0.749971 6.58824C0.749971 9.79741 3.41294 12.4265 6.73221 12.4265C10.0515 12.4265 12.7144 9.79741 12.7144 6.58824C12.7144 3.37907 10.0515 0.75 6.73221 0.75C3.41294 0.75 0.749971 3.37907 0.749971 6.58824Z' stroke='black' stroke-width='1.5'/>
                <line y1='-0.75' x2='6.72825' y2='-0.75' transform='matrix(0.714709 0.699422 0.714709 -0.699422 11.541 11.2941)' stroke='black' stroke-width='1.5'/>
              </svg>
            </a>
          </div>
          <div class="menu" id="nav-menu">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <nav class="nav-primary absolute block lg:hidden mobile-nav">
          @if(is_singular() && get_post_type() == 'automobile')
            @if (has_nav_menu('autombile_navigation'))
              {!! wp_nav_menu(['theme_location' => 'autombile_navigation', 'menu_class' => 'nav z-20']) !!}
            @endif
          @else
            @if (has_nav_menu('mobile_navigation'))
              {!! wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav z-20']) !!}
            @endif
          @endif
        </nav>
      </div>
    </div>
  </div>
</header>
