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
        '<svg height="43px" viewBox="0 0 512 512" width="43px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm104.285156 216-138.285156-138.285156-28.285156 28.285156 110 110-110 110 28.285156 28.285156zm0 0"/></svg>',
      ],
    });
  },
};
