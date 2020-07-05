<div id="customPage">
  <div class="custom-page-container">
    <div class="featured-image">
      <img src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="<?= $post->post_name; ?>" title="<?= $post->post_name; ?>" />
    </div>
    <div class="container relative">
      <div class="content">
        @php the_content() @endphp
      </div>
    </div>
  </div>
</div>