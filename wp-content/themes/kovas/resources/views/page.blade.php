@extends('layouts.app')

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
    </div>
  @endwhile
@endsection
