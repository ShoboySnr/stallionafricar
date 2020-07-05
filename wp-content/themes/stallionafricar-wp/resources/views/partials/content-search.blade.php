<?php
$id = $post->ID;
$engine = get_field('engine', $post->ID);
$engine_unit = get_field('engine_unit', $post->ID);
$transmission = get_field('transmission', $post->ID);
$transmission_unit = get_field('transmission_unit', $post->ID);
$power_rpm = get_field('power_rpm', $post->ID);
$power_horse = get_field('power_horse', $post->ID);
$altText =  get_field('alternative_text', $post->ID);

?>
<div class="w-full lg:w-1/2 mb-10 px-0 lg:px-4">
  <div class="card text-center">
    <div class="card-title">
      <a href="<?= get_permalink(); ?>">
        <h2>{!! get_the_title() !!}</h2>
      </a>
    </div>
    <div class="card-content">
      <?php
        $featured_image = get_the_post_thumbnail_url();

        if($featured_image != '') {
      ?>
      <div class="featured-image">
        <div class="image">
          <a href="<?= get_permalink(); ?>">
            <img src="{!! $featured_image !!}" alt="{!! get_the_title() !!}" title="{!! get_the_title() !!}" />
          </a>
        </div>
      </div>
      <?php } ?>
      @if (get_post_type() === 'automobile')
      <div class="attributes">
      <?php
            if($altText != '') {
        ?>
        <div class="text-center">
            <h3 class="alt-text"><?= $altText; ?></h3>
        </div>
        <?php
        }
        else {
        ?>
        <div class="flex justify-center w-full">
          <p class="mx-4"><strong><?= $engine; ?></strong><sub><?= $engine_unit; ?></sub><br />
            <span>Engine</span>
          </p>
          <p class="mx-4"><strong><?= $transmission; ?></strong><sub>-<?= $transmission_unit; ?></sub><br />
            <span>Transmission</span>
          </p>
          <p class="mx-4"><strong><?= $power_horse; ?></strong><sub>kw@</sub><strong><?= $power_rpm; ?></strong><sub>rpm</sub><br />
            <span>Power</span>
          </p>
        </div>
        <?php } ?>
      </div>
      @else
        @php the_excerpt() @endphp
      @endif
    </div>
    @if (get_post_type() === 'automobile')
    <div class="card-action">
      <div class="flex justify-center lg:justify-between w-full flex-wrap">
        <a href="#buyform<?= $id; ?>" rel="modal:open" class="btn fadeTransistion" title="Buy Now">Buy Now</a>
        <a href="<?= get_permalink($post->ID); ?>" class="btn" title="Overview">Overview</a>
      </div>
    </div>
    <div id="buyform<?= $id; ?>" class="modal">
      <div class="buyform-container">
        <div class="title">
          <h3>Request a Quote</h3>
        </div>
          <div class="content">
            <?= do_shortcode(get_field('contact_form', $post->ID)); ?>
          </div>
      </div>
    </div>
    @endif
  </div>
</div>