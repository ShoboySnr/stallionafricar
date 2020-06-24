<?php $__env->startSection('content'); ?>
<section id="home-slider" class="relative">
  <div class="home-bg w-screen">
    <div class="owl-carousel w-full h-full">
      <div class="w-full h-full" style="background-image: url('https://www.stallionafricar.com/wp-content/uploads/2020/06/nissan-Patrol-stallion-africar.jpg');">
        <div class="container h-full">
          <div class="flex justify-center items-center h-full w-full">
            <div class="action-group flex -mx-6">
              <a href="" class="button-white-bg bg-white text-black mx-6">Nissan Patrol</a>
              <a href="" class="button-transparent-bg bg-transparent text-black mx-6">Other Model</a>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full h-full" style="background-image: url('https://www.stallionafricar.com/wp-content/uploads/2020/06/honda-hrv-stallion-africar-1024x464-1.jpg');">
        <div class="container h-full">
          <div class="flex justify-center items-center h-full w-full">
            <div class="action-group flex -mx-6">
              <a href="" class="button-white-bg bg-white text-black mx-6">Honda HRV</a>
              <a href="" class="button-transparent-bg bg-transparent text-black mx-6">Other Model</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>