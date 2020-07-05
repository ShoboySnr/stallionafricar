{{--
  Template Name: AutoMobile Template
--}}

<?php 
//get the parameters
$auto = isset($_GET['auto']) ? $_GET['auto'] : '';
$model = isset($_GET['model']) ? $_GET['model'] : '';
$year_manufacture = isset($_GET['year_of_manufacture']) ? $_GET['year_of_manufacture'] : '';
$grade = isset($_GET['grade']) ? $_GET['grade'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$trans = isset($_GET['transmission']) ? $_GET['transmission'] : '';

$filterData = [
  'model' => $model,
  'year_of_manufacture' => $year_manufacture,
  'grade' => $grade,
  'price' => $price,
  'transmission' => $trans
];


$page = isset($_GET['page']) ? $_GET['page'] : 1;

$categories = get_categories(['taxonomy' => 'automobile_category', 'hide_empty' => false]);

if ($auto != '') {
  $automobiles = App::getSearchAutomobiles($page, $auto);
}
else $automobiles = App::getAutomobiles($page, $filterData);

$years = App::groupByYear();

$transmissions = App::groupByTransmission();


?>
@extends('layouts.app')

@section('content')
  <div class="automobile-category">
    <div class="container">
      <div class="automobile-filter">
        <div class="flex justify-center items-center flex-col w-full text-left">
          <div class="w-full">
            <hr />
            <div class="search-cars py-4 flex justify-center items-center -mx-4 flex-wrap">
              <p class="ml-2 mr-6 mb-4 lg:mb-0">Find cars by: </p>
              <select name="model" id="model" class="mx-4 mb-4 lg:mb-0" onchange="filterAutomobile()">
                <option value="">Model</option>
                <?php 
                  foreach ($categories as $category) {
                    $term_id = $category->term_id;
                    $name = $category->name;
                ?>
                <option value="<?= $term_id; ?>" <?php if($model == $term_id) echo 'selected'; ?>><?= $name; ?></option>

                <?php } ?>
              </select>
              <select name="year_of_manufacture" id="year_of_manufacture" class="mx-4 mb-4 lg:mb-0" onchange="filterAutomobile()">
                <option value="">Year</option>
                <?php 
                  foreach ($years as $year) {
                    $id = $year['id'];
                    $year_of_manufacture = $year['year_of_manufacture'];
                ?>
                <option value="<?= $year_of_manufacture; ?>"  <?php if($year_of_manufacture == $year_manufacture) echo 'selected'; ?>><?= $year_of_manufacture; ?></option>

                <?php } ?>
              </select>
              <select name="grade" id="grade" class="mx-4 mb-4 lg:mb-0" onchange="filterAutomobile()">
                <option value="">Grade</option>
                <?php 
                  $grades = [1,2,3,4,5];
                  foreach ($grades as $value) {
                ?>
                <option value="<?= $value ?>"  <?php if($grade == $value) echo 'selected'; ?>><?= $value; ?></option>

                <?php } ?>
              </select>
              <select name="price" id="price" class="mx-4 mb-4 lg:mb-0" onchange="filterAutomobile()">
                <option value="">Price</option>
                <option value="ASC" <?php if($price == 'ASC') echo 'selected'; ?>>Lowest to Highest</option>
                <option value="DESC" <?php if($price == 'DESC') echo 'selected'; ?>>Highest to Lowest</option>
              </select>
              <select name="transmission" id="transmission" class="mx-4 mb-4 lg:mb-0" onchange="filterAutomobile()">
                <option value="">Transmission</option>
                <?php 
                  foreach ($transmissions as $transmission) {
                    $id = $transmission['id'];
                    $value = $transmission['transmission'];
                    $unit = $transmission['transmission_unit'];
                ?>
                <option value="<?= $id ?>" <?php if($trans == $id) echo 'selected'; ?>><?= $value.' - '.$unit; ?></option>

                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-start w-full flex-wrap mx-0 lg:-mx-4">
        <?php 

          if($automobiles) {
            foreach($automobiles as $automobile) {
              $engine = get_field('engine', $automobile->ID);
              $engine_unit = get_field('engine_unit', $automobile->ID);
              $transmission = get_field('transmission', $automobile->ID);
              $transmission_unit = get_field('transmission_unit', $automobile->ID);
              $power_rpm = get_field('power_rpm', $automobile->ID);
              $power_horse = get_field('power_horse', $automobile->ID);
        ?>
        <div class="w-full lg:w-1/2 mb-10 px-0 lg:px-4">
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
                  <p class="mx-4"><strong>73</strong><sub>kw@</sub><strong>600</strong><sub>rpm</sub><br />
                    <span>Power</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="card-action">
              <div class="flex justify-center lg:justify-between w-full flex-wrap">
                <button type="button" class="btn" title="Buy Now">Buy Now</button>
                <a href="<?= get_permalink($automobile->ID); ?>" class="btn" title="Overview">Overview</a>
              </div>
            </div>
          </div>
        </div>
        <?php 
            }
          }
          else {
        ?>
        <div class="text-center w-full">
          <h3>No Automobile Found </h3>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript">

  function filterAutomobile() {
    const model = document.getElementById('model').value;
    const year = document.getElementById('year_of_manufacture').value;
    const grade = document.getElementById('grade').value;
    const price = document.getElementById('price').value;
    const transmission = document.getElementById('transmission').value;
    document.location.href = '?model='+model+'&year_of_manufacture='+year+'&grade='+grade+'&price='+price+'&transmission='+transmission;
  }
</script>
@endsection