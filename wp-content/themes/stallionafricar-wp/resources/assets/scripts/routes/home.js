export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $('#home-slider .owl-carousel').owlCarousel({
      center: false,
      autoplay: true,
      dots: true,
      animateOut: 'fadeOut',
      loop: true,
      nav: true,
      responsiveClass:true,
      smartSpeed: 500,
      items: 1,
      navText: [
        '<svg class="arr-img prev" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.7166 0L12 2.35L4.583 10L12 17.65L9.7166 20L0 10L9.7166 0Z" fill="black" /></svg>',
        '<svg class="arr-img next" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.2834 0L0 2.35L7.417 10L0 17.65L2.2834 20L12 10L2.2834 0Z" fill="black" /></svg>',
      ],
    });
  },
};
