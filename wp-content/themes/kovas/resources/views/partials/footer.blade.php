<footer class="footer">
  <div class="footer-top text-white py-25px lg:py-50px bg-black-2 px-4 xl:px-0">
    <div class="container flex flex-col-reverse lg:flex-row">
      <div class="flex-3 flex flex-col md:flex-row md:mt-4">
        @php dynamic_sidebar('sidebar-footer') @endphp
      </div>
      <div>
        <a href="{{ get_field('eshop_url','option') }}" target="_blank" class="flex h-12 lg:h-76px justify-center lg:justify-start">
          <div class="flex items-center justify-center bg-brand-3 w-70px lg:w-90px">
            <img src="@asset('images/phone-cart-big.png')" class="w-25px lg:w-auto" alt="">
          </div>
          <div class="flex items-center justify-center text-14px lg:text-18px font-bold bg-brand-1 py-4 px-6">{{ __('EL. PARDUOTUVĖ','ko') }}</div>
        </a>
        <div class="footer-social pt-4 lg:pt-10 text-8 lg:text-10">
          @include('partials.social')
        </div>
      </div>
    </div>
    <div class="container mt-4 lg:mt-8">
      <p class="text-gray-2">{{ get_field('seo_text','option') }}</p>
    </div>
  </div>
  <div class="footer-bottom bg-black-3 px-4 xl:px-0 py-4 lg:py-8">
    <div class="container flex items-center justify-between flex-col md:flex-row text-gray-2 text-14px md:text-4">
      <div class="mb-1 md:mb-0">© 1991 - {{ date('Y') }} „KOVAS“ UAB - {{ __('Visos teisės saugomos','ko') }}.</div>
      <div>{{ __('Svajonių įgyvendinimas','ko') }}: <a href="#" class="text-brand-3">IT DREAMS</a></div>
    </div>
  </div>
</footer>
