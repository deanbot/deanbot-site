// This file configures the development web server
// which supports hot reloading and synchronized testing.

// Require Browsersync along with webpack and middleware for it
const browserSync = require('browser-sync');
const path = require('path');
const webpack = require('webpack');

const webpackDevMiddleware = require('webpack-dev-middleware');
const webpackHotMiddleware = require('webpack-hot-middleware');
const config = require('../webpack.config');
const devConfig = require('../config/devConfig');
const bundler = webpack(config);
const projectRoot = path.join(__dirname, '..');

// Run Browsersync and use middleware for Hot Module Replacement
browserSync({
  port: devConfig.port,
  ui: {
    port: devConfig.uiPort
  },
  proxy: {
    target: devConfig.proxyUrl,
    middleware: [
      webpackDevMiddleware(bundler, {
        publicPath: '/',

        // These settings suppress noisy webpack output so only errors are displayed to the console.
        noInfo: true,
        quiet: false,
        stats: {
          assets: false,
          colors: true,
          version: false,
          hash: false,
          timings: false,
          chunks: false,
          chunkModules: false
        }
        // for other settings see
        // https://webpack.js.org/guides/development/#webpack-dev-middleware
      }),

      // bundler should be the same as above
      webpackHotMiddleware(bundler)
    ],
    proxyReq: [(proxyReq, req, res) => {
      proxyReq.setHeader('X-Forwarded-For', 'webpack')
      proxyReq.setHeader('X-Forwarded-Host', req.headers.host)
      proxyReq.setHeader('X-Forwarded-Proto', 'http')
    }],
  },
  https: false,
  open: false,
  notify: false,
  files: [
    path.join(projectRoot, 'site', '**/*'),

    (devConfig.reloadOnContentChange
      ? path.join(projectRoot, 'content', '**/*')
      : null)
  ]
    .filter(_ => !!_),
  // watchOptions: {
  //   ignoreInitial: true,
  // }
  reloadOnRestart: true,
});
