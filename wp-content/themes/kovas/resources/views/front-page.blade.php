@extends('layouts.app')

@section('content')
  @if( have_rows('slides') )
    <div class="section-swiper">
      <div class="swiper-container">
        <div class="swiper-wrapper text-white">
          @while( have_rows('slides') )
            @php
              the_row();
              $cta = get_sub_field('link');
            @endphp
            <div class="swiper-slide bg-no-repeat bg-cover bg-center" style="background-image: url({{ wp_get_attachment_image_url( get_sub_field('image'), 'large' ) }})">
              <div class="container swiper-slide-inner">
                @if( $text = get_sub_field('text') )
                  <div class="swiper-slide-content">
                    <h2>{{ get_sub_field('text') }}</h2>
                    @if($cta)
                      <a href="{{ $cta['url'] }}" target="{{ $cta['target'] }}" class="bg-transparent bg-brand-1 hover:bg-brand-1-hover transition text-18px border-2 border-white mt-6 px-6 py-1 inline-block">
                        {{ $cta['title'] }}
                      </a>
                    @endif
                  </div>
                @endif
              </div>
            </div>
          @endwhile
        </div>
        <div class="container swiper-navigation-container">
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  @endif
  @include('partials.section-cta')
  @if( $works_short = get_field('works_short') )
    <div class="section-work-short px-4 xl:px-0 py-8">
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          @foreach($works_short as $ws)
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4">
              <a href="{{ get_permalink($ws) }}">
                {!! get_the_post_thumbnail($ws, 'work') !!}
                <div class="p-3">
                  <div class="flex items-center mb-2">
                    <span class="inline-block bg-brand-1 w-19px h-24px mr-3"></span>
                    <h2 class="uppercase text-20px font-bold">{!! get_the_title($ws) !!}</h2>
                  </div>
                  <div>
                    @if(empty($excerpt = get_field('excerpt', $ws->ID)))
                      {!! get_the_excerpt($ws) !!}
                    @else
                      {!! $excerpt !!}
                    @endif
                  </div>
                </div>
              </a>
            </div>
          @endforeach
            @if( $block_prekyba = get_field('block_prekyba') )
              <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4">
                <a target="_blank" href="{{ $block_prekyba['link']['url'] }}">
                  {!! wp_get_attachment_image( $block_prekyba['image'], 'work' ) !!}
                  <div class="p-3">
                    <div class="flex items-center mb-2">
                      <span class="inline-block bg-brand-1 w-19px h-24px mr-3"></span>
                      <h2 class="uppercase text-20px font-bold">{{ $block_prekyba['title'] }}</h2>
                    </div>
                    <div>{{ $block_prekyba['text'] }}</div>
                  </div>
                </a>
              </div>
            @endif
        </div>
      </div>
    </div>
  @endif
  <div class="section-gallery bg-brand-2 text-white py-23px lg:py-52px" id="galerija">
    <h2 class="text-center font-bold uppercase text-20px lg:text-26px">{{ __('Atliktų darbų galerija','ko') }}</h2>
    <div class="container my-5 lg:my-10">
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-container">
      <div class="swiper-wrapper text-white">
        @foreach( App::work_cats() as $key => $wc )
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
  <div class="section-work px-4 xl:px-0 py-10 lg:py-16">
    <h2 class="text-center font-bold uppercase text-brand-2 text-20px mb-8 lg:text-26px">{{ __('Ką mes darome?','ko') }}</h2>
    <div class="container">
      <div class="flex flex-wrap -mx-4">
        @foreach(App::works() as $work)
          <div class="w-full md:w-1/2 lg:w-1/3 px-4">
            <a href="{{ get_permalink($work) }}">
              <img src="{{ get_the_post_thumbnail_url($work, 'work-gallery') }}" alt="">
              <div class="p-3">
                <div class="flex items-center mb-2">
                  <span class="inline-block bg-brand-1 w-19px h-24px mr-3"></span>
                  <h2 class="uppercase text-20px md:text-25px font-bold leading-tight">{!! get_the_title($work) !!}</h2>
                </div>
                <div>{!! get_the_excerpt($work) !!}</div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @include('partials.section-cta')
@stop
