export default {
  init() {
    // JavaScript to be fired on all pages
    //show sub menu when hover on
    $('#menu-primary-menu .menu-item-has-children').hover(function(event) {
      $(this).find('.sub-menu').toggle(400);
      event.preventDefault();
    });

    //toggle service center on click on
    $('.accordion-item .accordion-heading').click(function(event) {
      // console.log($(this).parent().find('.active'));
      $(this).siblings('.accordion-content').slideToggle();
      $(this).parent().addClass('active');
      $(this).find('.toggle-icon .plus').toggle();
      $(this).find('.toggle-icon .minus').toggle();
      event.preventDefault();
    });

    $('a[class="fadeTransistion"]').click(function(event) {
      event.preventDefault();
      $(this).modal({
        fadeDuration: 250,
      });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.featured-image .owl-carousel').owlCarousel({
      center: true,
      autoplay: true,
      dots: true,
      animateOut: 'fadeOut',
      loop: true,
      nav: true,
      responsiveClass:true,
      smartSpeed: 1000,
      items: 1,
      navText: [
        '<svg height="24px" viewBox="0 0 512 512" class="arrow-prev" width="24px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm104.285156 216-138.285156-138.285156-28.285156 28.285156 110 110-110 110 28.285156 28.285156zm0 0"/></svg>',
        '<svg height="24px" viewBox="0 0 512 512" width="24px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm104.285156 216-138.285156-138.285156-28.285156 28.285156 110 110-110 110 28.285156 28.285156zm0 0"/></svg>',
      ],
    });
  },
};
