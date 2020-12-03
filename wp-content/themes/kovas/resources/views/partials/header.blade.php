<header class="header">
  <div class="header-top px-4 bg-brand-2">
    <div class="container text-white text-14px md:text-18px flex items-center justify-between md:justify-end py-2">
      <div class="mr-4 flex items-center justify-center">
        <i class="fas fa-mobile-alt mr-2 text-18px md:text-8"></i>
        <a href="tel:{{ str_replace(' ', '', get_field('main_phone','option')) }}">{{ get_field('main_phone','option') }}</a>
      </div>
      <a href="{{ get_field('eshop_url','option') }}" target="_blank" class="flex md:h-52px">
        <div class="flex items-center justify-center bg-brand-3 w-50px">
          <img src="@asset('images/phone-cart.png')" class="w-20px md:w-auto" alt="">
        </div>
        <div class="flex items-center justify-center bg-brand-1 text-12px font-bold py-2 md:py-4 px-4 md:px-6">{{ __('EL. PARDUOTUVĖ','ko') }}</div>
      </a>
      <div class="header-social flex items-center ml-4 text-8">
        @include('partials.social')
        <a href="{{ App::getPermalinkByTemplate('kontaktai') }}" class="ml-2"><i class="fas fa-map-marker-alt"></i></a>
      </div>
    </div>
  </div>
  <div class="header-bottom fixed z-200 w-full bg-white top-0 mt-64px lg:mt-68px pl-4 xl:pl-0 pr-4 xl:pr-0">
    <div class="container flex overflow-hidden">
      <a class="brand block flex-1 max-w-278px xl:max-w-410px -ml-23px lg:ml-0" href="{{ home_url('/') }}">
        <img src="@asset('images/logo-dark.svg')" alt="">
      </a>
      <div id="mobile_menu_trigger" class="flex-1 flex items-center justify-end text-20px lg:hidden">
        <span class="uppercase text-12px md:text-18px mr-2 font-bold">{{ __('menu','ko') }}</span> <i class="fas fa-bars md:text-23px"></i>
      </div>
      <nav class="nav-primary hidden lg:block flex-1">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
    </div>
  </div>
</header>
