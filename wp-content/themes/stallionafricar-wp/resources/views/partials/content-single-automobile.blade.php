<?php 
$categories = get_the_terms($post->ID, 'automobile_category');
$rx_price = get_field('rx_price', $post->ID);
?>
<section id="automobile-single">
    <div class="container">
        <div class="automobile-description">
            <div class="flex justify-start w-full items-start mx-0 xl:-mx-4 flex-wrap">
                <div class="w-full xl:w-2/3 px-0 xl:px-4">
                    <div id="toggle-image-video" class="py-5">
                        <div class="image cursor-pointer">
                            <img src="<?= get_field('main_image', $post->ID) ?>" alt="<?= $post->post_title ?>" onclick="showVideo('<?= get_field('youtube_url', $post->ID) ?>')" />
                        </div>
                        <div class="video" style="display: none;">
                        </div>
                    </div>
                    <div class="subtext">
                        <p>Click the above image to watch the video</p>
                    </div>
                    <div class="automobile-engine">
                        <?php 
                            $altText = get_field('alternative_text', $post->ID);
                            if($altText != '') {
                        ?>
                        <div class="text-center">
                            <h3 class="alt-text"><?= $altText; ?></h3>
                        </div>
                        <?php

                            }
                            else {
                        ?>
                        <div class="flex">
                            <div class="w-full lg:w-1/3 text-center attributes">
                                <p><strong><?= get_field('engine', $post); ?></strong><sub><?= get_field('engine_unit', $post); ?></sub>
                                    <br />
                                    Engine </p>
                            </div>
                            <div class="w-full lg:w-1/3 attributes text-center">
                                <p><strong><?= get_field('transmission', $post); ?></strong><sub>-<?= get_field('transmission_unit', $post); ?></sub>
                                    <br />
                                    Transmission </p>
                            </div>
                            <div class="w-full lg:w-1/3 attributes text-center">
                                <p><strong><?= get_field('power_horse', $post); ?></strong><sub>kw@</sub><strong><?= get_field('power_rpm', $post); ?></strong><sub>rpm</sub>
                                    <br />
                                    Power </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="w-full xl:w-1/3 px-0 xl:px-4">
                    <div class="flex justify-center items-center flex-col">
                        <div class="auto-title">
                            <p><?= $post->post_title ?> | <a href="<?= get_category_link($categories[0]->term_id) ?>" title="Other Models">Other <?= $categories[0]->name; ?> Models </a></p>
                        </div> 
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#specification" rel="modal:open">Specification</a>
                        </div>
                        <?php
                            $price = get_field('price', $post);
                            if($price != '') {
                        ?>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="javascript:void(0);">Purchase Price <?php if($rx_price != '') echo '(LX)'; ?>: <?= get_theme_mod('currency') ?><?= number_format(get_field('price', $post)) ?></a>
                        </div>
                        <?php
                        }
                            if($rx_price != '') {
                        ?>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="javascript:void(0);">Purchase Price (RX): <?= get_theme_mod('currency') ?><?= number_format(get_field('rx_price', $post)) ?></a>
                        </div>
                        <?php } ?>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#buyform" rel="modal:open">Request for Quote</a>
                        </div>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#bookRideform"rel="modal:open">Book a Test Drive</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="exterior" class="automobile-view w-screen h-auto xl:h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col owl-carousel">
            <?php 
                $exterior = acf_photo_gallery('exterior', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section id="interior" class="automobile-view w-screen h-auto xl:h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col owl-carousel">
            <?php 
                $exterior = acf_photo_gallery('interior', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section id="top_view" class="automobile-view w-screen h-auto xl:h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col owl-carousel">
            <?php 
                $exterior = acf_photo_gallery('top_view', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section id="side_view" class="automobile-view w-screen h-auto xl:h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col owl-carousel">
            <?php 
                $exterior = acf_photo_gallery('side_view', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<div id="buyform" class="modal">
    <div class="buyform-container">
      <div class="title">
        <h3>Request a Quote</h3>
      </div>
        <div class="content text-center">
          <?= do_shortcode(get_field('contact_form', $post->ID)); ?>
        </div>
    </div>
  </div>

  <div id="bookRideform" class="modal">
    <div class="buyform-container">
      <div class="title">
        <h3>Request for Test Drive</h3>
      </div>
        <div class="content text-center">
          <?= do_shortcode(get_field('test_drive_contact', $post->ID)); ?>
        </div>
    </div>
  </div>

  <div id="specification" class="modal">
    <div class="buyform-container">
      <div class="title">
        <h3>Specifications</h3>
      </div>
        <div class="text-left content">
          <?= the_content(); ?>
        </div>
    </div>
  </div>
