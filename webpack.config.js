const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const dev = process.env.NODE_ENV !== 'production';

module.exports = {
  mode: dev
    ? 'development'
    : 'production',
  devtool: dev
    ? 'cheap-module-eval-source-map'
    : 'source-map',
  entry: dev
    ? {
      'assets/builds/bundle.js': [
        './src/index.js',
        'webpack-hot-middleware/client?reload=true'
      ],
      'assets/builds/bundle.css': [
        './src/scss/site.scss',
        'webpack-hot-middleware/client?reload=true'
      ]
    }
    : {
      'assets/builds/bundle': [
        './src/index.js',
        './src/scss/site.scss'
      ]
    },
  output: {
    publicPath: '/',
    path: path.resolve(__dirname),
    filename: '[name].js',
    chunkFilename: '[name].[id].chunk.js'
  },
  plugins: dev
    ? [
      new webpack.NoEmitOnErrorsPlugin(),
      new webpack.HotModuleReplacementPlugin(),
    ]
    : [
      new MiniCssExtractPlugin({
        filename: '[name].css'
      }),
    ],
  module: {
    rules: [
      {
        test: /\.(js)$/,
        loader: 'babel-loader',
        exclude: /(node_modules)/
      },
      {
        test: /(\.css|\.scss|\.sass)$/,
        use: [
          (
            dev
              ? 'style-loader'
              : MiniCssExtractPlugin.loader
          ),
          {
            loader: 'css-loader',
            options: {
              url: !!dev,
              sourceMap: true
            }
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: () => dev
                ? [
                  require('autoprefixer'),
                ]
                : [
                  require('cssnano'),
                  require('autoprefixer'),
                ],
              sourceMap: true
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true
            }
          }
        ]
      },
      {
        test: /\.(jpe?g|png|gif|ico)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              // public
            }
          }
        ]
      },
      {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        use: [
          {
            loader: 'url-loader',
            options: dev
              ? {
                loader: 'url-loader',
                options: {
                  limit: 10000,
                  mimetype: 'image/svg+xml'
                }
              }
              : {
                limit: 10000,
                mimetype: 'image/svg+xml',
                name: '[name].[ext]'
              }
          }
        ]
      },
      {
        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        use: [
          {
            loader: 'url-loader',
            options: dev
              ? {
                limit: 10000,
                mimetype: 'application/font-woff',
              }
              : {
                limit: 10000,
                mimetype: 'application/font-woff',
                name: '[name].[ext]'
              }
          }
        ]
      },
      {
        test: /\.[ot]tf(\?v=\d+.\d+.\d+)?$/,
        use: [
          {
            loader: 'url-loader',
            options: dev
              ? {
                loader: 'url-loader',
                options: {
                  limit: 10000,
                  mimetype: 'application/octet-stream'
                }
              }
              : {
                limit: 10000,
                mimetype: 'application/octet-stream',
                name: '[name].[ext]'
              }
          }
        ]
      },
    ]
  }
};
