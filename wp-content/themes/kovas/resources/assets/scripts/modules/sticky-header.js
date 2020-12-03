export default () => {

  const element = document.querySelector('.header-bottom');

  if (!element) {
    return;
  }

    let elHeight = 0,
        dHeight = 0,
        wHeight = 0,
        wScrollCurrent = 0,
        wScrollBefore = 0,
        wScrollDiff = 0;

    window.addEventListener('scroll', function() {
        elHeight = element.offsetHeight;
        dHeight = document.body.offsetHeight;
        wHeight = window.innerHeight;
        wScrollCurrent = window.pageYOffset;
        wScrollDiff = wScrollBefore - wScrollCurrent;

        if (wScrollCurrent <= 0) {
          element.classList.remove('scrolled-to-bottom');
          element.classList.remove('scrolling-down');
          element.classList.remove('scrolling-up');
          element.classList.add('scrolled-to-top');
        } else if (wScrollDiff > 0) {
          element.classList.remove('scrolled-to-top');
          element.classList.remove('scrolled-to-bottom');
          element.classList.remove('scrolling-down');
          element.classList.add('scrolling-up');
        } else if (wScrollDiff < 0) {
            if (wScrollCurrent + wHeight >= dHeight - elHeight) {
              element.classList.remove('scrolling-down');
              element.classList.remove('scrolling-up');
              element.classList.add('scrolled-to-bottom');
            } else {
              element.classList.remove('scrolling-up');
              element.classList.remove('scrolled-to-top');
              element.classList.remove('scrolled-to-bottom');
              element.classList.add('scrolling-down');
            }
        }

        wScrollBefore = wScrollCurrent;
    });

}
