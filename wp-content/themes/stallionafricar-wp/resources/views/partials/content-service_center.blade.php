<?php

$thisCat = get_queried_object();
$getPosts = App::getCustomCategory($thisCat->term_id, 'service_center', $thisCat->taxonomy);

?>

<section class="service-center-category">
  <div class="container">
    <div class="service-center-category-bg">
      <div class="flex w-full lg:w-2/3">
        <div id="accordion-bg">
          <?php 
            foreach($getPosts as $getPost) {

          ?>
          <div class="accordion-item">
            <div class="accordion-heading flex justify-between cursor-pointer">
              <p><?= $getPost->post_title; ?></p>
              <p class="toggle-icon"><span class='plus'>+</span>
                <span class='minus' style="display: none;">-</span></p>
            </div>
            <div class="accordion-content" style="display: none">
              <?= $getPost->post_content; ?>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>