{{--
  Template Name: Service Center Template
--}}

<?php 
$service_centers = get_categories(['taxonomy' => 'service_center_categories', 'hide_empty' => false]);
?>

@extends('layouts.app')

@section('content')
  <section class="service-center-bg">
    <div class="container">
      <div class="flex justify-start w-full flex-wrap -mx-4">
        <?php 
          foreach($service_centers as $service_center) {
            $id = $service_center->term_id;
            $name = $service_center->name;
        ?>
        <div class="w-full lg:w-1/2 mb-10 px-4">
          <div class="card text-center">
            <div class="card-title">
              <a href="<?= get_category_link($id); ?>" title="Changan Service Center">
                <h2><?= $name; ?></h2>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
@endsection
