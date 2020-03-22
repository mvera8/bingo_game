const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin'); // clean output folder
const webpack = require('webpack'); // to access built-in plugins
const MiniCssExtractPlugin = require('mini-css-extract-plugin'); // take sass from js and create css
const StylelintBarePlugin = require('stylelint-bare-webpack-plugin'); // style lint the sass
const autoprefixer = require('autoprefixer');
var ImageminPlugin = require('imagemin-webpack-plugin').default // compress all images

module.exports = {
  watch: true,
  watchOptions: {
    ignored: /node_modules/,
    aggregateTimeout: 300,
    poll: 1000
  },
  entry: {
    main: './assets/js/main.js'
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'js/bundle.[hash].js'
  },
  externals: {
    'window': 'window'
  },
  performance: {
    hints: false
  },
  module: {
    rules: [
      { 
        test: /\.js$/, 
        exclude: /node_modules/, 
        loader: "babel-loader" 
      },
      {
        test: /\.scss$/,
        use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
              options: {}
            },
            {
              loader: "postcss-loader",
              options: {
                  autoprefixer: {
                      browsers: ["last 2 versions"]
                  },
                  plugins: () => [
                      autoprefixer
                  ]
              },
            },
            {
              loader: "sass-loader",
              options: {}
            }
        ]
      },
      {
        test: /\.(png|jpe?g|gif)$/i,
        loader: 'file-loader',
        options: {
          publicPath: 'images/',
          name: '[name].[ext]',
          outputPath: 'css/images/',
        },
      },
      {
        test: /\.(svg|eot|ttf|woff|woff2)$/i,
        loader: 'file-loader',
        options: {
          publicPath: 'fonts/',
          name: '[name].[ext]',
          outputPath: 'css/fonts/',
        },
      },
    ]
  },
  plugins: [
    new webpack.ProgressPlugin(), // Output each progress message directly to the console
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: 'css/bundle.[hash].css',
    }),
    new StylelintBarePlugin(),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      jquery: 'jquery',
      'window.jQuery': 'jquery'
    }),
    new ImageminPlugin({
      optipng: {
        optimizationLevel: 3
      }
    })
  ],
}