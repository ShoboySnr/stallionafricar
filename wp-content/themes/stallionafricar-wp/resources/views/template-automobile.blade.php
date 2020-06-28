{{--
  Template Name: AutoMobile Template
--}}

<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$categories = get_categories(['taxonomy' => 'automobile_category', 'hide_empty' => false]);

$automobiles = App::getAutomobiles($page);

$years = App::groupByYear();

// var_dump($years);


?>
@extends('layouts.app')

@section('content')
  <div class="automobile-category">
    <div class="container">
      <div class="automobile-filter">
        <div class="flex justify-center items-center flex-col w-full text-left">
          <div class="w-full">
            <hr />
            <div class="search-cars py-4 flex justify-center items-center -mx-4">
              <p class="ml-2 mr-6 mb-0">Find cars by: </p>
              <select name="brand" class="mx-4">
                <option value="">Model</option>
                <?php 
                  foreach ($categories as $category) {
                    $term_id = $category->term_id;
                    $name = $category->name;
                ?>
                <option value="<?= get_category_link($term_id); ?>"><?= $name; ?></option>

                <?php } ?>
              </select>
              <select name="year" class="mx-4">
                <option value="">Year</option>
                <?php 
                  foreach ($categories as $category) {
                    $term_id = $category->term_id;
                    $name = $category->name;
                ?>
                <option value="<?= get_category_link($term_id); ?>"><?= $name; ?></option>

                <?php } ?>
              </select>
              <select name="grade" class="mx-4">
                <option value="">Grade</option>
                <?php 
                  foreach ($categories as $category) {
                    $term_id = $category->term_id;
                    $name = $category->name;
                ?>
                <option value="<?= get_category_link($term_id); ?>"><?= $name; ?></option>

                <?php } ?>
              </select>
              <select name="price" class="mx-4">
                <option value="">Price</option>
                <option value="ASC">Ascending</option>
                <option value="DESC">Decending</option>
              </select>
              <select name="grade" class="mx-4">
                <option value="">Transmission</option>
                <?php 
                  foreach ($categories as $category) {
                    $term_id = $category->term_id;
                    $name = $category->name;
                ?>
                <option value="<?= get_category_link($term_id); ?>"><?= $name; ?></option>

                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-start w-full flex-wrap -mx-4">
        <?php 

          foreach($automobiles as $automobile) {
        ?>
        <div class="w-full lg:w-1/2 mb-10 px-4">
          <div class="card text-center">
            <div class="card-title">
              <h2><?= $automobile->post_title ?></h2>
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
                  <p class="mx-4"><strong>1.5</strong><sub>L</sub><br />
                    <span>Engine</span>
                  </p>
                  <p class="mx-4"><strong>4</strong><sub>-Speed AT</sub><br />
                    <span>Transmission</span>
                  </p>
                  <p class="mx-4"><strong>73</strong><sub>kw@</sub><strong>600</strong><sub>rpm</sub><br />
                    <span>Power</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="card-action">
              <div class="flex justify-between w-full">
                <button type="button" class="btn" title="Buy Now">Buy Now</button>
                <a href="#" class="btn" title="Overview">Overview</a>
              </div>
            </div>
          </div>
        </div>
        <?php 
          }
        ?>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript">

  function filterAutomobile($model, $year, $grade, $price, $transmission) {

  }
</script>
@endsection