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

    //toggle video and image 
    // $('#toggle-image-video .image').click(function(event) {
    //   event.preventDefault();
    //   $(this).hide();
    //   $(this).parent().find('.video').show();
    // });

    //toggle mobile nav menu 
    // $('.menu-item-has-children a').click(function(event) {
    //   event.preventDefault();
    //   alert('hello');
    //   $(this).siblings('.sub-menu').slideToggle();
    // })

    //toggle menu header 
    $(function() {
      $('#nav-menu').click(function() {
        if ($('.mobile-nav').hasClass('hide-menu')) {
          $('.mobile-nav').removeClass('show-menu').removeClass('hide-menu');
          $('.mobile-nav').removeClass('animated slideInLeft').addClass('slideOutLeft');
        } else {
          $('.mobile-nav').addClass('show-menu').addClass('hide-menu');
          $('.mobile-nav').addClass('animated slideOutLeft').addClass('slideInLeft');
        }
        $(this).toggleClass('open');
      });
    
      // $('#nav-menu').click(function() {
      //   if ($('.mobile-nav').hasClass('show-menu')) {
      //     $('.mobile-nav').removeClass('show-menu animated slideInLeft');
      //     $(this).toggleClass('open');
      //   }
      //   $(this).addClass('slideOutLeft hide-menu');
      // });
    
      $(document).keyup(function(e) {
        if (e.keyCode == 27) {
          if ($('.mobile-nav').hasClass('show-menu')) {
            $('#nav-menu').toggleClass('open');
          }
          $('.mobile-nav').addClass('slideOutLeft hide-menu');
        }
      });
    });

    //smoth scroll
    $(document).on('click', 'a[href^="#"]', function (event) {
      event.preventDefault();
        $('html,body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top,
        }, 500);
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

    $('.automobile-view-container .owl-carousel').owlCarousel({
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
        '<svg height="45px" viewBox="0 0 512 512" class="arrow-prev" width="45px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm104.285156 216-138.285156-138.285156-28.285156 28.285156 110 110-110 110 28.285156 28.285156zm0 0"/></svg>',
        '<svg height="45px" viewBox="0 0 512 512" width="45px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm104.285156 216-138.285156-138.285156-28.285156 28.285156 110 110-110 110 28.285156 28.285156zm0 0"/></svg>',
      ],
    });
  },
};
