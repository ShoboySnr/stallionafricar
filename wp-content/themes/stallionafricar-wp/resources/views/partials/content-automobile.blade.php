<?php

$thisCat = get_queried_object();
$automobiles = App::getCustomCategory($thisCat->term_id, 'automobile', $thisCat->taxonomy);

?>
<div class="automobile-category">
  <div class="container">
    <div class="flex justify-start w-full flex-wrap -mx-4">
      <?php 
        $count = 0;
        foreach($automobiles as $automobile) {
          $engine = get_field('engine', $automobile->ID);
          $engine_unit = get_field('engine_unit', $automobile->ID);
          $transmission = get_field('transmission', $automobile->ID);
          $transmission_unit = get_field('transmission_unit', $automobile->ID);
          $power_rpm = get_field('power_rpm', $automobile->ID);
          $power_horse = get_field('power_horse', $automobile->ID);
          $count++;
      ?>
      <div class="w-full lg:w-1/2 mb-10 px-4">
        <div class="card text-center">
          <div class="card-title">
            <a href="<?= get_permalink($automobile->ID); ?>">
              <h2><?= $automobile->post_title ?></h2>
            </a>
          </div>
          <div class="card-content">
            <div class="featured-image">
              <div class="image owl-carousel">
                <?php 

                $galleries = acf_photo_gallery('gallery', $automobile->ID);
                if(count($galleries) ):
                  foreach($galleries as $gallery):
                  // var_dump($gallery);
                    $id = $gallery['id'];
                    $title = $gallery['title'];
                    $full_image_url = $gallery['full_image_url'];
                    $full_image_url = acf_photo_gallery_resize_image($full_image_url, 700, 400);
                ?>
                <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
              <?php endforeach; endif; ?>
              </div>
            </div>
            <div class="attributes">
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
            </div>
          </div>
          <div class="card-action">
            <div class="flex justify-between w-full">
              <a href="#buyform<?= $count; ?>" rel="modal:open" class="btn fadeTransistion" title="Buy Now">Buy Now</a>
              <a href="<?= get_permalink($automobile->ID); ?>" class="btn" title="Overview">Overview</a>
            </div>
          </div>
          <div id="buyform<?= $count; ?>" class="modal">
            <div class="buyform-container">
              <div class="title">
                <h3>Request a Quote</h3>
              </div>
                <div class="content">
                  <?= do_shortcode(get_field('contact_form', $automobile->ID)); ?>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>