// toggle scroll class on nav on scroll
const config = {
  selector: {
    nav: '.main-nav',
  },
  class: {
    scroll: 'scroll',
  },
  offsetY: 25
};

document.addEventListener('DOMContentLoaded', function () {
  const _this = this;
  _this.navEl = document.querySelector(config.selector.nav);

  // set fixed on nav during scroll
  window.addEventListener('scroll', function () {
    updateFixedNav();
  });
  updateFixedNav();

  function updateFixedNav() {
    const {
      pageYOffset
    } = window,
      {
        classList
      } = _this.navEl;
    if (!classList) {
      return;
    }
    if (pageYOffset > config.offsetY) {
      classList.add(config.class.scroll);
    } else {
      classList.remove(config.class.scroll);
    }
  }
});
