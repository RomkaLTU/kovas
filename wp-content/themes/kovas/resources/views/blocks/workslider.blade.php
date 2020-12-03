{{--
  Title: Work slider
  Category: common
  Icon: schedule
  Mode: edit
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
$title = get_field('title');
@endphp

<section class="fullwidth bg-brand-2 text-white py-23px lg:py-52px">
  <div class="section-gallery">
    @if($title)
      <div class="text-center font-bold uppercase text-white text-20px lg:text-26px">{{ $title }}</div>
    @endif
    <div class="container my-5 lg:my-10">
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-container">
      <div class="swiper-wrapper text-white">
        @foreach(App::work_cats() as $key => $wc)
          <div class="swiper-slide bg-cover bg-center min-h-476px">
            <div class="container swiper-slide-inner h-full">
              <div id="gallery_slide_{{ $key }}" data-slidename="{{ $wc->name }}" class="swiper-slide-content flex flex-wrap h-full px-4">
                @foreach(App::works($wc->slug) as $work)
                  <div class="w-full md:w-1/2 lg:w-1/3 min-h-237px bg-cover bg-center" style="background-image: url({{ get_the_post_thumbnail_url($work, 'work-gallery') }})">
                    <div class="slide-action-block h-full border border-black-1 relative">
                      <div class="slide-action-block-inner opacity-0">
                        <h3 class="uppercase text-16px font-bold mb-2 z-10">{{ $work->post_title }}</h3>
                        <a href="{{ get_permalink($work) }}" class="block max-w-170px mx-auto text-14px uppercase font-bold bg-brand-1 py-10px px-20px z-10">{{ __('SUŽINOTI DAUGIAU','ko') }}</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="container swiper-navigation-container hidden lg:block">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
</section>
