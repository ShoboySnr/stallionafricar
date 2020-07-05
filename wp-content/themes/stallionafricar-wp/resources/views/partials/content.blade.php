{{-- <article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article> --}}
<?php 
$posts = App::getPosts();
?>
<div id="blog">
  <div class="container">
    <div class="pb-10">
      <div class="page-header">
        <h1>{!! App::title() !!}</h1>
      </div>
    </div>
    <div class="flex justify-start flex-wrap">
      <?php 
        foreach ($posts as $post) {
      ?>
      <div class="w-full lg:w-1/2 mb-10 px-0 lg:px-4">
        <div class="card text-center">
          <div class="card-title">
            <a href="<?= get_permalink($post->ID); ?>">
              <h2>{!! $post->post_name !!}</h2>
            </a>
          </div>
          <div class="card-content">
            <?php
              $featured_image = get_the_post_thumbnail_url($post->ID);

              if($featured_image != '') {
            ?>
            <div class="featured-image">
              <div class="image">
                <a href="<?= get_permalink(); ?>">
                  <img src="{!! $featured_image !!}" alt="{!! $post->post_name  !!}" title="{!! $post->post_name !!}" />
                </a>
              </div>
            </div>
            <?php } ?>
            <div class="content font-sm">
              <p class="font-sm excerpt">{!! get_the_excerpt($post->ID) !!}</p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</div>