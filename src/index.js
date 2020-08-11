require('normalize.css');
// import 'remixicon/fonts/remixicon.css';
require('./scss/site.scss');
require('./fixedNav');
require('./images/logo-sprites.png');

// remove no-js from body
document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('html').classList.remove('no-js');
});
