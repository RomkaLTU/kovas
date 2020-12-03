<article @php post_class('px-4 xl:px-0 pt-25px lg:pt-50px') @endphp>
  <header class="container">
    <h1 class="text-26px uppercase text-center font-bold mb-6">{!! get_the_title() !!}</h1>
  </header>
  <div class="container entry-content wysiwyg">
    @php the_content() @endphp
  </div>
</article>
