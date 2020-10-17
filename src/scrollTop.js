// scroll smoothly
const config = {
  selector: {
    anchor: '.anchor-brand a',
  }
};

document.addEventListener('DOMContentLoaded', function () {
  const _this = this;
  _this.anchor = document.querySelector(config.selector.anchor);
  if (_this.anchor) {
    _this.anchor.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({
        'behavior': 'smooth',
        'left': 0,
        'top': 0
      });
    });
  }
});
