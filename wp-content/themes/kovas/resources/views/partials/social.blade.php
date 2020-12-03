@php $social = get_field('social','option') @endphp
<ul class="flex justify-center">
  @if($social['facebook'])
    <li class="mr-2">
      <a target="_blank" href="{{ $social['facebook'] }}"><i class="fab fa-facebook"></i></a>
    </li>
  @endif
  @if($social['youtube'])
    <li>
      <a target="_blank" href="{{ $social['youtube'] }}"><i class="fab fa-youtube"></i></a>
    </li>
  @endif
</ul>
