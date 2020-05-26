require('normalize.css');
require('./fixedNav');

// remove no-js from body
document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('html').classList.remove('no-js');
});
