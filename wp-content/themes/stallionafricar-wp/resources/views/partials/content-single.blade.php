{{-- <article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article> --}}

<div id="customPage">
  <div class="custom-page-container">
    <div class="featured-image">
      <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= $post->post_name; ?>" title="<?= $post->post_name; ?>" />
    </div>
    <div class="container relative">
      <div class="title py-10 text-center">
        <h1 class="font-xxl">{!! get_the_title() !!}</h1>
      </div>
      <div class="content">
        @php the_content() @endphp
      </div>
    </div>
  </div>
</div>