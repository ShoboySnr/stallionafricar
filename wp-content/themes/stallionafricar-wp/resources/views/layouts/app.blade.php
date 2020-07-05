<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>

    <div id="searchform" class="modal" style="margin-top: 0;display: none;">
      <div class="search-container">
        <div class="title text-center">
          <h3>Search for Automobiles </h3>
        </div>
          <div class="content">
            <form method="GET" action="<?= get_permalink(get_page_by_path('buy-new-cars')) ?>" class="search-form">
              <div class="search-content w-full">
                <input type="text" class="form-control w-full" name="auto" value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>" placeholder="What are you looking for? e.g Honda HR and press enter key" />
              </div>
            </form>
          </div>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')

    // <a class="top-link hide" href="" id="js-top">
    //   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6"><path d="M12 6H0l6-6z"/></svg>
    //   <span class="screen-reader-text">Back to top</span>
    // </a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    @yield('scripts')
    @php wp_footer() @endphp
    <script src="<?= get_template_directory_uri() ?>/assets/owlcarousel/owl.carousel.js"></script>
  </body>
</html>
