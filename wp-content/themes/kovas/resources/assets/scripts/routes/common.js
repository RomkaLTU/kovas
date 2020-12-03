import '../jquery.lazyload-gmap'
import stickyHeader from '../modules/sticky-header.js'

export default {
  init() {
    const $map = $('#map');
    const $mobile_menu_trigger = $('#mobile_menu_trigger');
    const $contact_form_trigger = $('.contact_form_trigger');

    stickyHeader();

    $('.scrollto').find('a').click(function( event ) {
      if ($('#galerija').length) {
        event.preventDefault();
        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top }, 500);
      } else {
        location.href = `${app.site_url}/#galerija`;
      }
    });

    $mobile_menu_trigger.click(function(){
      $(this).toggleClass('menu-open');
    });

    $contact_form_trigger.on('click', function(e) {
      e.preventDefault();

      $('.section-contactform').toggleClass('hidden');
    });

    new Swiper('.section-swiper .swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    new Swiper('.section-gallery .swiper-container', {
      simulateTouch: false,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          const slide_name = $(`#gallery_slide_${index}`).data('slidename');
          return `<a href="javascript:" class="block ${className}">${slide_name}</a>`;
        },
      },
    });

    if ( $map.length ) {
      $map.lazyLoadGoogleMaps(
        {
          key: app.goog_api_key,
          callback: function( container, map )
          {
            let $container  = $( container ),
              marker      = new google.maps.LatLng( $container.attr( 'data-lat' ), $container.attr( 'data-lng' ) ),
              center      = new google.maps.LatLng( $container.attr( 'data-lat' ), $container.attr( 'data-lng' ) );

            map.setOptions({
              zoom: 15,
              center: center,
            });

            new google.maps.Marker({
              position: marker,
              icon: require('../../images/marker.png'),
              map: map,
            });
          },
        });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
