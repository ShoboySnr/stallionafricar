{{--
  Template Name: Home Template
--}}

@extends('layouts.app')

@section('content')
<?php $homesliders = App::homeSlider(); ?>
<section id="home-slider" class="relative">
  <div class="home-bg w-screen">
    <div class="owl-carousel w-full h-full">
      <?php 
        foreach($homesliders as $slider) {
          $id = $slider->ID;
          $categories = get_the_terms($id, 'automobile_category');
      ?>
      <div class="w-full h-full bg-slider" style="background-image: url('<?= get_the_post_thumbnail_url($id) ?>');">
        <div class="container h-full">
          <div class="flex action-group justify-center items-start h-full w-full">
            <div class="flex -mx-6 flex-col md:flex-row">
              <a href="<?= get_permalink($id) ?>" class="button-white-bg bg-white text-black mx-6"><?= $slider->post_title ?></a>
              <a href="<?= get_category_link($categories[0]->term_id) ?>" class="button-transparent-bg text-white mx-6">Other Model</a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

@endsection