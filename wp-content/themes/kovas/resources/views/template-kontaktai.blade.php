{{--
  Template Name: Kontaktai
--}}

@extends('layouts.app')

@php
$map_lat = get_field('map_lat','option');
$map_lng = get_field('map_lng','option');
@endphp

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="bg-gray-3 pt-25px lg:pt-50px">
      <div class="container px-4 xl:px-0">
        @include('partials.page-header')
        <div class="wysiwyg pb-16">
          @include('partials.content-page')
        </div>
      </div>
      @include('partials.section-cta')
      @if(!empty($map_lat) && !empty($map_lng))
        <div id="map" class="map min-h-430px" data-lat="{{ $map_lat }}" data-lng="{{ $map_lng }}"></div>
      @endif
    </div>
  @endwhile
@endsection
