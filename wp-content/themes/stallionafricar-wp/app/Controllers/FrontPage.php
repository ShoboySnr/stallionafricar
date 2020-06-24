<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  public function getCars() {
    $cars = get_posts([
      'post_type' => 'cars',
    ]);

    return $cars;
  }

  public function getFeaturedCars() {
    
  }
}
