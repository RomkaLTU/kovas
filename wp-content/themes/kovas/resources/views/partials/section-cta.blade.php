<div class="section-cta bg-brand-1 text-white">
  <div class="container uppercase text-18px md:text-22px font-bold flex flex-wrap items-center justify-center md:justify-between px-4 xl:px-0 py-4 md:py-6">
    <div class="mb-2 md:mb-0">{{ __('Statyba ir prekyba nuo 1991','ko') }}</div>
    <a href="{{ App::getPermalinkByTemplate('kontaktai') }}" class="contact_form_trigger border-2 transition hover:bg-brand-1-hover border-white py-2 px-8">
      <?php _e('SUSISIEKITE SU MUMIS','ko') ?>
    </a>
  </div>
</div>
<div class="section-contactform bg-brand-3 text-white py-25px lg:py-50px hidden">
  <div class="container">
    <div class="clearfix relative px-4 xl:px-0">
      @php echo do_shortcode("[ninja_form id='2']") @endphp
    </div>
    <div class="text-center px-4 xl:px-0">
      <?php _e('Laukelius pažymėtus žvaigždute yra būtina užpildyti. Siųsdami šią užklausą Jūs sutinkate, kad „KOVAS“ UAB
      tvarkytų Jūsų pateiktus duomenis pagal Lietuvos Respublikoje galiojančius įstatymus ir teisės aktus.','ko') ?>
    </div>
  </div>
</div>
