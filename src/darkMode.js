// toggle dark mode
const config = {
  selector: {
    root: 'html',
    toggle: '.dark-mode-toggle',
    logoImage: '.brand img',
  },
  class: {
    darkMode: 'dark',
  },
  src: {
    logoImageDark: 'assets/sm-dark.png',
    logoImageLight: 'assets/sm.png',
  },
};

document.addEventListener('DOMContentLoaded', function () {
  const _this = this;
  _this.rootEl = document.querySelector(config.selector.root);
  _this.logoImage = document.querySelector(config.selector.logoImage);
  _this.toggle = document.querySelector(config.selector.toggle);
  if (_this.toggle) {
    _this.toggle.addEventListener('click', function (e) {
      e.preventDefault();
      if (_this.logoImage && _this.rootEl.classList.contains(config.class.darkMode)) {
        _this.logoImage.setAttribute('src', config.src.logoImageLight);
      } else {
        _this.logoImage.setAttribute('src', config.src.logoImageDark);
      }
      _this.rootEl.classList.toggle(config.class.darkMode);
    });
  }
});
