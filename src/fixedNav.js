// toggle scroll class on nav on scroll
const config = {
  selector: {
    nav: '.main-nav',
    menuToggle: '.menu-toggle'
  },
  class: {
    scroll: 'scroll',
    expanded: 'expanded',
  },
  offsetY: 25
};

document.addEventListener('DOMContentLoaded', function () {
  const _this = this;
  _this.navEl = document.querySelector(config.selector.nav);
  _this.menuToggle = document.querySelector(config.selector.menuToggle);

  // set fixed on nav during scroll
  window.addEventListener('scroll', function () {
    updateFixedNav();
  });
  updateFixedNav();

  // toggle mobile nav
  _this.menuToggle.addEventListener('click', function () {
    _this.navEl.classList.toggle(config.class.expanded);
  });

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
